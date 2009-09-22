<?php 
/* SVN FILE: $Id$ */
/* Isapre Test cases generated on: 2008-10-05 01:10:09 : 1223181249*/
App::import('Model', 'Isapre');

class TestIsapre extends Isapre {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class IsapreTestCase extends CakeTestCase {
	var $Isapre = null;
	var $fixtures = array('app.isapre', 'app.salud');

	function start() {
		parent::start();
		$this->Isapre = new TestIsapre();
	}

	function testIsapreInstance() {
		$this->assertTrue(is_a($this->Isapre, 'Isapre'));
	}

	function testIsapreFind() {
		$this->Isapre->recursive = -1;
		$results = $this->Isapre->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Isapre' => array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum d'
			));
		$this->assertEqual($results, $expected);
	}
}
?>