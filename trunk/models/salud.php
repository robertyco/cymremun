<?php
class Salud extends AppModel {

	var $name = 'Salud';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empleado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Isapre' => array('className' => 'Isapre',
								'foreignKey' => 'isapre_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>