<div class="previsions view">
<h2><?php  __('Prevision');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prevision['Prevision']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empleado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($prevision['Empleado']['rut'], array('controller'=> 'empleados', 'action'=>'view', $prevision['Empleado']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Afp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($prevision['Afp']['nombre'], array('controller'=> 'afps', 'action'=>'view', $prevision['Afp']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cotizacion Voluntaria'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prevision['Prevision']['cotizacion_voluntaria']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ahorro Voluntario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prevision['Prevision']['ahorro_voluntario']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Prevision', true), array('action'=>'edit', $prevision['Prevision']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Prevision', true), array('action'=>'delete', $prevision['Prevision']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prevision['Prevision']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Previsions', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Prevision', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Afps', true), array('controller'=> 'afps', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Afp', true), array('controller'=> 'afps', 'action'=>'add')); ?> </li>
	</ul>
</div>
