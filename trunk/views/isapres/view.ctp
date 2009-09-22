<div class="isapres view">
<h2><?php  __('Isapre');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $isapre['Isapre']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $isapre['Isapre']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Isapre', true), array('action'=>'edit', $isapre['Isapre']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Isapre', true), array('action'=>'delete', $isapre['Isapre']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $isapre['Isapre']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Isapres', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Isapre', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
