<?php
class Afp extends AppModel {

	var $name = 'Afp';
	var $displayField = 'nombre';

	var $validate = array(
		'nombre' => array(
			'rule' => array('minLength', 1),
			'message' => 'Debe ingresar el nombre de la AFP'
		)
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Prevision' => array('className' => 'Prevision',
								'foreignKey' => 'afp_id',
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