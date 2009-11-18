<?php
class AsignacionFamiliarsController extends AppController {

	var $name = 'AsignacionFamiliars';
	var $helpers = array('Html', 'Form');
	
    function isAuthorized() {
        if ($this->action == 'edit') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
        return true;
    }

	function index() {
		$this->AsignacionFamiliar->recursive = 0;
		$this->set('asignacionesFamiliar', $this->paginate());
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('AFP no válida');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->AsignacionFamiliar->save($this->data)) {
				$this->Session->setFlash('La asignación familiar ha sido modificada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, la asignación familiar no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AsignacionFamiliar->read(null, $id);
		}
	}

}
?>