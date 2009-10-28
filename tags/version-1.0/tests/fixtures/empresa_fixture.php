<?php 
/* SVN FILE: $Id$ */
/* Empresa Fixture generated on: 2008-09-16 22:09:27 : 1221615807*/

class EmpresaFixture extends CakeTestFixture {
	var $name = 'Empresa';
	var $table = 'empresas';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'rut' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'nombre' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 40),
			'actividad' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 25),
			'direccion' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
			'comuna' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 25),
			'ciudad' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 25),
			'region' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'telefono' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'fax' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'email' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 35),
			'rep_legal_rut' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'rep_legal_nombre' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 40),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
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
}
?>