<?php 
/* SVN FILE: $Id$ */
/* User Fixture generated on: 2008-11-03 22:11:47 : 1225765007*/

class UserFixture extends CakeTestFixture {
	var $name = 'User';
	var $table = 'users';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 30),
			'password' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
			'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
			'tipo' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'tipo'  => 1
			));
}
?>