<?php
class LiquidacionesController extends AppController {

	var $name = 'Liquidaciones';
	var $uses = array('Empleado', 'EmpleadosHaberesDescuento', 'HaberesDescuento', 'AsignacionFamiliar', 'Liquidacion', 'Afp', 'ImpuestoUnico');
	var $paginate = array(
		'EmpleadosHaberesDescuento' => array('order' => array('HaberesDescuento.nombre' => 'asc'))
	);

	function isAuthorized() {
		return true;
	}

	function add($id = null) {
		$this->Empleado->id = $id;
		$empleado = $this->Empleado->find('first', array('recursive' => 0));
		$this->set(
			'empleadoNombre', $empleado['Empleado']['nombres'].' '.
			$empleado['Empleado']['apell_paterno'].' '.
			$empleado['Empleado']['apell_materno']
		);
		$liquidacion = $this->Liquidacion->find('first', array(
					'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $id)
				));

		// cálculo de sueldo según días trabajados
		$sueldoBase = round(($empleado['Empleado']['sueldo_base']/30) * $liquidacion['Liquidacion']['dias_trabajados']);
		$this->set('sueldoBase', $sueldoBase);

		// cálculo de horas extras al 50%
		$horasExtra50 = round(((($empleado['Empleado']['sueldo_base']/30)/8) * 1.5) * $liquidacion['Liquidacion']['horas_extra_50']);
		$this->set('horasExtra50', $horasExtra50);
		
		// cálculo de horas extras al 100%
		$horasExtra100 = round(((($empleado['Empleado']['sueldo_base']/30)/8) * 2) * $liquidacion['Liquidacion']['horas_extra_100']);
		$this->set('horasExtra100', $horasExtra100);
		
		// sumatoria de imponibles para luego calcular gratificación
		$imponibles = $this->EmpleadosHaberesDescuento->find('all', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $id,
					'HaberesDescuento.tipo' => 'I'
				), 'order' => array('HaberesDescuento.nombre' => 'asc')
			));
		$subTotalImponibles = $sueldoBase + $horasExtra50 + $horasExtra100;
		$i = 0;
		foreach ($imponibles as $imponible):
			$i++;
			$subTotalImponibles = $subTotalImponibles + $imponible['EmpleadosHaberesDescuento']['valor'];
		endforeach;		
		$this->set('subTotalImponibles', $subTotalImponibles);
		
		// cálculo de gratificación
		$gratificacion = 0;
		if ($empleado['Empleado']['grat_legal'] == 'S') {
			$gratificacion = round($subTotalImponibles * 0.25);
		}
		$sueldoMinimo = 165000;
		if ($empleado['Empleado']['grat_legal'] == 'T') {
			$gratificacion = round(($sueldoMinimo * 4.75)/12);
		}
		$this->set('gratificacion', $gratificacion);
		
		// total haber imponible
		$totalImponible = $subTotalImponibles + $gratificacion;
		$this->set('totalImponible', $totalImponible);
	
		// cálculo de asignación familiar
		$asignacionFamiliar = $this->AsignacionFamiliar->find('all');		
		$montoCarga = $asignacionFamiliar['0']['AsignacionFamiliar']['monto'];		
		if ($totalImponible > $asignacionFamiliar['0']['AsignacionFamiliar']['requisito']) {
			$montoCarga = $asignacionFamiliar['1']['AsignacionFamiliar']['monto'];
		} if ($totalImponible > $asignacionFamiliar['1']['AsignacionFamiliar']['requisito']) {
			$montoCarga = $asignacionFamiliar['2']['AsignacionFamiliar']['monto'];
		} if ($totalImponible > $asignacionFamiliar['2']['AsignacionFamiliar']['requisito']) {
			$montoCarga = $asignacionFamiliar['3']['AsignacionFamiliar']['monto'];
		}
		$asignacionFamiliarTotal = $empleado['Empleado']['cargas'] * $montoCarga;
		$this->set('asignacionFamiliar', $asignacionFamiliarTotal);
		
		// total haberes no imponibles
		$noImponibles = $this->EmpleadosHaberesDescuento->find('all', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $id,
					'HaberesDescuento.tipo' => 'N'
				), 'order' => array('HaberesDescuento.nombre' => 'asc')
			));
		$totalNoImponible = $asignacionFamiliarTotal;
		$i = 0;
		foreach ($noImponibles as $noImponible):
			$i++;
			$totalNoImponible = $totalNoImponible + $noImponible['EmpleadosHaberesDescuento']['valor'];
		endforeach;		
		$this->set('totalNoImponible', $totalNoImponible);
		
		// total haber
		$totalHaber = $totalImponible + $totalNoImponible;
		$this->set('totalHaber', $totalHaber);
		
		// previsión
		$afp = $this->Afp->find('first', array(
					'conditions' => array('id' => $empleado['Prevision']['afp_id']), 'recursive' => 0
				));
		$prevision = round(($totalImponible * $afp['Afp']['cotizacion']) / 100);
		$this->set('cotizacion', $afp['Afp']['cotizacion']);
		$this->set('prevision', $prevision);
		
		// apv
		$apv = 0;
		if ($empleado['Prevision']['apv'] == 'S') {
			$apv = $empleado['Prevision']['apv_monto'];
		}
		$this->set('apv', $apv);
		
		// salud
		$UF = 20956.89;
		$salud = round(($totalImponible * 7) / 100);
		if ($empleado['Salud']['isapre_id'] == 1) {
			$this->set('msgSalud', 'Salud 7%');
		} else {
			if ($empleado['Salud']['valor_tipo'] == 'U') {
				$planIsapre = round($empleado['Salud']['valor_plan'] * $UF);
			} else {
				$planIsapre = $empleado['Salud']['valor_plan'];
			}
			if ($planIsapre > $salud) {
				$salud = $planIsapre;
				$this->set('msgSalud', 'Salud');
			}
		}
		$this->set('salud', $salud);
		
		// seguro de cesantía
		if ($empleado['Empleado']['tipo_contrato'] == 'I') {
			$seguroCesantia = round($totalImponible * 0.06);
		} else {
			$seguroCesantia = 0;
		}
		$this->set('seguroCesantia', $seguroCesantia);
		
		// subtotal descuentos
		
		$descuentos = $this->EmpleadosHaberesDescuento->find('all', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $id,
					'HaberesDescuento.tipo' => 'D'
				), 'order' => array('HaberesDescuento.nombre' => 'asc')
			));
		$subTotalDescuentos = $prevision + $apv + $salud + $seguroCesantia;
		$i = 0;
		foreach ($descuentos as $descuento):
			$i++;
			$subTotalDescuentos = $subTotalDescuentos + $descuento['EmpleadosHaberesDescuento']['valor'];
		endforeach;		
		$this->set('subTotalDescuentos', $subTotalDescuentos);
		
		// remuneración neta
		$remuneracionNeta = $totalImponible - ($prevision + $apv + $salud + $seguroCesantia);
		$this->set('remuneracionNeta', $remuneracionNeta);
		
		// impuesto único
		$impuestos = $this->ImpuestoUnico->find('all');
		$i = 0;
		foreach ($impuestos as $impuesto):
			$i++;
			if ($remuneracionNeta < $impuesto['ImpuestoUnico']['requisito']) {
				$impuestoUnico = round((($remuneracionNeta * $impuesto['ImpuestoUnico']['tasa']) / 100) - $impuesto['ImpuestoUnico']['rebaja']);
				break;
			}
		endforeach;
		$this->set('impuestoUnico', $impuestoUnico);
		
		// total descuentos
		$totalDescuento = $subTotalDescuentos + $impuestoUnico;
		$this->set('totalDescuento', $totalDescuento);
		
		// alcance líquido
		$alcanceLiquido = $totalHaber - $totalDescuento;
		$this->set('alcanceLiquido', $alcanceLiquido);
		
		$this->set('empleadoId', $empleado['Empleado']['id']);
		$this->set('empresaId', $empleado['Empleado']['empresa_id']);

		$this->EmpleadosHaberesDescuento->recursive = 0;
		$this->set('liquidacion', $liquidacion);
		$this->set('imponibles', $imponibles);
		$this->set('noImponibles', $noImponibles);
		$this->set('descuentos', $this->paginate('EmpleadosHaberesDescuento', array(
				'empleado_id' => $id,
				'fecha' => $this->Session->read('fecha'),
				'HaberesDescuento.tipo' => 'D'
		)));
	}
	
	function deleteItem($id = null, $empleadoId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for EmpleadosHaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmpleadosHaberesDescuento->del($id)) {
			$this->Session->setFlash('El ítem ha sido eliminado.');
			$this->redirect(array('action'=>'add', $empleadoId));
		}
	}

	function editItemValor() {
		$this->data = array_values($this->data);  // necesario, ya que el primer indice del arreglo tenía un valor distinto de 0
		if (!empty($this->data)) {
			if ($this->EmpleadosHaberesDescuento->saveAll($this->data)) {
				$this->Session->setFlash('Los valores se han asignado');
				$empleadoId = $this->EmpleadosHaberesDescuento->field('empleado_id');				
				$this->redirect(array('action'=>'add', $empleadoId));
			} else {
				$this->Session->setFlash('Error, los valores no se han podido asignar', 'default', array('class' => 'messageError'));
			}
		}
	}

	function addDatosMes() {
		$this->data['Liquidacion']['fecha'] = $this->Session->read('fecha');
		if ($this->data['Liquidacion']['dias_trabajados'] < 1 || $this->data['Liquidacion']['dias_trabajados'] > 30) {
			$this->data['Liquidacion']['dias_trabajados'] = 30;
		}
		$repetido = $this->Liquidacion->find('first', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $this->data['Liquidacion']['empleado_id'])
				));
		if ($repetido) {
			$this->Liquidacion->id = $repetido['Liquidacion']['id'];
		} else {
			$this->Liquidacion->create();
		}
		
		if ($this->Liquidacion->save($this->data)) {
			$this->Session->setFlash('Se han guardado los datos.');
			$this->redirect(array('action'=>'add', $this->data['Liquidacion']['empleado_id']));
		} else {
			$this->Session->setFlash('Error, no se han podido guardar los datos.', 'default', array('class' => 'messageError'));
		}	
					
		// debug($repetido);
	}
	
	function addItem() {
		$this->data['EmpleadosHaberesDescuento']['fecha'] = $this->Session->read('fecha');
		if (!empty($this->data)) {	
			$this->EmpleadosHaberesDescuento->create();
			if ($this->EmpleadosHaberesDescuento->saveAll($this->data)) {				
				$this->Session->setFlash('El ítem se ha asignado');
			} else {
				$this->Session->setFlash('Error, el ítem no se ha podido asignar', 'default', array('class' => 'messageError'));
			}
			$empleadoId = $this->data['EmpleadosHaberesDescuento']['empleado_id'];
			$this->redirect(array('action'=>'add', $empleadoId));
		}
	}
	
	function cargarHd($empresaId = null, $empleadoId = null) {	
		$haberesDescuentos = $this->paginate('HaberesDescuento', array(				
				'Empresa.id' => $empresaId
		));		
		$empleado = $this->paginate('Empleado', array(		
				'Empleado.id' => $empleadoId
		));
		
		$this->EmpleadosHaberesDescuento->id = $empleadoId;
		
		$i = 0;
		foreach ($haberesDescuentos as $haberDescuento):
			$i++;
			$repetido = $this->EmpleadosHaberesDescuento->find('first', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $empleadoId,
					'haberes_descuento_id' => $haberDescuento['HaberesDescuento']['id']))
					);
			if ($repetido) {
				$this->EmpleadosHaberesDescuento->id = $repetido['EmpleadosHaberesDescuento']['id'];
			} else {
				$this->EmpleadosHaberesDescuento->create();
			}			
			
			if ($this->EmpleadosHaberesDescuento->saveField('fecha', $this->Session->read('fecha')) && 				
				$this->EmpleadosHaberesDescuento->saveField('empleado_id', $empleadoId) &&
				$this->EmpleadosHaberesDescuento->saveField('haberes_descuento_id', $haberDescuento['HaberesDescuento']['id'])) {
					$this->Session->setFlash('Se han asignado los haberes y descuentos');
			} else {
				$this->Session->setFlash('Error, los datos no se han podido guardar.', 'default', array('class' => 'messageError'));
			}
		endforeach;
		$this->redirect(array('action'=>'add', $empleadoId));
	}

}
?>