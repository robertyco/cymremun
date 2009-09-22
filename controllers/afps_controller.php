<?php
class AfpsController extends AppController {

	var $name = 'Afps';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Afp->recursive = 0;
		$this->set('afps', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('AFP no válida');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('afp', $this->Afp->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Afp->create();
			if ($this->Afp->save($this->data)) {
				$this->Session->setFlash('La AFP ha sido guardada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('La AFP no se ha podido guardar. Por favor, intente nuevamente');
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('AFP no válida');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Afp->save($this->data)) {
				$this->Session->setFlash('La AFP ha sido guardada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('La AFP no se ha podido guardar. Por favor, intente nuevamente');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Afp->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Afp', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Afp->del($id)) {
			$this->Session->setFlash('AFP borrada');
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>