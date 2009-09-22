<?php 
/* SVN FILE: $Id$ */
/* EmpleadosController Test cases generated on: 2008-09-16 23:09:09 : 1221616989*/
App::import('Controller', 'Empleados');

class TestEmpleados extends EmpleadosController {
	var $autoRender = false;
}

class EmpleadosControllerTest extends CakeTestCase {
	var $Empleados = null;

	function setUp() {
		$this->Empleados = new TestEmpleados();
	}

	function testEmpleadosControllerInstance() {
		$this->assertTrue(is_a($this->Empleados, 'EmpleadosController'));
	}

	function tearDown() {
		unset($this->Empleados);
	}
}
?>