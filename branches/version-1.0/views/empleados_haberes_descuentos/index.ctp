<div class="empleadosHaberesDescuentos index">
<h2><?php __('EmpleadosHaberesDescuentos');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th><?php echo $paginator->sort('empleado_id');?></th>
	<th><?php echo $paginator->sort('haberes_descuento_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($empleadosHaberesDescuentos as $empleadosHaberesDescuento):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']; ?>
		</td>
		<td>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['fecha']; ?>
		</td>
		<td>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['valor']; ?>
		</td>
		<td>
			<?php echo $html->link($empleadosHaberesDescuento['Empleado']['rut'], array('controller'=> 'empleados', 'action'=>'view', $empleadosHaberesDescuento['Empleado']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($empleadosHaberesDescuento['HaberesDescuento']['nombre'], array('controller'=> 'haberes_descuentos', 'action'=>'view', $empleadosHaberesDescuento['HaberesDescuento']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?>
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
		<li><?php echo $html->link(__('New EmpleadosHaberesDescuento', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Haberes Descuentos', true), array('controller'=> 'haberes_descuentos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Haberes Descuento', true), array('controller'=> 'haberes_descuentos', 'action'=>'add')); ?> </li>
	</ul>
</div>
