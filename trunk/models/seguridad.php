<?php
class Seguridad extends AppModel {

	var $name = 'Seguridad';
	var $displayField = 'nombre';
	
	var $hasMany = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'seguridad_id',
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