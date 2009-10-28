<?php
class Prevision extends AppModel {

	var $name = 'Prevision';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empleado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Afp' => array('className' => 'Afp',
								'foreignKey' => 'afp_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>