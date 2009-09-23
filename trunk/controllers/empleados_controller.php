<?php
class EmpleadosController extends AppController {

	var $name = 'Empleados';
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
		if (!$this->Session->check('Empresa.id')) {
			$this->Session->setFlash('Debe activar una empresa');
		} 
		$this->Empleado->recursive = 0;
		$this->set('empleados', $this->paginate(array('empresa_id' => $this->Session->read('Empresa.id'))));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Empleado no válido');
			$this->redirect(array('action'=>'index'));
		}
		$this->Empleado->recursive = 2;
		$this->set('empleado', $this->Empleado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['Empleado']['empresa_id'] = $this->Session->read('Empresa.id');
			$this->Empleado->create();
			if ($this->Empleado->saveAll($this->data)) {
				$this->Session->setFlash('El empleado ha sido guardado.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, no se ha podido guardar el empleado.', 'default', array('class' => 'messageError'));
			}
		}
		$afps = $this->Empleado->Prevision->Afp->find('list');
		$isapres = $this->Empleado->Salud->Isapre->find('list');
		$empresas = $this->Empleado->Empresa->find('list');
		$this->set(compact('empresas', 'afps', 'isapres'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Empleado', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			$this->data['Empleado']['empresa_id'] = $this->Session->read('Empresa.id');
			if ($this->Empleado->saveAll($this->data)) {
				$this->Session->setFlash('El empleado ha sido modificado.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, el empleado no se ha podido modificar.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Empleado->read(null, $id);
		}
		$afps = $this->Empleado->Prevision->Afp->find('list');
		$isapres = $this->Empleado->Salud->Isapre->find('list');
		$empresas = $this->Empleado->Empresa->find('list');
		$this->set(compact('empresas', 'afps', 'isapres'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Empleado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Empleado->del($id)) {
			$this->Session->setFlash('El empleado ha sido eliminado.');
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>