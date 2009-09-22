<div class="afps form">
<?php echo $form->create('Afp');?>
	<fieldset>
 		<legend><?php __('Add Afp');?></legend>
	<?php
		echo $form->input('nombre');
		echo $form->input('cotizacion');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Afps', true), array('action'=>'index'));?></li>
	</ul>
</div>
