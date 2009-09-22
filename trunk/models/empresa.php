<?php
class Empresa extends AppModel {

	var $name = 'Empresa';
	var $displayField = 'nombre';
	
	var $validate = array(
		'rut' => array(
			'validarut' => array(		
				'rule' => array('validaRut'),
				'message' => 'El RUT ingresado no es válido'
			),
			'minlength' => array(
				'rule' => array('minLength', 1),
				'message' => 'El RUT no ha sido ingresado'
			)
		),
		'nombre' => array(
			'rule' => array('minLength', 1),
			'message' => 'El nombre no ha sido ingresado'
		),
		'direccion' => array(
			'rule' => array('minLength', 1),
			'message' => 'La dirección no ha sido ingresada'
		),
		'ciudad' => array(
			'rule' => array('minLength', 1),
			'message' => 'La ciudad no ha sido ingresada'
		)
	);

	function validaRut($data){
		$r = $this->data['Empresa']['rut'];
		$r=strtoupper(ereg_replace('\.|,|-','',$r));
		$sub_rut=substr($r,0,strlen($r)-1);
		$sub_dv=substr($r,-1);
		$x=2;
		$s=0;
		for ( $i=strlen($sub_rut)-1;$i>=0;$i-- ) {
			if ( $x >7 )
			{
				$x=2;
			}
			$s += $sub_rut[$i]*$x;
			$x++;
		}
		$dv=11-($s%11);
		if ( $dv==10 ) {
			$dv='K';
		}
		if ( $dv==11 ) {
			$dv='0';
		}
		if ( $dv==$sub_dv ) {
			return true;
		}
		else {
			return false;
		}
	}
	
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Empleado' => array('className' => 'Empleado',
								'foreignKey' => 'empresa_id',
								'dependent' => true,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
			),
			'HaberesDescuento' => array('className' => 'HaberesDescuento',
								'foreignKey' => 'empresa_id',
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