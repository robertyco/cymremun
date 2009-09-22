<?php
class Empleado extends AppModel {

	var $name = 'Empleado';
	var $displayField = 'rut';
	
	var $validate = array(
		'rut' => array(
			'rule' => array('minLength', 1),
			'message' => 'Debe ingresar el RUT del empleado'
		),
		'nombres' => array(
			'rule' => array('minLength', 1),
			'message' => 'Debe ingresar el nombre del empleado'
		),
		'apell_paterno' => array(
			'rule' => array('minLength', 1),
			'message' => 'Debe ingresar el apellido del empleado'
		),
		'sueldo_base' => array(
			'rule' => array('money')
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