<?php
class Empleado extends AppModel {

	var $name = 'Empleado';
	var $displayField = 'rut';

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
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>