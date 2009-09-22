<div class="saluds form">
<?php echo $form->create('Salud');?>
	<fieldset>
 		<legend><?php __('Add Salud');?></legend>
	<?php
		echo $form->input('empleado_id');
		echo $form->input('isapre_id');
		echo $form->input('valor_plan');
		echo $form->input('valor_tipo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Saluds', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Isapres', true), array('controller'=> 'isapres', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Isapre', true), array('controller'=> 'isapres', 'action'=>'add')); ?> </li>
	</ul>
</div>
