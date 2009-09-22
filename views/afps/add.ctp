<div class="afps form">
<?php echo $form->create('Afp');?>
	<fieldset>
 		<legend>AFP</legend>
	<?php
		echo $form->input('nombre', array('div' => 'w50'));
		echo $form->input('cotizacion', array('label' => 'Cotización', 'div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
