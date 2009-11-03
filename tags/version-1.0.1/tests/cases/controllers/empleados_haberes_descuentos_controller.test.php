<?php 
/* SVN FILE: $Id$ */
/* EmpleadosHaberesDescuentosController Test cases generated on: 2008-10-07 18:10:11 : 1223414231*/
App::import('Controller', 'EmpleadosHaberesDescuentos');

class TestEmpleadosHaberesDescuentos extends EmpleadosHaberesDescuentosController {
	var $autoRender = false;
}

class EmpleadosHaberesDescuentosControllerTest extends CakeTestCase {
	var $EmpleadosHaberesDescuentos = null;

	function setUp() {
		$this->EmpleadosHaberesDescuentos = new TestEmpleadosHaberesDescuentos();
		$this->EmpleadosHaberesDescuentos->constructClasses();
	}

	function testEmpleadosHaberesDescuentosControllerInstance() {
		$this->assertTrue(is_a($this->EmpleadosHaberesDescuentos, 'EmpleadosHaberesDescuentosController'));
	}

	function tearDown() {
		unset($this->EmpleadosHaberesDescuentos);
	}
}
?>