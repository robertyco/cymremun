<?php
class Liquidacion extends AppModel {

	var $name = 'AsignacionFamiliar';
	var $useTable = 'liquidaciones';

	var $belongsTo = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empleado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
	
}
?>