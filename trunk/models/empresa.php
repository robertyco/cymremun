<?php
class Empresa extends AppModel {

	var $name = 'Empresa';
	var $displayField = 'nombre';
	
	var $validate = array(
		'rut' => array(
			'rule' => array('minLength', 1),
			'message' => 'El RUT no ha sido ingresado'
		),
		'nombre' => array(
			'rule' => array('minLength', 1),
			'message' => 'El nombre no ha sido ingresado'
		),
		'direccion' => array(
			'rule' => array('minLength', 1),
			'message' => 'La dirección no ha sido ingresada'
		),
		'ciudad' => array(
			'rule' => array('minLength', 1),
			'message' => 'La ciudad no ha sido ingresada'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empresa_id',
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