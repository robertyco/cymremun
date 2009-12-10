<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
	echo $javascript->link('formularios.js');
?>
<div class="users form">
<?php echo $form->create('User');?>
	<fieldset>
 		<legend>Usuario</legend>
	<?php
		echo $form->input('id');
		echo $form->input('username', array('label' => 'Usuario *', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('password', array('value' => '', 'label' => 'Contraseña *', 'div' => 'w25'));
		echo $form->input('password_confirm', array('value' => '', 'type' => 'password', 'label' => 'Confirmar contraseña *', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('email', array('label' => 'e-mail', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('tipo', array('label' => 'Tipo *', 
											'options' => array('consultor' => 'Consultor', 
															'digitador' => 'Digitador', 
															'administrador' => 'Administrador'), 
																'div' => 'w25', 'onChange' => 'bloqEmpresa();'
															));
		echo $form->input('empresa_id', array('empty' => '   ', 'label' => 'Empresa', 'div' => 'w50'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<script>bloqEmpresa();</script>