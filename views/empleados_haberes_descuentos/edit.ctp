<div class="empleadosHaberesDescuentos form">
<?php echo $form->create('EmpleadosHaberesDescuento');?>
	<fieldset>
 		<legend><?php __('Edit EmpleadosHaberesDescuento');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('fecha', array('dateFormat' => 'DMY'));
		echo $form->input('valor');
		echo $form->input('haberes_descuento_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('EmpleadosHaberesDescuento.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('EmpleadosHaberesDescuento.id'))); ?></li>
		<li><?php echo $html->link(__('List EmpleadosHaberesDescuentos', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Haberes Descuentos', true), array('controller'=> 'haberes_descuentos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Haberes Descuento', true), array('controller'=> 'haberes_descuentos', 'action'=>'add')); ?> </li>
	</ul>
</div>
