<?php
class LiquidacionesController extends AppController {

	var $name = 'Liquidaciones';
	var $uses = array('Empleado', 'EmpleadosHaberesDescuento', 'HaberesDescuento', 'AsignacionFamiliar', 'Liquidacion', 
		'Afp', 'ImpuestoUnico', 'Otro', 'Uf');
	var $paginate = array(
		'EmpleadosHaberesDescuento' => array('order' => array('HaberesDescuento.nombre' => 'asc')),
		'Empleado' => array('order' => array('Empleado.apell_paterno' => 'asc', 'Empleado.apell_materno' => 'asc')),
	);

	function isAuthorized() {
        if ($this->action == 'add' || $this->action == 'delete') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
		return true;
	}
	
	function index() {
		if (!$this->Session->check('Empresa.id')) {
			$this->Session->setFlash('Debe activar una empresa');
		} 
		$this->Empleado->recursive = 0;
		$empleados = $this->paginate('Empleado', array('empresa_id' => $this->Session->read('Empresa.id')));

		$i = 0;
		foreach ($empleados as $empleado):
			$id = $empleado['Empleado']['id'];
			$liquidacion = $this->Liquidacion->find('first', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $id), 
				'recursive' => -1
			));
			if ($liquidacion) {
				$empleados[$i]['Empleado']['liquida'] = 1;
				$empleados[$i]['Empleado']['liquidaId'] = $liquidacion['Liquidacion']['id'];
			} else {
				$empleados[$i]['Empleado']['liquida'] = 0;
			}
			$i++;
		endforeach;
		
		$this->set('empleados', $empleados);
	}

	function add($id = null) {
		$fecha = mktime(0, 0, 0, $this->Session->read('mes') - 1, 1, $this->Session->read('ano'));
		$fecha = date('Y-m', $fecha).'-00';
		$UF = $this->Uf->find('first', array(
			'conditions' => array('fecha' => $fecha), 
			'recursive' => -1
		));
		if ($UF) {
			$UF = $UF['Uf']['valor'];
		
			$this->Empleado->id = $id;
			$empleado = $this->Empleado->find('first', array('recursive' => 0));
			$this->set(
				'empleadoNombre', $empleado['Empleado']['nombres'].' '.
				$empleado['Empleado']['apell_paterno'].' '.
				$empleado['Empleado']['apell_materno']
			);
			
			// saca los datos que se necesitan de la liquidación (dias trab, horas extras), 
			// si la liquidación no existe pone datos por defecto y crea un nuevo registro para el posterior guardado en bd.
			$liquidacion = $this->Liquidacion->find('first', array(
						'conditions' => array('fecha' => $this->Session->read('fecha'), 
							'empleado_id' => $id), 
						'recursive' => -1
					));
			if ($liquidacion) {
				$this->Liquidacion->id = $liquidacion['Liquidacion']['id'];
			} else {
				$liquidacion['Liquidacion']['empleado_id'] = $id;
				$liquidacion['Liquidacion']['fecha'] = $this->Session->read('fecha');
				$liquidacion['Liquidacion']['dias_trabajados'] = 30;
				$liquidacion['Liquidacion']['horas_extra_50'] = 0;
				$liquidacion['Liquidacion']['horas_extra_100'] = 0;
				$this->Liquidacion->create();
			}

			// cálculo de sueldo según días trabajados
			$sueldo = round(($empleado['Empleado']['sueldo_base']/30) * $liquidacion['Liquidacion']['dias_trabajados']);
			$this->set('sueldo', $sueldo);

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
			$subTotalImponibles = $sueldo + $horasExtra50 + $horasExtra100;
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
			$sueldoMinimo = 0;
			$sueldoMinimo = $this->Otro->find('first', array(
				'conditions' => array('id' => 1), 
				'recursive' => -1
			));
			$sueldoMinimo = $sueldoMinimo['Otro']['valor'];
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
				}
			}
			$this->set('msgSalud', 'Salud');
			$this->set('salud', $salud);
			
			// seguro de cesantía
			if ($empleado['Empleado']['seg_cesantia'] == 'S') {
				if ($empleado['Empleado']['tipo_contrato'] == 'I') {
					$seguroCesantia = round($totalImponible * 0.006);
					$seguroEmpl = round($totalImponible * 0.024);
				} else {
					$seguroCesantia = 0;
					$seguroEmpl = round($totalImponible * 0.03);
				}
			} else {
				$seguroCesantia = 0;
				$seguroEmpl = 0;
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
			
			// guardado de la liquidación en bd
			$liquidacion['Liquidacion']['seg_afil'] = $seguroCesantia;
			$liquidacion['Liquidacion']['seg_empl'] = $seguroEmpl;
			$liquidacion['Liquidacion']['apv'] = $apv;
			$liquidacion['Liquidacion']['cotiz_oblig'] = $prevision;
			$liquidacion['Liquidacion']['imponible'] = $totalImponible;
			$liquidacion['Liquidacion']['no_imponible'] = $totalNoImponible;
			$liquidacion['Liquidacion']['haber'] = $totalHaber;
			$liquidacion['Liquidacion']['descuento'] = $totalDescuento;
			$liquidacion['Liquidacion']['liquido'] = $alcanceLiquido;
			if ($this->Liquidacion->save($liquidacion)) {
				// $this->Session->setFlash('Se han guardado los datos.');
			} else {
				$this->Session->setFlash('Error, no se han podido guardar los datos.', 'default', array('class' => 'messageError'));
			}
		} else {
			$this->Session->setFlash('Error, no existe valor de UF para el mes.', 'default', array('class' => 'messageError'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Empleado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Liquidacion->del($id)) {
			$this->Session->setFlash('La liquidación de sueldo ha sido eliminada.');
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function imprimir($ids = null) {
		$fecha = mktime(0, 0, 0, $this->Session->read('mes') - 1, 1, $this->Session->read('ano'));
		$fecha = date('Y-m', $fecha).'-00';
		$UF = $this->Uf->find('first', array(
			'conditions' => array('fecha' => $fecha), 
			'recursive' => -1
		));
		if ($UF) {
			$UF = $UF['Uf']['valor'];

			$this->layout = 'pdf';
			
			if ($ids) {
				$empleados = $this->Empleado->find('all', array(
					'conditions' => array('empresa_id' => $this->Session->read('Empresa.id'), 'Empleado.id' => $ids),
					'order' => array('apell_paterno' => 'asc'),
					'recursive' => 0
				));
			} else {
				$empleados = $this->Empleado->find('all', array(
					'conditions' => array('empresa_id' => $this->Session->read('Empresa.id')),
					'order' => array('apell_paterno' => 'asc'),
					'recursive' => 0
				));
			}
			
			$i = 0;
			foreach ($empleados as $empleado):
				$id = $empleado['Empleado']['id'];
				$liquidacion = $this->Liquidacion->find('first', array(
					'conditions' => array('fecha' => $this->Session->read('fecha'), 
						'empleado_id' => $id), 
					'recursive' => -1
				));
				if ($liquidacion) {
					$empleados[$i]['Empleado']['liquida'] = 1;
				} else {
					$empleados[$i]['Empleado']['liquida'] = 0;
				}
				
				// cálculo de sueldo según días trabajados
				$sueldo[$i] = round(($empleado['Empleado']['sueldo_base']/30) * $liquidacion['Liquidacion']['dias_trabajados']);

				// cálculo de horas extras al 50%
				$horasExtra50[$i] = round(((($empleado['Empleado']['sueldo_base']/30)/8) * 1.5) * $liquidacion['Liquidacion']['horas_extra_50']);
				
				// cálculo de horas extras al 100%
				$horasExtra100[$i] = round(((($empleado['Empleado']['sueldo_base']/30)/8) * 2) * $liquidacion['Liquidacion']['horas_extra_100']);
				
				// sumatoria de imponibles para luego calcular gratificación
				$imponibles[$i] = $this->EmpleadosHaberesDescuento->find('all', array(
						'conditions' => array('fecha' => $this->Session->read('fecha'), 
							'empleado_id' => $id,
							'HaberesDescuento.tipo' => 'I'
						), 'order' => array('HaberesDescuento.nombre' => 'asc')
					));
				$subTotalImponibles[$i] = $sueldo[$i] + $horasExtra50[$i] + $horasExtra100[$i];
				foreach ($imponibles[$i] as $imponible):
					$subTotalImponibles[$i] = $subTotalImponibles[$i] + $imponible['EmpleadosHaberesDescuento']['valor'];
				endforeach;		
				
				// cálculo de gratificación
				$gratificacion[$i] = 0;
				if ($empleado['Empleado']['grat_legal'] == 'S') {
					$gratificacion[$i] = round($subTotalImponibles[$i] * 0.25);
				}			
				$sueldoMinimo = 0;
				$sueldoMinimo = $this->Otro->find('first', array(
					'conditions' => array('id' => 1), 
					'recursive' => -1
				));
				$sueldoMinimo = $sueldoMinimo['Otro']['valor'];
				if ($empleado['Empleado']['grat_legal'] == 'T') {
					$gratificacion[$i] = round(($sueldoMinimo * 4.75)/12);
				}
				
				// total haber imponible
				$totalImponible[$i] = $subTotalImponibles[$i] + $gratificacion[$i];
				
				// cálculo de asignación familiar
				$asignacionFamiliar = $this->AsignacionFamiliar->find('all');		
				$montoCarga = $asignacionFamiliar['0']['AsignacionFamiliar']['monto'];		
				if ($totalImponible[$i] > $asignacionFamiliar['0']['AsignacionFamiliar']['requisito']) {
					$montoCarga = $asignacionFamiliar['1']['AsignacionFamiliar']['monto'];
				} if ($totalImponible[$i] > $asignacionFamiliar['1']['AsignacionFamiliar']['requisito']) {
					$montoCarga = $asignacionFamiliar['2']['AsignacionFamiliar']['monto'];
				} if ($totalImponible[$i] > $asignacionFamiliar['2']['AsignacionFamiliar']['requisito']) {
					$montoCarga = $asignacionFamiliar['3']['AsignacionFamiliar']['monto'];
				}
				$asignacionFamiliarTotal[$i] = $empleado['Empleado']['cargas'] * $montoCarga;
				
				// total haberes no imponibles
				$noImponibles[$i] = $this->EmpleadosHaberesDescuento->find('all', array(
						'conditions' => array('fecha' => $this->Session->read('fecha'), 
							'empleado_id' => $id,
							'HaberesDescuento.tipo' => 'N'
						), 'order' => array('HaberesDescuento.nombre' => 'asc')
					));
				$totalNoImponible[$i] = $asignacionFamiliarTotal[$i];
				foreach ($noImponibles[$i] as $noImponible):
					$totalNoImponible[$i] = $totalNoImponible[$i] + $noImponible['EmpleadosHaberesDescuento']['valor'];
				endforeach;		
				
				// total haber
				$totalHaber[$i] = $totalImponible[$i] + $totalNoImponible[$i];

				// previsión
				$afp = $this->Afp->find('first', array(
							'conditions' => array('id' => $empleado['Prevision']['afp_id']), 'recursive' => 0
						));
				$prevision[$i] = $liquidacion['Liquidacion']['cotiz_oblig'];
				$cotizacion[$i] = $afp['Afp']['cotizacion'];
				
				// apv
				$apv[$i] = $liquidacion['Liquidacion']['apv'];
				
				// salud
				$msgSalud[$i] = 'Salud';
				$salud[$i] = round(($totalImponible[$i] * 7) / 100);
				if ($empleado['Salud']['isapre_id'] == 1) {
					$msgSalud[$i] = 'Salud 7%';
				} else {
					if ($empleado['Salud']['valor_tipo'] == 'U') {
						$planIsapre = round($empleado['Salud']['valor_plan'] * $UF);
					} else {
						$planIsapre = $empleado['Salud']['valor_plan'];
					}
					if ($planIsapre > $salud[$i]) {
						$salud[$i] = $planIsapre;
					}
				}
				
				// seguro de cesantía
				$seguroCesantia[$i] = $liquidacion['Liquidacion']['seg_afil'];
				
				// subtotal descuentos
				
				$descuentos[$i] = $this->EmpleadosHaberesDescuento->find('all', array(
						'conditions' => array('fecha' => $this->Session->read('fecha'), 
							'empleado_id' => $id,
							'HaberesDescuento.tipo' => 'D'
						), 'order' => array('HaberesDescuento.nombre' => 'asc')
					));
				$subTotalDescuentos[$i] = $prevision[$i] + $apv[$i] + $salud[$i] + $seguroCesantia[$i];
				foreach ($descuentos[$i] as $descuento):
					$subTotalDescuentos[$i] = $subTotalDescuentos[$i] + $descuento['EmpleadosHaberesDescuento']['valor'];
				endforeach;		
				
				// remuneración neta
				$remuneracionNeta[$i] = $totalImponible[$i] - ($prevision[$i] + $apv[$i] + $salud[$i] + $seguroCesantia[$i]);
				
				// impuesto único
				$impuestos = $this->ImpuestoUnico->find('all');
				foreach ($impuestos as $impuesto):
					if ($remuneracionNeta[$i] < $impuesto['ImpuestoUnico']['requisito']) {
						$impuestoUnico[$i] = round((($remuneracionNeta[$i] * $impuesto['ImpuestoUnico']['tasa']) / 100) - $impuesto['ImpuestoUnico']['rebaja']);
						break;
					}
				endforeach;
				
				// total descuentos
				$totalDescuento[$i] = $subTotalDescuentos[$i] + $impuestoUnico[$i];
				
				// alcance líquido
				$alcanceLiquido[$i] = $totalHaber[$i] - $totalDescuento[$i];
				
				$i++;
			endforeach;
			$this->set('empleados', $empleados);
			$this->set('sueldo', $sueldo);
			$this->set('horasExtra50', $horasExtra50);		
			$this->set('horasExtra100', $horasExtra100);
			$this->set('imponibles', $imponibles);
			$this->set('subTotalImponibles', $subTotalImponibles);
			$this->set('gratificacion', $gratificacion);
			$this->set('totalImponible', $totalImponible);
			$this->set('asignacionFamiliar', $asignacionFamiliarTotal);
			$this->set('noImponibles', $noImponibles);
			$this->set('totalNoImponible', $totalNoImponible);
			$this->set('totalHaber', $totalHaber);
			$this->set('cotizacion', $cotizacion);
			$this->set('prevision', $prevision);
			$this->set('apv', $apv);
			$this->set('msgSalud', $msgSalud);
			$this->set('salud', $salud);
			$this->set('seguroCesantia', $seguroCesantia);
			$this->set('descuentos', $descuentos);
			$this->set('subTotalDescuentos', $subTotalDescuentos);
			$this->set('remuneracionNeta', $remuneracionNeta);
			$this->set('impuestoUnico', $impuestoUnico);
			$this->set('totalDescuento', $totalDescuento);
			$this->set('alcanceLiquido', $alcanceLiquido);
		} else {
			$this->Session->setFlash('Error, no existe valor de UF para el mes.', 'default', array('class' => 'messageError'));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>