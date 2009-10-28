<?php 
/* SVN FILE: $Id$ */
/* Salud Fixture generated on: 2008-10-05 01:10:35 : 1223181335*/

class SaludFixture extends CakeTestFixture {
	var $name = 'Salud';
	var $table = 'saluds';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'empleado_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'isapre_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'valor_plan' => array('type'=>'float', 'null' => true, 'default' => NULL),
			'valor_tipo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 1),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'empleado_id'  => 1,
			'isapre_id'  => 1,
			'valor_plan'  => 1,
			'valor_tipo'  => 'Lorem ipsum dolor sit ame'
			));
}
?>