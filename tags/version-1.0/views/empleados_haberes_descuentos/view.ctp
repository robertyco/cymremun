<div class="empleadosHaberesDescuentos view">
<h2><?php  __('EmpleadosHaberesDescuento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['valor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empleado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($empleadosHaberesDescuento['Empleado']['rut'], array('controller'=> 'empleados', 'action'=>'view', $empleadosHaberesDescuento['Empleado']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Haberes Descuento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($empleadosHaberesDescuento['HaberesDescuento']['nombre'], array('controller'=> 'haberes_descuentos', 'action'=>'view', $empleadosHaberesDescuento['HaberesDescuento']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit EmpleadosHaberesDescuento', true), array('action'=>'edit', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete EmpleadosHaberesDescuento', true), array('action'=>'delete', $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $empleadosHaberesDescuento['EmpleadosHaberesDescuento']['id'])); ?> </li>
		<li><?php echo $html->link(__('List EmpleadosHaberesDescuentos', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New EmpleadosHaberesDescuento', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Haberes Descuentos', true), array('controller'=> 'haberes_descuentos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Haberes Descuento', true), array('controller'=> 'haberes_descuentos', 'action'=>'add')); ?> </li>
	</ul>
</div>
