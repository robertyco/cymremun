<?php
class Empresa extends AppModel {

	var $name = 'Empresa';
	var $displayField = 'nombre';
	
	var $validate = array(
		'rut' => array(
			'validarut' => array(		
				'rule' => 'validaRut',
				'message' => 'El RUT ingresado no es válido'
			),
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'El RUT no ha sido ingresado'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'El RUT ingresado ya existe'
			)
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
		),
		'email' => array(
			'rule' => 'email',
			'allowEmpty' => true,
			'message' => 'El mail ingresado no es válido'
		),
		'telefono' => array(
			'rule' => 'numeric',
			'allowEmpty' => true,
			'message' => 'Teléfono debe ser de tipo numérico'
		),
		'fax' => array(
			'rule' => 'numeric',
			'allowEmpty' => true,
			'message' => 'Fax debe ser de tipo numérico'
		),
		'rep_legal_rut' => array(
			'validarut' => array(		
				'rule' => 'validaRut',
				'message' => 'El RUT ingresado no es válido'
			),
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'El RUT no ha sido ingresado'
			)
		),
		'rep_legal_nombre' => array(
			'rule' => 'notEmpty',			
			'message' => 'No ha ingresado nombre de Rep. Legal'
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
			),
			'HaberesDescuento' => array('className' => 'HaberesDescuento',
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
			),
			'User' => array('className' => 'User',
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
	var $belongsTo = array(
			'Actividad' => array('className' => 'Actividad',
								'foreignKey' => 'actividad_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
}
?>