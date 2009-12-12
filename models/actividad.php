<?php
class Actividad extends AppModel {

	var $name = 'Actividad';
	var $displayField = 'nombre';
	
	var $hasMany = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'actividad_id',
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