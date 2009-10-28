<?php
class User extends AppModel {

	var $name = 'User';
	var $displayField = 'username';
	
	var $validate = array(
		'username' => array(
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'El nombre de usuario no ha sido ingresado'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'El nombre de usuario ya existe'
			)
		),
		'password' => array(
			'validapwd' => array(
				'rule' => array('validaPassword'),
				'message' => 'Las contraseñas no son iguales'
			),
			'novacio' => array(
				'rule' => 'notEmpty',
				'message' => 'No se ha ingresado contraseña'
			),
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'No se ha ingresado contraseña'
			)
		),
		'email' => array(
			'rule' => 'email',
			'allowEmpty' => true,
			'message' => 'El mail ingresado no es válido'
		)
	);

	function validaPassword($data){
		if ($this->data['User']['password'] === md5($this->data['User']['password_confirm'])) {
			return true;
		} else {
			return false;
		}
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Empresa' => array('className' => 'Empresa',
								'foreignKey' => 'empresa_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);
}
?>