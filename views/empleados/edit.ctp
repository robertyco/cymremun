<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados form">
<?php echo $form->create('Empleado');?>
	<fieldset>
 		<legend>Datos Personales</legend>
		<?php
		echo $form->input('Empleado.id');
		echo $form->input('Empleado.rut', array('label' => 'R.U.T.'));
		echo $form->input('Empleado.nombres');
		echo $form->input('Empleado.apell_paterno');
		echo $form->input('Empleado.apell_materno');
		echo $form->input('Empleado.direccion', array('label' => 'Dirección'));
		echo $form->input('Empleado.comuna');
		echo $form->input('Empleado.ciudad');
		echo $form->input('Empleado.telefono', array('label' => 'Teléfono'));
		echo $form->input('Empleado.celular');		
		?>
	</fieldset>
	<fieldset>
 		<legend>Datos Laborales</legend>
		<?php
		echo $form->input('Empleado.fecha_ingreso', array('label' => 'Fecha de ingreso',
														'dateFormat' => 'DMY'));
		echo $form->input('Empleado.fecha_retiro', array('label' => 'Fecha de retiro',
														'dateFormat' => 'DMY',
														'empty' => ' ',
														'selected' => ' '));
		echo $form->input('Empleado.sueldo_base', array('label' => 'Sueldo base'));
		?>
	</fieldset>
	<fieldset>
 		<legend>Previsión y Salud</legend>
		<?php
		echo $form->input('Prevision.id');
		echo $form->input('Prevision.afp_id', array('label' => 'A.F.P.'));
		echo $form->input('Prevision.cotizacion_voluntaria', array('label' => 'Cotización Voluntaria'));
		echo $form->input('Prevision.ahorro_voluntario');
		echo $form->input('Salud.id');
		echo $form->input('Salud.isapre_id');
		echo $form->input('Salud.valor_tipo', array(
												'label' => 'UF/Pesos', 
												'options' => array(
													'U'=>'UF',
													'P'=>'Pesos'
												)));
		echo $form->input('Salud.valor_plan', array('label' => 'Valor del plan'));
		?>
	</fieldset>	
<?php echo $form->end('Guardar');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Borrar', array('action'=>'delete', $form->value('Empleado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Empleado.id'))); ?></li>
		<li><?php echo $html->link('Listar empleados', array('action'=>'index'));?></li>
	</ul>
</div>

<?php } ?>