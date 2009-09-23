<?php
class User extends AppModel {

	var $name = 'User';
	var $displayField = 'username';
	
	var $validate = array(
		'username' => array(
			'rule' => array('minLength', 1),
			'message' => 'El nombre de usuario no ha sido ingresado'
		),
		'password' => array(
			'rule' => array('validaPassword'),
			'message' => 'La contraseña ha sido mal ingresada'
		)
	);

	function validaPassword($data){
		if ($this->data['User']['password'] == md5($this->data['User']['password_confirm'])) {
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