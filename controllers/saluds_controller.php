<?php
class SaludsController extends AppController {

	var $name = 'Saluds';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Salud->recursive = 0;
		$this->set('saluds', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Salud.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('salud', $this->Salud->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Salud->create();
			if ($this->Salud->save($this->data)) {
				$this->Session->setFlash(__('The Salud has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Salud could not be saved. Please, try again.', true));
			}
		}
		$empleados = $this->Salud->Empleado->find('list');
		$isapres = $this->Salud->Isapre->find('list');
		$this->set(compact('empleados', 'isapres'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Salud', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Salud->save($this->data)) {
				$this->Session->setFlash(__('The Salud has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Salud could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Salud->read(null, $id);
		}
		$empleados = $this->Salud->Empleado->find('list');
		$isapres = $this->Salud->Isapre->find('list');
		$this->set(compact('empleados','isapres'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Salud', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Salud->del($id)) {
			$this->Session->setFlash(__('Salud deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>