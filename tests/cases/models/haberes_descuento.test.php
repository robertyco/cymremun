<?php 
/* SVN FILE: $Id$ */
/* HaberesDescuento Test cases generated on: 2008-10-07 16:10:38 : 1223408918*/
App::import('Model', 'HaberesDescuento');

class TestHaberesDescuento extends HaberesDescuento {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class HaberesDescuentoTestCase extends CakeTestCase {
	var $HaberesDescuento = null;
	var $fixtures = array('app.haberes_descuento', 'app.empresa');

	function start() {
		parent::start();
		$this->HaberesDescuento = new TestHaberesDescuento();
	}

	function testHaberesDescuentoInstance() {
		$this->assertTrue(is_a($this->HaberesDescuento, 'HaberesDescuento'));
	}

	function testHaberesDescuentoFind() {
		$this->HaberesDescuento->recursive = -1;
		$results = $this->HaberesDescuento->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('HaberesDescuento' => array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum dolor ',
			'tipo'  => 'Lorem ipsum dolor sit ame',
			'empresa_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>