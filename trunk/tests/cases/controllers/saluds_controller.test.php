<?php 
/* SVN FILE: $Id$ */
/* SaludsController Test cases generated on: 2008-10-05 01:10:56 : 1223182436*/
App::import('Controller', 'Saluds');

class TestSaluds extends SaludsController {
	var $autoRender = false;
}

class SaludsControllerTest extends CakeTestCase {
	var $Saluds = null;

	function setUp() {
		$this->Saluds = new TestSaluds();
		$this->Saluds->constructClasses();
	}

	function testSaludsControllerInstance() {
		$this->assertTrue(is_a($this->Saluds, 'SaludsController'));
	}

	function tearDown() {
		unset($this->Saluds);
	}
}
?>