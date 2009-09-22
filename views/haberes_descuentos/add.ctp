<?php if ($session->check('Empresa.id')) { ?>

<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento');?>
	<fieldset>
 		<legend>Agregar haber o descuento</legend>
	<?php
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->input('tipo', array('options' => array(
											'I'=>'Imponible',
											'N'=>'No Imponible',
											'D'=>'Descuento'
										), 'div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Listar haberes y descuentos', array('action'=>'index'));?></li>
	</ul>
</div>
<?php } ?>