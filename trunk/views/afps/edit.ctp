<div class="afps form">
<?php echo $form->create('Afp');?>
	<fieldset>
 		<legend>Editar AFP</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre', array('div' => 'w50'));
		echo $form->input('cotizacion', array('label' => 'Cotización', 'div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Borrar', array('action'=>'delete', $form->value('Afp.id')), null, sprintf(__('Está seguro que desea borrar la AFP "%s"?', true), $form->value('Afp.nombre'))); ?></li>
		<li><?php echo $html->link('Lista de AFP', array('action'=>'index'));?></li>
	</ul>
</div>
