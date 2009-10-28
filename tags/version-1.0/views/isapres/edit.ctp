<div class="isapres form">
<?php echo $form->create('Isapre');?>
	<fieldset>
 		<legend><?php __('Edit Isapre');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Isapre.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Isapre.id'))); ?></li>
		<li><?php echo $html->link(__('List Isapres', true), array('action'=>'index'));?></li>
	</ul>
</div>
