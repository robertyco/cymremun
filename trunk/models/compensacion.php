<?php
class Compensacion extends AppModel {

	var $name = 'Compensacion';
	var $displayField = 'nombre';
	
	var $hasMany = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'compensacion_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			)
	);
}
?>