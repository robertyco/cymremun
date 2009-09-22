<?php 
/* SVN FILE: $Id$ */
/* AfpsController Test cases generated on: 2008-09-28 19:09:22 : 1222640842*/
App::import('Controller', 'Afps');

class TestAfps extends AfpsController {
	var $autoRender = false;
}

class AfpsControllerTest extends CakeTestCase {
	var $Afps = null;

	function setUp() {
		$this->Afps = new TestAfps();
		$this->Afps->constructClasses();
	}

	function testAfpsControllerInstance() {
		$this->assertTrue(is_a($this->Afps, 'AfpsController'));
	}

	function tearDown() {
		unset($this->Afps);
	}
}
?>