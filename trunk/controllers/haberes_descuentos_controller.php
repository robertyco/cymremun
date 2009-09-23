<?php
class HaberesDescuentosController extends AppController {

	var $name = 'HaberesDescuentos';
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
		$this->HaberesDescuento->recursive = 0;
		$this->set('haberesDescuentos', $this->paginate(array('empresa_id' => $this->Session->read('Empresa.id'))));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid HaberesDescuento.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('haberesDescuento', $this->HaberesDescuento->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['HaberesDescuento']['empresa_id'] = $this->Session->read('Empresa.id');
			$this->HaberesDescuento->create();
			if ($this->HaberesDescuento->save($this->data)) {
				$this->Session->setFlash('El ítem ha sido guardado', 'default', array('class' => 'messageExitoso'));
				$this->redirect(array('action'=>'add'));
			} else {
				$this->Session->setFlash('Error, el ítem no se ha podido guardar', 'default', array('class' => 'messageError'));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid HaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['HaberesDescuento']['empresa_id'] = $this->Session->read('Empresa.id');
			if ($this->HaberesDescuento->save($this->data)) {
				$this->Session->setFlash('El ítem ha sido modificado');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('El ítem no se ha podido modificar. Por favor, intente nuevamente');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->HaberesDescuento->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for HaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->HaberesDescuento->del($id)) {
			$this->Session->setFlash(__('HaberesDescuento deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>