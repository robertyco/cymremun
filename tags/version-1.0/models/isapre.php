<?php
class Isapre extends AppModel {

	var $name = 'Isapre';
	var $displayField = 'nombre';
	
	var $validate = array(
		'nombre' => array(
			'rule' => array('minLength', 1),
			'message' => 'Debe ingresar el nombre de la Isapre'
		)
	);	

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Salud' => array('className' => 'Salud',
								'foreignKey' => 'isapre_id',
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