<?php 
/* SVN FILE: $Id$ */
/* EmpresasController Test cases generated on: 2008-09-17 00:09:02 : 1221620762*/
App::import('Controller', 'Empresas');

class TestEmpresas extends EmpresasController {
	var $autoRender = false;
}

class EmpresasControllerTest extends CakeTestCase {
	var $Empresas = null;

	function setUp() {
		$this->Empresas = new TestEmpresas();
	}

	function testEmpresasControllerInstance() {
		$this->assertTrue(is_a($this->Empresas, 'EmpresasController'));
	}

	function tearDown() {
		unset($this->Empresas);
	}
}
?>