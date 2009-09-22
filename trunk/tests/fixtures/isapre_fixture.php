<?php 
/* SVN FILE: $Id$ */
/* Isapre Fixture generated on: 2008-10-05 01:10:09 : 1223181249*/

class IsapreFixture extends CakeTestFixture {
	var $name = 'Isapre';
	var $table = 'isapres';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'nombre' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 15),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum d'
			));
}
?>