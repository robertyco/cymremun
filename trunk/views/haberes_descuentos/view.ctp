<div class="haberesDescuentos view">
<h2><?php  __('HaberesDescuento');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $haberesDescuento['HaberesDescuento']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $haberesDescuento['HaberesDescuento']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $haberesDescuento['HaberesDescuento']['tipo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Empresa Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $haberesDescuento['HaberesDescuento']['empresa_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit HaberesDescuento', true), array('action'=>'edit', $haberesDescuento['HaberesDescuento']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete HaberesDescuento', true), array('action'=>'delete', $haberesDescuento['HaberesDescuento']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $haberesDescuento['HaberesDescuento']['id'])); ?> </li>
		<li><?php echo $html->link(__('List HaberesDescuentos', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New HaberesDescuento', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
