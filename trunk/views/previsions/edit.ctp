<div class="previsions form">
<?php echo $form->create('Prevision');?>
	<fieldset>
 		<legend><?php __('Edit Prevision');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('empleado_id');
		echo $form->input('afp_id');
		echo $form->input('cotizacion_voluntaria');
		echo $form->input('ahorro_voluntario');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Prevision.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Prevision.id'))); ?></li>
		<li><?php echo $html->link(__('List Previsions', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Afps', true), array('controller'=> 'afps', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Afp', true), array('controller'=> 'afps', 'action'=>'add')); ?> </li>
	</ul>
</div>
