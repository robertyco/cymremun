<div class="empleados form">
<?php echo $form->create('Empleado');?>
	<fieldset>
 		<legend><?php __('Add Empleado');?></legend>
	<?php
		echo $form->input('rut');
		echo $form->input('apell_paterno');
		echo $form->input('apell_materno');
		echo $form->input('nombres');
		echo $form->input('direccion');
		echo $form->input('comuna');
		echo $form->input('ciudad');
		echo $form->input('telefono');
		echo $form->input('celular');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Empleados', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empresas', true), array('controller'=> 'empresas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empresa', true), array('controller'=> 'empresas', 'action'=>'add')); ?> </li>
	</ul>
</div>
