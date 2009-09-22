<div class="empleados form">
<?php echo $form->create('Empleado');?>
	<fieldset>
 		<legend>Datos Personales</legend>
		<?php
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
 		<legend>Previsión y Salud</legend>
		<?php
		echo $form->input('Prevision.afp_id', array('label' => 'A.F.P.'));
		echo $form->input('Prevision.cotizacion_voluntaria', array('label' => 'Cotización Voluntaria'));
		echo $form->input('Prevision.ahorro_voluntario');
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
		<li><?php echo $html->link(__('List Empleados', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Empresas', true), array('controller'=> 'empresas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Empresa', true), array('controller'=> 'empresas', 'action'=>'add')); ?> </li>
	</ul>
</div>
