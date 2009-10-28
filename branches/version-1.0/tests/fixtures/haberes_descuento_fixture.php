<?php 
/* SVN FILE: $Id$ */
/* HaberesDescuento Fixture generated on: 2008-10-07 16:10:38 : 1223408918*/

class HaberesDescuentoFixture extends CakeTestFixture {
	var $name = 'HaberesDescuento';
	var $table = 'haberes_descuentos';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'nombre' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'tipo' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 1),
			'empresa_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'nombre'  => 'Lorem ipsum dolor ',
			'tipo'  => 'Lorem ipsum dolor sit ame',
			'empresa_id'  => 1
			));
}
?>