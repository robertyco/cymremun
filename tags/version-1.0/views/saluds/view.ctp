<div class="saluds view">
<h2><?php  __('Salud');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salud['Salud']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empleado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($salud['Empleado']['rut'], array('controller'=> 'empleados', 'action'=>'view', $salud['Empleado']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Isapre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($salud['Isapre']['nombre'], array('controller'=> 'isapres', 'action'=>'view', $salud['Isapre']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Plan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salud['Salud']['valor_plan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salud['Salud']['valor_tipo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Salud', true), array('action'=>'edit', $salud['Salud']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Salud', true), array('action'=>'delete', $salud['Salud']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $salud['Salud']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Saluds', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Salud', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Isapres', true), array('controller'=> 'isapres', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Isapre', true), array('controller'=> 'isapres', 'action'=>'add')); ?> </li>
	</ul>
</div>
