<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<div class="afps form">
<?php echo $form->create('AsignacionFamiliar');?>
	<fieldset>
 		<legend>Editar Asignacion Familiar</legend>
	<?php
		echo $form->input('tramo');
		echo $form->input('monto', array('div' => 'w25', 'class' => 'required number'));
		echo $form->input('requisito', array('div' => 'w25', 'class' => 'required number'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>