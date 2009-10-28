<?php
class HaberesDescuento extends AppModel {

	var $name = 'HaberesDescuento';
	var $displayField = 'nombre';
	
	var $validate = array(
		'nombre' => array(
			'rule' => array('minLength', 1),
			'message' => 'El nombre no ha sido ingresado'
		));

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'empresa_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
	var $hasMany = array(
			'EmpleadosHaberesDescuento' => array('className' => 'EmpleadosHaberesDescuento',
								'foreignKey' => 'haberes_descuento_id',
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