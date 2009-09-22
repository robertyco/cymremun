<div class="afps form">
<?php echo $form->create('Afp');?>
	<fieldset>
 		<legend><?php __('Edit Afp');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre');
		echo $form->input('cotizacion');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Afp.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Afp.id'))); ?></li>
		<li><?php echo $html->link(__('List Afps', true), array('action'=>'index'));?></li>
	</ul>
</div>
