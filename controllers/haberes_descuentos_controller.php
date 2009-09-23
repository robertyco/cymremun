<?php
class HaberesDescuentosController extends AppController {

	var $name = 'HaberesDescuentos';
	var $uses = array('HaberesDescuento', 'Empleado', 'EmpleadosHaberesDescuento');
	var $helpers = array('Html', 'Form');
	var $paginate = array(
		'HaberesDescuento' => array('order' => array('HaberesDescuento.tipo' => 'asc', 'HaberesDescuento.nombre' => 'asc')),
		'Empleado' => array('order' => array('Empleado.apell_paterno' => 'asc', 'Empleado.apell_materno' => 'asc'))		
	);


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
		$this->set('haberesDescuentos', $this->paginate('HaberesDescuento', array('empresa_id' => $this->Session->read('Empresa.id'))));
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
	
	function asignar_hd($id = null) {
		$this->Empleado->recursive = 0;	
		$this->set('empleados', $this->paginate('Empleado', array('empresa_id' => $this->Session->read('Empresa.id'))));
		$this->HaberesDescuento->id = $id;
		$this->set('haberesDescuento', $this->HaberesDescuento->find());
	}

	function add_asignar_hd($id = null) {		
		$this->Empleado->recursive = 0;
		$empleados = $this->paginate('Empleado', array('empresa_id' => $this->Session->read('Empresa.id')));
		$i = 0;
		foreach ($empleados as $empleado):
			$i++;
			$repetido = $this->EmpleadosHaberesDescuento->find('first', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $empleado['Empleado']['id'],
					'haberes_descuento_id' => $id))
					);
			if ($repetido) {
				$this->EmpleadosHaberesDescuento->id = $repetido['EmpleadosHaberesDescuento']['id'];
			} else {
				$this->EmpleadosHaberesDescuento->create();
			}
			if ($this->EmpleadosHaberesDescuento->saveField('fecha', $this->Session->read('fecha')) && 
				$this->EmpleadosHaberesDescuento->saveField('valor', $this->data['HaberesDescuento']['valor'.$i]) &&
				$this->EmpleadosHaberesDescuento->saveField('empleado_id', $empleado['Empleado']['id']) &&
				$this->EmpleadosHaberesDescuento->saveField('haberes_descuento_id', $id)) {
					$this->Session->setFlash('Los valores han sido asignado correctamente.');
			} else {
				$this->Session->setFlash('Error, los datos no se han podido guardar.', 'default', array('class' => 'messageError'));
			}
		endforeach;		
		$this->redirect(array('action'=>'asignar_hd', $id));
	}
}
?>