<?php 
/* SVN FILE: $Id$ */
/* Prevision Test cases generated on: 2008-09-28 22:09:06 : 1222653066*/
App::import('Model', 'Prevision');

class TestPrevision extends Prevision {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class PrevisionTestCase extends CakeTestCase {
	var $Prevision = null;
	var $fixtures = array('app.prevision', 'app.empleado', 'app.afp');

	function start() {
		parent::start();
		$this->Prevision = new TestPrevision();
	}

	function testPrevisionInstance() {
		$this->assertTrue(is_a($this->Prevision, 'Prevision'));
	}

	function testPrevisionFind() {
		$this->Prevision->recursive = -1;
		$results = $this->Prevision->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Prevision' => array(
			'id'  => 1,
			'empleado_id'  => 1,
			'afp_id'  => 1,
			'cotizacion_voluntaria'  => 1,
			'ahorro_voluntario'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>