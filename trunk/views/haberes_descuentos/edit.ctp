<?php if ($session->check('Empresa.id')) { ?>

<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento');?>
	<fieldset>
 		<legend>Editar haber o descuento</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre');
		echo $form->input('tipo', array('options' => array(
											'I'=>'Imponible',
											'N'=>'No Imponible',
											'D'=>'Descuento'
										)));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Borrar', array('action'=>'delete', $form->value('HaberesDescuento.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('HaberesDescuento.id'))); ?></li>
		<li><?php echo $html->link('Listar haberes y descuentos', array('action'=>'index'));?></li>
	</ul>
</div>

<?php } ?>