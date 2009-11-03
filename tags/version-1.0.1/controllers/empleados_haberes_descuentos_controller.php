<?php
class EmpleadosHaberesDescuentosController extends AppController {

	var $name = 'EmpleadosHaberesDescuentos';
	var $uses = array('EmpleadosHaberesDescuento', 'Empleado');
	var $helpers = array('Html', 'Form');
	
    function isAuthorized() {
		if ($this->action == 'add' || $this->action == 'edit' || $this->action == 'delete' || 
			$this->action == 'cargarHd' || $this->action == 'addValorHd' || $this->action == 'addHdEmpleadoForm') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
        return true;
    }
	
	function index() {
		$this->EmpleadosHaberesDescuento->recursive = 0;
		$this->set('empleadosHaberesDescuentos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid EmpleadosHaberesDescuento.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('empleadosHaberesDescuento', $this->EmpleadosHaberesDescuento->read(null, $id));
	}

	function add($id = null) {
		if ($id) {
			$this->Session->write('Empleado.id', $id);
		}
		$this->Empleado->id = $this->Session->read('Empleado.id');		
		$this->set('empleadoNombre', $this->Empleado->find());
		$this->set('empleadosHaberesDescuentos', $this->paginate(array('empleado_id' => $this->Session->read('Empleado.id'), 'fecha' => $this->Session->read('fecha'))));
		if (!empty($this->data)) {
			$this->data['EmpleadosHaberesDescuento']['fecha'] = $this->Session->read('fecha');
			$this->data['EmpleadosHaberesDescuento']['empleado_id'] = $this->Session->read('Empleado.id');
			$this->EmpleadosHaberesDescuento->create();
			if ($this->EmpleadosHaberesDescuento->save($this->data)) {				
				$this->Session->setFlash('El ítem ha sido asignado');
				$this->redirect(array('action'=>'add', $this->Session->read('Empleado.id')));
			} else {
				$this->Session->setFlash(__('The EmpleadosHaberesDescuento could not be saved. Please, try again.', true));
			}
		}
		$haberesDescuentos = $this->EmpleadosHaberesDescuento->HaberesDescuento->find('list', array(
						'conditions' => array('empresa_id' => $this->Session->read('Empresa.id'))));
		$this->set(compact('haberesDescuentos'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid EmpleadosHaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {			
			$this->data['EmpleadosHaberesDescuento']['empleado_id'] = $this->Session->read('Empleado.id');
			if ($this->EmpleadosHaberesDescuento->save($this->data)) {
				$this->Session->setFlash('El ítem ha sido modificado');
				$this->redirect(array('action'=>'add', $this->Session->read('Empleado.id')));
			} else {
				$this->Session->setFlash(__('The EmpleadosHaberesDescuento could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EmpleadosHaberesDescuento->read(null, $id);
		}		
		$haberesDescuentos = $this->EmpleadosHaberesDescuento->HaberesDescuento->find('list', array(
						'conditions' => array('empresa_id' => $this->Session->read('Empresa.id'))));
		$this->set(compact('haberesDescuentos'));
	}

	function delete($id = null, $empleadoId = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for EmpleadosHaberesDescuento', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EmpleadosHaberesDescuento->del($id)) {
			$this->Session->setFlash('El ítem ha sido eliminado.');
			$this->redirect(array('action'=>'addHdEmpleado', $empleadoId));
		}
	}
	
	function addHdEmpleado($id = null) {
		$this->Empleado->id = $id;
		$this->set('empleadoNombre', $this->Empleado->find());		
		$this->set('empleadosHaberesDescuentos', $this->paginate(array('empleado_id' => $id, 'fecha' => $this->Session->read('fecha'))));
		$this->set('haberesEmpleado', $this->paginate('EmpleadosHaberesDescuento', array(
				'empleado_id' => $id, 
				'fecha' => $this->Session->read('fecha'),
				'HaberesDescuento.tipo' => array('I', 'N')
		)));
		$this->set('descuentosEmpleado', $this->paginate('EmpleadosHaberesDescuento', array(
				'empleado_id' => $id, 
				'fecha' => $this->Session->read('fecha'),
				'HaberesDescuento.tipo' => 'D'
		)));
		
		$empleado = $this->Empleado->find();
		$this->set('empresaId', $empleado['Empleado']['empresa_id']);
		$this->set('empleadoId', $empleado['Empleado']['id']);
	}
	
	function cargarHd($empresaId = null, $empleadoId = null) {	
		$haberesDescuentos = $this->paginate('HaberesDescuento', array(				
				'Empresa.id' => $empresaId
		));		
		$empleado = $this->paginate('Empleado', array(		
				'Empleado.id' => $empleadoId
		));
		
		$this->EmpleadosHaberesDescuento->id = $empleadoId;
		
		$i = 0;
		foreach ($haberesDescuentos as $haberDescuento):
			$i++;
			$repetido = $this->EmpleadosHaberesDescuento->find('first', array(
				'conditions' => array('fecha' => $this->Session->read('fecha'), 
					'empleado_id' => $empleadoId,
					'haberes_descuento_id' => $haberDescuento['HaberesDescuento']['id']))
					);
			if ($repetido) {
				$this->EmpleadosHaberesDescuento->id = $repetido['EmpleadosHaberesDescuento']['id'];
			} else {
				$this->EmpleadosHaberesDescuento->create();
			}			
			
			if ($this->EmpleadosHaberesDescuento->saveField('fecha', $this->Session->read('fecha')) && 				
				$this->EmpleadosHaberesDescuento->saveField('empleado_id', $empleadoId) &&
				$this->EmpleadosHaberesDescuento->saveField('haberes_descuento_id', $haberDescuento['HaberesDescuento']['id'])) {
					$this->Session->setFlash('Se han asignado los haberes y descuentos');
			} else {
				$this->Session->setFlash('Error, los datos no se han podido guardar.', 'default', array('class' => 'messageError'));
			}
		endforeach;
		$this->redirect(array('action'=>'addHdEmpleado', $empleadoId));
	}
	
	function addValorHd() {
		if (!empty($this->data)) {			
			if ($this->EmpleadosHaberesDescuento->saveAll($this->data['EmpleadosHaberesDescuento'])) {				
				$this->Session->setFlash('Los valores se han asignado');
				$empleadoId = $this->EmpleadosHaberesDescuento->field('empleado_id');				
				$this->redirect(array('action'=>'addHdEmpleado', $empleadoId));
			} else {
				$this->Session->setFlash('Error, los valores no se han podido asignar', 'default', array('class' => 'messageError'));
			}
		}
	}
	
	function addHdEmpleadoForm() {
		$this->data['EmpleadosHaberesDescuento']['fecha'] = $this->Session->read('fecha');		
		if (!empty($this->data)) {	
			$this->EmpleadosHaberesDescuento->create();
			if ($this->EmpleadosHaberesDescuento->saveAll($this->data)) {				
				$this->Session->setFlash('El ítem se ha asignado');
			} else {
				$this->Session->setFlash('Error, el ítem no se ha podido asignar', 'default', array('class' => 'messageError'));
			}
			$empleadoId = $this->data['EmpleadosHaberesDescuento']['empleado_id'];
			$this->redirect(array('action'=>'addHdEmpleado', $empleadoId));
		}
	}

}
?>