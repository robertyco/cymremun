<?php
class Uf extends AppModel {

	var $name = 'Uf';
	var $useTable = 'uf';
	var $displayField = 'fecha';

	var $validate = array(
		'fecha' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'La fecha ingresada ya existe.'
			)
		)
	);

}
?>