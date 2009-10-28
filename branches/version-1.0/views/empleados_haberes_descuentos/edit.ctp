<div class="empleadosHaberesDescuentos form">
<?php echo $form->create('EmpleadosHaberesDescuento');?>
	<fieldset>
 		<legend></legend>
	<?php
		echo $form->input('id');
		echo $form->input('haberes_descuento_id', array('label' => 'Ítem', 'div' => 'w25'));
		echo $form->input('valor', array('div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>