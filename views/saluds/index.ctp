<div class="saluds index">
<h2><?php __('Saluds');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('empleado_id');?></th>
	<th><?php echo $paginator->sort('isapre_id');?></th>
	<th><?php echo $paginator->sort('valor_plan');?></th>
	<th><?php echo $paginator->sort('valor_tipo');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($saluds as $salud):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $salud['Salud']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($salud['Empleado']['rut'], array('controller'=> 'empleados', 'action'=>'view', $salud['Empleado']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($salud['Isapre']['nombre'], array('controller'=> 'isapres', 'action'=>'view', $salud['Isapre']['id'])); ?>
		</td>
		<td>
			<?php echo $salud['Salud']['valor_plan']; ?>
		</td>
		<td>
			<?php echo $salud['Salud']['valor_tipo']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $salud['Salud']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $salud['Salud']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $salud['Salud']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $salud['Salud']['id'])); ?>
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
		<li><?php echo $html->link(__('New Salud', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Isapres', true), array('controller'=> 'isapres', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Isapre', true), array('controller'=> 'isapres', 'action'=>'add')); ?> </li>
	</ul>
</div>
