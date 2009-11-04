<div class="afps form">
<?php echo $form->create('AsignacionFamiliar');?>
	<fieldset>
 		<legend>Editar Asignacion Familiar</legend>
	<?php
		echo $form->input('tramo');
		echo $form->input('monto', array('div' => 'w25'));
		echo $form->input('requisito', array('div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>