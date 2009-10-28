<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento', array('action' => 'editDescuentoEmpresa'));?>
	<fieldset>
 		<legend>Editar descuento</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->hidden('empresa_id', array('value' => $empresaId));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>