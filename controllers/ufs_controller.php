<?php
class UfsController extends AppController {

	var $name = 'Ufs';
	var $helpers = array('Html', 'Form');
	var $paginate = array('order' => array('Uf.fecha' => 'asc'));
	
    function isAuthorized() {
        if ($this->action == 'edit') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
        return true;
    }

	function index() {
		$this->Uf->recursive = 0;
		$this->set('Ufs', $this->paginate());
	}

	function add() {
	
	
		if (!empty($this->data)) {
			$this->data['Uf']['fecha'] = $this->data['ano']['year'].'-'.$this->data['mes']['month'].'-00';
			$this->Uf->create();
			if ($this->Uf->save($this->data)) {
				$this->Session->setFlash('La U.F. ha sido guardada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, la U.F. no se ha podido guardar.', 'default', array('class' => 'messageError'));
			}
		} 
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Tramo no válida');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['Uf']['fecha'] = $this->data['ano']['year'].'-'.$this->data['mes']['month'].'-00';
			if ($this->Uf->save($this->data)) {
				$this->Session->setFlash('La UF ha sido modificada');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, la UF no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Uf->read(null, $id);
		}
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for UF', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Uf->del($id)) {
			$this->Session->setFlash('UF borrada');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>