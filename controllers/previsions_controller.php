<?php
class PrevisionsController extends AppController {

	var $name = 'Previsions';
	var $helpers = array('Html', 'Form');

    function isAuthorized() {
		return false;
    }
	
	function index() {
		$this->Prevision->recursive = 0;
		$this->set('previsions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Prevision.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('prevision', $this->Prevision->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Prevision->create();
			if ($this->Prevision->save($this->data)) {
				$this->Session->setFlash(__('The Prevision has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Prevision could not be saved. Please, try again.', true));
			}
		}
		$empleados = $this->Prevision->Empleado->find('list');
		$afps = $this->Prevision->Afp->find('list');
		$this->set(compact('empleados', 'afps'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Prevision', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Prevision->save($this->data)) {
				$this->Session->setFlash(__('The Prevision has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Prevision could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Prevision->read(null, $id);
		}
		$empleados = $this->Prevision->Empleado->find('list');
		$afps = $this->Prevision->Afp->find('list');
		$this->set(compact('empleados','afps'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Prevision', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Prevision->del($id)) {
			$this->Session->setFlash(__('Prevision deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>