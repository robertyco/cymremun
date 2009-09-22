<?php
class EmpleadosHaberesDescuento extends AppModel {

	var $name = 'EmpleadosHaberesDescuento';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empleado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'HaberesDescuento' => array('className' => 'HaberesDescuento',
								'foreignKey' => 'haberes_descuento_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>