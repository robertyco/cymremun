<?php 
/* SVN FILE: $Id$ */
/* EmpleadosHaberesDescuento Test cases generated on: 2008-10-07 18:10:30 : 1223413830*/
App::import('Model', 'EmpleadosHaberesDescuento');

class TestEmpleadosHaberesDescuento extends EmpleadosHaberesDescuento {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class EmpleadosHaberesDescuentoTestCase extends CakeTestCase {
	var $EmpleadosHaberesDescuento = null;
	var $fixtures = array('app.empleados_haberes_descuento', 'app.empleado', 'app.haberes_descuento');

	function start() {
		parent::start();
		$this->EmpleadosHaberesDescuento = new TestEmpleadosHaberesDescuento();
	}

	function testEmpleadosHaberesDescuentoInstance() {
		$this->assertTrue(is_a($this->EmpleadosHaberesDescuento, 'EmpleadosHaberesDescuento'));
	}

	function testEmpleadosHaberesDescuentoFind() {
		$this->EmpleadosHaberesDescuento->recursive = -1;
		$results = $this->EmpleadosHaberesDescuento->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('EmpleadosHaberesDescuento' => array(
			'id'  => 1,
			'fecha'  => '2008-10-07',
			'valor'  => 1,
			'empleado_id'  => 1,
			'haberes_descuento_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>