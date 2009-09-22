<?php 
/* SVN FILE: $Id$ */
/* PrevisionsController Test cases generated on: 2008-09-28 22:09:21 : 1222653261*/
App::import('Controller', 'Previsions');

class TestPrevisions extends PrevisionsController {
	var $autoRender = false;
}

class PrevisionsControllerTest extends CakeTestCase {
	var $Previsions = null;

	function setUp() {
		$this->Previsions = new TestPrevisions();
		$this->Previsions->constructClasses();
	}

	function testPrevisionsControllerInstance() {
		$this->assertTrue(is_a($this->Previsions, 'PrevisionsController'));
	}

	function tearDown() {
		unset($this->Previsions);
	}
}
?>