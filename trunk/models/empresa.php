<?php
class Empresa extends AppModel {

	var $name = 'Empresa';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empresa_id',
								'dependent' => false,
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