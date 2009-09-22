<?php 
/* SVN FILE: $Id$ */
/* Afp Fixture generated on: 2008-09-28 22:09:57 : 1222652877*/

class AfpFixture extends CakeTestFixture {
	var $name = 'Afp';
	var $table = 'afps';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'nombre' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 15),
			'cotizacion' => array('type'=>'float', 'null' => true, 'default' => '0'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum d',
			'cotizacion'  => 'Lorem ipsum d'
			));
}
?>