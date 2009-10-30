<?php
class LiquidacionesController extends AppController {

	var $name = 'Liquidaciones';
	var $uses = array('Empleado', 'EmpleadosHaberesDescuento');

	function isAuthorized() {
		return true;
	}

	function add($id = null) {
		$this->Empleado->id = $id;
		$empleado = $this->Empleado->find('first', array('recursive' => -1));
		$this->set(
			'empleadoNombre', $empleado['Empleado']['nombres'].' '.
			$empleado['Empleado']['apell_paterno'].' '.
			$empleado['Empleado']['apell_materno']
		);
		$this->set('empleadoId', $empleado['Empleado']['id']);
		$this->set('empresaId', $empleado['Empleado']['empresa_id']);

		$this->EmpleadosHaberesDescuento->recursive = 0;
		$this->set('imponibles', $this->paginate('EmpleadosHaberesDescuento', array(
				'empleado_id' => $id,
				'fecha' => $this->Session->read('fecha'),
				'HaberesDescuento.tipo' => 'I'
		)));
		$this->set('noImponibles', $this->paginate('EmpleadosHaberesDescuento', array(
				'empleado_id' => $id,
				'fecha' => $this->Session->read('fecha'),
				'HaberesDescuento.tipo' => 'N'
		)));
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

}
?>