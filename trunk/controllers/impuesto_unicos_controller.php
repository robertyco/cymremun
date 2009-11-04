<?php
class ImpuestoUnicosController extends AppController {

	var $name = 'ImpuestoUnicos';
	var $helpers = array('Html', 'Form');
	
    function isAuthorized() {
		if ($this->Auth->user('tipo') == 'consultor') {
			return false;
		} 
		return true;
    }	

	function index() {
		$this->ImpuestoUnico->recursive = 0;
		$this->set('impuestosUnico', $this->paginate());
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Tramo no válida');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ImpuestoUnico->save($this->data)) {
				$this->Session->setFlash('El ítem ha sido modificada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, el item no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ImpuestoUnico->read(null, $id);
		}
	}

}
?>