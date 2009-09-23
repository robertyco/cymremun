<?php
class UsersController extends AppController {
	var $name = 'Users';

    function isAuthorized() {
        if ($this->action == 'index' || $this->action == 'add' || $this->action == 'edit' 
															|| $this->action == 'delete') {
            if ($this->Auth->user('tipo') == 'administrador') {
                return true;
            } else {
                return false;
            }
        }
        return true;
    }

    function login() {
		$this->layout = 'login';
    }

    function logout() {
		$this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}
	
	function add() {
		if ($this->data['User']['password'] == 'd41d8cd98f00b204e9800998ecf8427e') {
			$this->data['User']['password'] = '';
		}
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('El usuario ha sido creado');
			} else {
				$this->Session->setFlash('Error, el usuario no se ha podido crear', 'default', array('class' => 'messageError'));
			}
		}
		$empresas = $this->User->Empresa->find('list');
		$this->set(compact('empresas'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Usuario no válido');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash('El usuario ha sido modificado');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, el usuario no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$empresas = $this->User->Empresa->find('list');
		$this->set(compact('empresas'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('id no válida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash('El usuario se ha borrado');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>