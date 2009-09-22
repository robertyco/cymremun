<?php
class EmpleadosController extends AppController {

	var $name = 'Empleados';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Empleado->recursive = 0;
		$this->set('empleados', $this->paginate(array('empresa_id' => $this->Session->read('Empresa.id'))));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Empleado no válido');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('empleado', $this->Empleado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['Empleado']['empresa_id'] = $this->Session->read('Empresa.id');
			$this->Empleado->create();
			if ($this->Empleado->saveAll($this->data)) {
				$this->Session->setFlash('El empleado ha sido guardado');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('El empleado no se ha podido guardar. Por favor, intente nuevamente');
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
				$this->Session->setFlash('El empleado ha sido modificado');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('El empleado no se ha podido modificar. Por favor, intente nuevamente');
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
			$this->Session->setFlash(__('Empleado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>