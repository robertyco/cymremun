<?php 
/* SVN FILE: $Id$ */
/* IsapresController Test cases generated on: 2008-10-05 01:10:48 : 1223181468*/
App::import('Controller', 'Isapres');

class TestIsapres extends IsapresController {
	var $autoRender = false;
}

class IsapresControllerTest extends CakeTestCase {
	var $Isapres = null;

	function setUp() {
		$this->Isapres = new TestIsapres();
		$this->Isapres->constructClasses();
	}

	function testIsapresControllerInstance() {
		$this->assertTrue(is_a($this->Isapres, 'IsapresController'));
	}

	function tearDown() {
		unset($this->Isapres);
	}
}
?>