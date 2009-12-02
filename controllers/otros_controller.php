<?php
class OtrosController extends AppController {

	var $name = 'Otros';
	var $uses = array('Otro');
	var $helpers = array('Html', 'Form');
	
    function isAuthorized() {
        if ($this->action == 'add' || $this->action == 'edit' || $this->action == 'delete') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
        return true;
    }

	function index() {
		$this->Otro->recursive = 0;
		$this->set('otros', $this->paginate());
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Dato no válido');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Otro->save($this->data)) {
				$this->Session->setFlash('El dato ha sido modificado');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, el dato no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Otro->read(null, $id);
		}
	}

}
?>