<div class="haberesDescuentos index">
<h2>Haberes y Descuentos</h2>
<table cellpadding="0" cellspacing="0">
<tr>
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
			<?php 
			echo $html->link($haberesDescuento['HaberesDescuento']['nombre'], array('action'=>'asignar_hd', $haberesDescuento['HaberesDescuento']['id']));
			?>
		</td>
		<td>
			<?php echo $haberesDescuento['HaberesDescuento']['tipo']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('V', array('action'=>'view', $haberesDescuento['HaberesDescuento']['id'])); ?>
			<?php echo $html->link('E', array('action'=>'edit', $haberesDescuento['HaberesDescuento']['id'])); ?>
			<?php echo $html->link('B', array('action'=>'delete', $haberesDescuento['HaberesDescuento']['id']), null, sprintf(__('¿Está seguro que desa borrar el ítem "%s"?', true), $haberesDescuento['HaberesDescuento']['nombre'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< anterior', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('siguiente >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Agregar haber o descuento', array('action'=>'add')); ?></li>
	</ul>
</div>
