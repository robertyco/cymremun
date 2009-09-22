<?php 
/* SVN FILE: $Id$ */
/* EmpleadosHaberesDescuento Fixture generated on: 2008-10-07 18:10:30 : 1223413830*/

class EmpleadosHaberesDescuentoFixture extends CakeTestFixture {
	var $name = 'EmpleadosHaberesDescuento';
	var $table = 'empleados_haberes_descuentos';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'fecha' => array('type'=>'date', 'null' => true, 'default' => NULL),
			'valor' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'empleado_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'haberes_descuento_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'fecha'  => '2008-10-07',
			'valor'  => 1,
			'empleado_id'  => 1,
			'haberes_descuento_id'  => 1
			));
}
?>