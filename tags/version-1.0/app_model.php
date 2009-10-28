<?php
/* SVN FILE: $Id: app_model.php 6311 2008-01-02 06:33:52Z phpnut $ */

/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.app
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-01 22:33:52 -0800 (Tue, 01 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.app
 */
class AppModel extends Model{

	function validaRut($data) {
		$r = array_values($data);
		$r = $r[0];
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
	
}
?>