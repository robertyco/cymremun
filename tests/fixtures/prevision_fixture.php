<?php 
/* SVN FILE: $Id$ */
/* Prevision Fixture generated on: 2008-09-28 22:09:06 : 1222653066*/

class PrevisionFixture extends CakeTestFixture {
	var $name = 'Prevision';
	var $table = 'previsions';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'empleado_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'afp_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'cotizacion_voluntaria' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'ahorro_voluntario' => array('type'=>'integer', 'null' => true, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'empleado_id'  => 1,
			'afp_id'  => 1,
			'cotizacion_voluntaria'  => 1,
			'ahorro_voluntario'  => 1
			));
}
?>