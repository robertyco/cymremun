<?php 
/* SVN FILE: $Id$ */
/* Empleado Test cases generated on: 2008-09-28 22:09:49 : 1222652749*/
App::import('Model', 'Empleado');

class TestEmpleado extends Empleado {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class EmpleadoTestCase extends CakeTestCase {
	var $Empleado = null;
	var $fixtures = array('app.empleado', 'app.empresa', 'app.prevision');

	function start() {
		parent::start();
		$this->Empleado = new TestEmpleado();
	}

	function testEmpleadoInstance() {
		$this->assertTrue(is_a($this->Empleado, 'Empleado'));
	}

	function testEmpleadoFind() {
		$this->Empleado->recursive = -1;
		$results = $this->Empleado->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Empleado' => array(
			'id'  => 1,
			'rut'  => 'Lorem ip',
			'apell_paterno'  => 'Lorem ipsum dolor ',
			'apell_materno'  => 'Lorem ipsum dolor ',
			'nombres'  => 'Lorem ipsum dolor ',
			'direccion'  => 'Lorem ipsum dolor sit amet',
			'comuna'  => 'Lorem ipsum dolor sit a',
			'ciudad'  => 'Lorem ipsum dolor sit a',
			'telefono'  => 1,
			'celular'  => 1,
			'empresa_id'  => 1,
			'created'  => '2008-09-28 22:45:45',
			'modified'  => '2008-09-28 22:45:45'
			));
		$this->assertEqual($results, $expected);
	}
}
?>