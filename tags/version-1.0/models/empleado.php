<?php
class Empleado extends AppModel {

	var $name = 'Empleado';
	var $displayField = 'rut';
	
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
		'nombres' => array(
			'rule' => array('minLength', 1),
			'message' => 'El nombre no ha sido ingresado'
		),
		'apell_paterno' => array(
			'rule' => array('minLength', 1),
			'message' => 'El apellido no ha sido ingresado'
		),
		'sueldo_base' => array(
			'moneda' => array(
				'rule' => array('money'),
				'message' => 'El sueldo ingresado no es válido'
			),
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'El sueldo no ha sido ingresado'
			)
		),
		'telefono' => array(
			'rule' => 'numeric',
			'allowEmpty' => true,
			'message' => 'Teléfono debe ser de tipo numérico'
		),
		'celular' => array(
			'rule' => 'numeric',
			'allowEmpty' => true,
			'message' => 'Celular debe ser de tipo numérico'
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'empresa_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasOne = array(
			'Prevision' => array('className' => 'Prevision',
								'foreignKey' => 'empleado_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Salud' => array('className' => 'Salud',
								'foreignKey' => 'empleado_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
	var $hasMany = array(
			'EmpleadosHaberesDescuento' => array('className' => 'EmpleadosHaberesDescuento',
								'foreignKey' => 'empleado_id',
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