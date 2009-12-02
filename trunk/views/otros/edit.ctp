<div class="otros form">
<?php echo $form->create('Otro');?>
	<fieldset>
 		<legend>Editar Dato</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre', array('div' => 'w50'));
		echo $form->input('valor', array('div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
