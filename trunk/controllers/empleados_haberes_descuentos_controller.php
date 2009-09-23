<?php
class EmpleadosHaberesDescuentosController extends AppController {

	var $name = 'EmpleadosHaberesDescuentos';
	var $uses = array('EmpleadosHaberesDescuento', 'Empleado');
	var $helpers = array('Html', 'Form');
	
    function isAuthorized() {
		return true;
    }
	
	function index() {
		$this->EmpleadosHaberesDescuento->recursive = 0;
		$this->set('empleadosHaberesDescuentos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid EmpleadosHaberesDescuento.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('empleadosHaberesDescuento', $this->EmpleadosHaberesDescuento->read(null, $id));
	}

	function add($id = null) {
		if ($id) {
			$this->Session->write('Empleado.id', $id);
		}
		$this->Empleado->id = $this->Session->read('Empleado.id');		
		$this->set('empleadoNombre', $this->Empleado->find());
		$this->set('empleadosHaberesDescuentos', $this->paginate(array('empleado_id' => $this->Session->read('Empleado.id'), 'fecha' => $this->Session->read('fecha'))));
		if (!empty($this->data)) {
			$this->data['EmpleadosHaberesDescuento']['fecha'] = $this->Session->read('fecha');
			$this->data['EmpleadosHaberesDescuento']['empleado_id'] = $this->Session->read('Empleado.id');
			$this->EmpleadosHaberesDescuento->create();
			if ($this->EmpleadosHaberesDescuento->save($this->data)) {				
				$this->Session->setFlash('El ítem ha sido asignado');
				$this->redirect(array('action'=>'add', $this->Session->read('Empleado.id')));
			} else {
				$this->Session->setFlash(__('The EmpleadosHaberesDescuento could not be saved. Please, try again.', true));
			}
		}
		$haberesDescuentos = $this->EmpleadosHaberesDescuento->HaberesDescuento->find('list', array(
						'conditions' => array('empresa_id' => $this->Session->read('Empresa.id'))));
		$this->set(compact('haberesDescuentos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid EmpleadosHaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {			
			$this->data['EmpleadosHaberesDescuento']['empleado_id'] = $this->Session->read('Empleado.id');
			if ($this->EmpleadosHaberesDescuento->save($this->data)) {
				$this->Session->setFlash('El ítem ha sido modificado');
				$this->redirect(array('action'=>'add', $this->Session->read('Empleado.id')));
			} else {
				$this->Session->setFlash(__('The EmpleadosHaberesDescuento could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmpleadosHaberesDescuento->read(null, $id);
		}		
		$haberesDescuentos = $this->EmpleadosHaberesDescuento->HaberesDescuento->find('list', array(
						'conditions' => array('empresa_id' => $this->Session->read('Empresa.id'))));
		$this->set(compact('haberesDescuentos'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for EmpleadosHaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmpleadosHaberesDescuento->del($id)) {
			$this->Session->setFlash('El ítem ha sido eliminado.');
			$this->redirect(array('action'=>'add', $this->Session->read('Empleado.id')));
		}
	}

}
?>