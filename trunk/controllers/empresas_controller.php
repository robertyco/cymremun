<?php
class EmpresasController extends AppController {

	var $name = 'Empresas';
	var $helpers = array('Html', 'Form');

    function isAuthorized() {
		if ($this->Auth->user('tipo') == 'consultor') {
			return false;
		} else {
			return true;
		}
    }	
	
	function index() {
		$this->Empresa->recursive = 0;
		$this->set('empresas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Empresa no válida');
			$this->redirect(array('action'=>'index'));
		}
		$this->set('empresa', $this->Empresa->read(null, $id));
	}

	function add() {
		$acts = $this->Empresa->Actividad->find('all');
		if (!empty($this->data)) {
			$this->Empresa->create();
			$seguro = $this->Empresa->Actividad->find('first', array('conditions' => array('Actividad.id' => $this->data['Empresa']['actividad_id'])));
			$this->data['Empresa']['porc_seguro'] = $seguro['Actividad']['porcentaje'];
			if ($this->Empresa->save($this->data)) {
				$this->Session->setFlash('La empresa ha sido guardada');
				$this->Session->write('Empresa.id', $this->Empresa->id);
				$this->Session->write('Empresa.nombre', $this->data['Empresa']['nombre']);
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, no se ha podido guardar la empresa.', 'default', array('class' => 'messageError'));
			}
		}	
		$actividads = $this->Empresa->Actividad->find('list', array('fields' => array('Actividad.id', 'Actividad.nombre')));		
		$i = 0;
		foreach ($actividads as $actividad):
			$actividads[$acts[$i]['Actividad']['id']] = $acts[$i]['Actividad']['id'].' - '.$acts[$i]['Actividad']['nombre'];
			$i++;
		endforeach;

		$this->set(compact('actividads'));

	}

	function edit($id = null) {
		$acts = $this->Empresa->Actividad->find('all');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Empresa no válida');
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Empresa->save($this->data)) {
				$this->Session->setFlash('La empresa ha sido modificada.');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Error, no se ha podido modifcar la empresa.', 'default', array('class' => 'messageError'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Empresa->read(null, $id);
		}
		$actividads = $this->Empresa->Actividad->find('list', array('fields' => array('Actividad.id', 'Actividad.nombre')));		
		$i = 0;
		foreach ($actividads as $actividad):
			$actividads[$acts[$i]['Actividad']['id']] = $acts[$i]['Actividad']['id'].' - '.$acts[$i]['Actividad']['nombre'];
			$i++;
		endforeach;

		$this->set(compact('actividads'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Empresa', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Empresa->del($id)) {
			$this->Session->setFlash('La empresa ha sido eliminada.');
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
			$this->redirect(array('action'=>'view', $id));
		}
	}
	
	function buscar() {
		$rut = $this->data['Empresa']['rut'];
		$empresa = $this->Empresa->find('first', array('conditions' => array('Empresa.rut' => $rut)));
		$this->redirect(array('action'=>'view', $empresa['Empresa']['id']));
	}
}
?>