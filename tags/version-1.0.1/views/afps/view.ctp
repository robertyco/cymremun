<div class="afps view">
<h2><?php  __('Afp');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $afp['Afp']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $afp['Afp']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cotizacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $afp['Afp']['cotizacion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Afp', true), array('action'=>'edit', $afp['Afp']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Afp', true), array('action'=>'delete', $afp['Afp']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $afp['Afp']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Afps', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Afp', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
