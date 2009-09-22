<?php 
/* SVN FILE: $Id$ */
/* HaberesDescuentosController Test cases generated on: 2008-10-07 16:10:50 : 1223409110*/
App::import('Controller', 'HaberesDescuentos');

class TestHaberesDescuentos extends HaberesDescuentosController {
	var $autoRender = false;
}

class HaberesDescuentosControllerTest extends CakeTestCase {
	var $HaberesDescuentos = null;

	function setUp() {
		$this->HaberesDescuentos = new TestHaberesDescuentos();
		$this->HaberesDescuentos->constructClasses();
	}

	function testHaberesDescuentosControllerInstance() {
		$this->assertTrue(is_a($this->HaberesDescuentos, 'HaberesDescuentosController'));
	}

	function tearDown() {
		unset($this->HaberesDescuentos);
	}
}
?>