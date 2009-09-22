<?php 
/* SVN FILE: $Id$ */
/* Salud Test cases generated on: 2008-10-05 01:10:35 : 1223181335*/
App::import('Model', 'Salud');

class TestSalud extends Salud {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SaludTestCase extends CakeTestCase {
	var $Salud = null;
	var $fixtures = array('app.salud', 'app.empleado', 'app.isapre');

	function start() {
		parent::start();
		$this->Salud = new TestSalud();
	}

	function testSaludInstance() {
		$this->assertTrue(is_a($this->Salud, 'Salud'));
	}

	function testSaludFind() {
		$this->Salud->recursive = -1;
		$results = $this->Salud->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Salud' => array(
			'id'  => 1,
			'empleado_id'  => 1,
			'isapre_id'  => 1,
			'valor_plan'  => 1,
			'valor_tipo'  => 'Lorem ipsum dolor sit ame'
			));
		$this->assertEqual($results, $expected);
	}
}
?>