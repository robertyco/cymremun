<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<div class="afps form">
<?php echo $form->create('ImpuestoUnico');?>
	<fieldset>
 		<legend>Editar Tabla Impuesto Unico</legend>
	<?php
		echo $form->input('tramo');
		echo $form->input('tasa', array('div' => 'w25', 'class' => 'required number'));
		echo $form->input('rebaja', array('div' => 'w25', 'class' => 'required number'));
		echo $form->input('requisito', array('div' => 'w25', 'class' => 'required number'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>