<div class="empresas form">
<?php echo $form->create('Empresa');?>
	<fieldset>
 		<legend><?php __('Add Empresa');?></legend>
	<?php
		echo $form->input('rut');
		echo $form->input('nombre');
		echo $form->input('actividad');
		echo $form->input('direccion');
		echo $form->input('comuna');
		echo $form->input('ciudad');
		echo $form->input('region');
		echo $form->input('telefono');
		echo $form->input('fax');
		echo $form->input('email');
		echo $form->input('rep_legal_rut');
		echo $form->input('rep_legal_nombre');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Empresas', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empleados', true), array('controller'=> 'empleados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empleado', true), array('controller'=> 'empleados', 'action'=>'add')); ?> </li>
	</ul>
</div>
