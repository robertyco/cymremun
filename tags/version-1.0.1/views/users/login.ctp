<?php
    //if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('User', array('action' => 'login'));
    echo $form->input('username', array('label' => 'Usuario:', 'div' => 'w25'));
	echo '<br />';
    echo $form->input('password', array('label' => 'Contraseña:', 'div' => 'w25'));
	echo '<br /><br />';
    echo $form->end('Login');
?>