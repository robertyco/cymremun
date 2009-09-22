<div class="isapres form">
<?php echo $form->create('Isapre');?>
	<fieldset>
 		<legend><?php __('Add Isapre');?></legend>
	<?php
		echo $form->input('nombre');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Isapres', true), array('action'=>'index'));?></li>
	</ul>
</div>
