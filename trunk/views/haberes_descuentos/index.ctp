<div class="haberesDescuentos index">
<h2>Haberes y Descuentos</h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('tipo');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($haberesDescuentos as $haberesDescuento):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $haberesDescuento['HaberesDescuento']['id']; ?>
		</td>
		<td>
			<?php echo $haberesDescuento['HaberesDescuento']['nombre']; ?>
		</td>
		<td>
			<?php echo $haberesDescuento['HaberesDescuento']['tipo']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('Ver', array('action'=>'view', $haberesDescuento['HaberesDescuento']['id'])); ?>
			<?php echo $html->link('Editar', array('action'=>'edit', $haberesDescuento['HaberesDescuento']['id'])); ?>
			<?php echo $html->link('Borrar', array('action'=>'delete', $haberesDescuento['HaberesDescuento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $haberesDescuento['HaberesDescuento']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Agregar haber o descuento', array('action'=>'add')); ?></li>
	</ul>
</div>
