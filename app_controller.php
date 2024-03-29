<?php
/* SVN FILE: $Id: app_controller.php 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.app
 */
class AppController extends Controller {
	var $components = array('Auth');
	var $helpers = array('Ajax', 'Javascript');
	var $uses = array('Empresa');

	function beforeFilter() {
		//$this->Auth->allow('*');		
		$this->Auth->authorize = 'controller';
		$this->Auth->logoutRedirect = '/'; 
		Security::setHash('md5');		
		$this->set('Auth',$this->Auth->user()); 
		if ($this->Auth->user('tipo') == 'consultor') {
			$this->Session->write('Empresa.id', $this->Auth->user('empresa_id'));
		}
		if (!$this->Session->check('mes')) $this->Session->write('mes', date('m'));
		if (!$this->Session->check('ano')) $this->Session->write('ano', date('Y'));
		if (!$this->Session->check('fecha')) $this->Session->write('fecha', date('Y').'-'.date('m').'-00');
		
		if ($this->Session->check('Empresa.id')) {
			$empr = $this->Empresa->find('first', array(
				'conditions' => array('Empresa.id' => $this->Session->read('Empresa.id')),
				'recursive' => 0
			));
			$this->Session->write('Empresa.nombre', $empr['Empresa']['nombre']);
			$this->Session->write('Empresa.seguridad_id', $empr['Empresa']['seguridad_id']);
		}
	}
}
?>