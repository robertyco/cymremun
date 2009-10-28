<?php 
/* SVN FILE: $Id$ */
/* Afp Test cases generated on: 2008-09-28 22:09:58 : 1222652878*/
App::import('Model', 'Afp');

class TestAfp extends Afp {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class AfpTestCase extends CakeTestCase {
	var $Afp = null;
	var $fixtures = array('app.afp', 'app.prevision');

	function start() {
		parent::start();
		$this->Afp = new TestAfp();
	}

	function testAfpInstance() {
		$this->assertTrue(is_a($this->Afp, 'Afp'));
	}

	function testAfpFind() {
		$this->Afp->recursive = -1;
		$results = $this->Afp->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Afp' => array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum d',
			'cotizacion'  => 'Lorem ipsum d'
			));
		$this->assertEqual($results, $expected);
	}
}
?>