<div class="afps form">
<?php echo $form->create('ImpuestoUnico');?>
	<fieldset>
 		<legend>Editar Tabla Impuesto Unico</legend>
	<?php
		echo $form->input('tramo');
		echo $form->input('tasa', array('div' => 'w25'));
		echo $form->input('rebaja', array('div' => 'w25'));
		echo $form->input('requisito', array('div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>