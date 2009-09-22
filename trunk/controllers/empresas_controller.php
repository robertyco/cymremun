<?php
class EmpresasController extends AppController {

	var $name = 'Empresas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Empresa->recursive = 0;
		$this->set('empresas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Empresa.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('empresa', $this->Empresa->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Empresa->create();
			if ($this->Empresa->save($this->data)) {
				$this->Session->setFlash(__('The Empresa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Empresa could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Empresa', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Empresa->save($this->data)) {
				$this->Session->setFlash(__('The Empresa has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Empresa could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Empresa->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Empresa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Empresa->del($id)) {
			$this->Session->setFlash(__('Empresa deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function activar($id = null, $nombre = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Empresa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Session->write('Empresa.id', $id)) {
			$this->Session->write('Empresa.nombre', $nombre);
			$this->Session->setFlash('Se ha activado la empresa '.$this->Session->read('Empresa.nombre'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>