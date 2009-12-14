<?php
class PlanillasController extends AppController {

	var $name = 'Planillas';
	var $uses = array('Afp', 'Empresa', 'Empleado', 'Liquidacion', 'Isapre');

	function isAuthorized() {
        if ($this->action == 'add' || $this->action == 'delete') {
            if ($this->Auth->user('tipo') == 'consultor') {
                return false;
            }
        }
		return true;
	}

	function afp() {
		$this->Afp->recursive = 0;
		$this->set('afps', $this->paginate('Afp', array('Afp.id !=' => 16)));
	}
	function isapre() {
		$this->Isapre->recursive = 0;
		$this->set('isapres', $this->paginate('Isapre', array('Isapre.id !=' => 1)));
	}
	
	function imprimirAfp($ids = null) {
		$this->layout = 'pdf';
		
		if ($ids) {
			$afps = $this->Afp->find('all', array(
				'conditions' => array('Afp.id' => $ids),
				'order' => array('nombre' => 'asc'),
				'recursive' => 0
			));
		} else {
			$afps = $this->Afp->find('all', array(
				'conditions' => array('Afp.id !=' => 16),
				'order' => array('nombre' => 'asc'),
				'recursive' => 0
			));
		}
		
		$empresa = $this->Empresa->find('first', array(
			'conditions' => array('Empresa.id' => $this->Session->read('Empresa.id')),
			'recursive' => 0
		));
		$ntrab = $this->Empleado->find('count', array('conditions' => array('Empleado.empresa_id' => $this->Session->read('Empresa.id'))));
		
		$i = 0;
		foreach ($afps as $afp):
			$empleados[$i] = $this->Empresa->Empleado->find('all', array(
				'conditions' => array('Empleado.empresa_id' => $this->Session->read('Empresa.id'), 
									'Prevision.afp_id' => $afp['Afp']['id']),
				'order' => array('apell_paterno' => 'asc'),
				'recursive' => 0
			));
			$j = 0;
			foreach ($empleados[$i] as $empleado):
				$hola = $this->Liquidacion->find('first', array(
					'conditions' => array('empleado_id' => $empleado['Empleado']['id'], 
					'fecha' => $this->Session->read('fecha')), 
					'recursive' => -1));
				$empleados[$i][$j]['Liquidacion'] = $hola['Liquidacion'];
				$j++;
			endforeach;
			$i++;
		endforeach;
			
		$this->set('afps', $afps);
		$this->set('empresa', $empresa);
		$this->set('ntrab', $ntrab);
		$this->set('empleados', $empleados);
	}
	
	function imprimirIsapre($ids = null) {
		$this->layout = 'pdf';
		
		if ($ids) {
			$isapres = $this->Isapre->find('all', array(
				'conditions' => array('Isapre.id' => $ids),
				'order' => array('nombre' => 'asc'),
				'recursive' => 0
			));
		} else {
			$isapres = $this->Isapre->find('all', array(
				'conditions' => array('Isapre.id !=' => 1),
				'order' => array('nombre' => 'asc'),
				'recursive' => 0
			));
		}
		$empresa = $this->Empresa->find('first', array(
			'conditions' => array('Empresa.id' => $this->Session->read('Empresa.id')),
			'recursive' => 0
		));
		
		$i = 0;
		foreach ($isapres as $isapre):
			$empleados[$i] = $this->Empresa->Empleado->find('all', array(
				'conditions' => array('Empleado.empresa_id' => $this->Session->read('Empresa.id'), 
									'Salud.isapre_id' => $isapre['Isapre']['id']),
				'order' => array('apell_paterno' => 'asc'),
				'recursive' => 0
			));
			$j = 0;
			foreach ($empleados[$i] as $empleado):
				$hola = $this->Liquidacion->find('first', array(
					'conditions' => array('empleado_id' => $empleado['Empleado']['id'], 
					'fecha' => $this->Session->read('fecha')), 
					'recursive' => -1));
				$empleados[$i][$j]['Liquidacion'] = $hola['Liquidacion'];
				$j++;
			endforeach;
			$i++;
		endforeach;
		
		$this->set('isapres', $isapres);
		$this->set('empresa', $empresa);
		$this->set('empleados', $empleados);
	}
}
?>