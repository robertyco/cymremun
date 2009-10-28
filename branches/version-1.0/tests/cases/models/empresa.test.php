<?php 
/* SVN FILE: $Id$ */
/* Empresa Test cases generated on: 2008-09-16 22:09:50 : 1221615830*/
App::import('Model', 'Empresa');

class TestEmpresa extends Empresa {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class EmpresaTestCase extends CakeTestCase {
	var $Empresa = null;
	var $fixtures = array('app.empresa', 'app.empleado');

	function start() {
		parent::start();
		$this->Empresa = new TestEmpresa();
	}

	function testEmpresaInstance() {
		$this->assertTrue(is_a($this->Empresa, 'Empresa'));
	}

	function testEmpresaFind() {
		$results = $this->Empresa->recursive = -1;
		$results = $this->Empresa->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Empresa' => array(
			'id'  => 1,
			'rut'  => 'Lorem ip',
			'nombre'  => 'Lorem ipsum dolor sit amet',
			'actividad'  => 'Lorem ipsum dolor sit a',
			'direccion'  => 'Lorem ipsum dolor sit amet',
			'comuna'  => 'Lorem ipsum dolor sit a',
			'ciudad'  => 'Lorem ipsum dolor sit a',
			'region'  => 'Lorem ipsum dolor ',
			'telefono'  => 1,
			'fax'  => 1,
			'email'  => 'Lorem ipsum dolor sit amet',
			'rep_legal_rut'  => 'Lorem ip',
			'rep_legal_nombre'  => 'Lorem ipsum dolor sit amet',
			'created'  => '2008-09-16 22:43:27',
			'modified'  => '2008-09-16 22:43:27'
			));
		$this->assertEqual($results, $expected);
	}
}
?>