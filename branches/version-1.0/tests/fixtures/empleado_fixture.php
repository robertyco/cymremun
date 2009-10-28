<?php 
/* SVN FILE: $Id$ */
/* Empleado Fixture generated on: 2008-09-28 22:09:45 : 1222652745*/

class EmpleadoFixture extends CakeTestFixture {
	var $name = 'Empleado';
	var $table = 'empleados';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'rut' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'apell_paterno' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'apell_materno' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'nombres' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'direccion' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 30),
			'comuna' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 25),
			'ciudad' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 25),
			'telefono' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'celular' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'empresa_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'created' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'modified' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'rut'  => 'Lorem ip',
			'apell_paterno'  => 'Lorem ipsum dolor ',
			'apell_materno'  => 'Lorem ipsum dolor ',
			'nombres'  => 'Lorem ipsum dolor ',
			'direccion'  => 'Lorem ipsum dolor sit amet',
			'comuna'  => 'Lorem ipsum dolor sit a',
			'ciudad'  => 'Lorem ipsum dolor sit a',
			'telefono'  => 1,
			'celular'  => 1,
			'empresa_id'  => 1,
			'created'  => '2008-09-28 22:45:45',
			'modified'  => '2008-09-28 22:45:45'
			));
}
?>