<?php
class IsapresController extends AppController {

	var $name = 'Isapres';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Isapre->recursive = 0;
		$this->set('isapres', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Isapre.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('isapre', $this->Isapre->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Isapre->create();
			if ($this->Isapre->save($this->data)) {
				$this->Session->setFlash(__('The Isapre has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Isapre could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Isapre', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Isapre->save($this->data)) {
				$this->Session->setFlash(__('The Isapre has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Isapre could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Isapre->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Isapre', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Isapre->del($id)) {
			$this->Session->setFlash(__('Isapre deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>