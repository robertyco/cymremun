<?php if ($session->check('Empresa.id')) { ?>

<div class="empleados form">
<?php echo $form->create('Empleado');?>
	<fieldset>
 		<legend>Datos Personales</legend>
		<?php
		echo $form->input('Empleado.rut', array('label' => 'R.U.T. *', 'div' => 'w25'));
		echo $form->input('Empleado.nombres', array('label' => 'Nombres *', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('Empleado.apell_paterno', array('label' => 'Apell. Paterno *', 'div' => 'w25'));
		echo $form->input('Empleado.apell_materno', array('label' => 'Apell. Materno', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('Empleado.sexo', array(
										'options' => array(
											'M'=>'Masculino',
											'f'=>'Femenino'
										), 'div' => 'w25')
		);
		echo $form->input('Empleado.estado_civil', array(
										'options' => array(
											'C'=>'Casado',
											'S'=>'Soltero',
											'V'=>'Viudo'
										), 'div' => 'w25')
		);
		echo '<br />';
		echo $form->input('Empleado.direccion', array('label' => 'Dirección', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('Empleado.comuna', array('div' => 'w25'));
		echo $form->input('Empleado.ciudad', array('div' => 'w25'));
		echo '<br />';
		echo $form->input('Empleado.telefono', array('label' => 'Teléfono', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('Empleado.celular', array('div' => 'w25'));
		?>
	</fieldset>
	<fieldset>
 		<legend>Datos Laborales</legend>
		<?php
		echo $form->input('Empleado.fecha_ingreso', array('label' => 'Fecha de ingreso',
														'dateFormat' => 'DMY', 'div' => 'w50'));
		echo $form->input('Empleado.fecha_retiro', array('label' => 'Fecha de retiro',
														'dateFormat' => 'DMY',
														'empty' => ' ',
														'selected' => ' ', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('Empleado.sueldo_base', array('label' => 'Sueldo Base *', 'div' => 'w25'));
		echo $form->input('Empleado.cargo', array('div' => 'w50'));
		echo '<br />';
		
		echo $form->input('Empleado.tipo_contrato', array(
												'label' => 'Tipo de contrato', 
												'options' => array(
													'I'=>'Indefinido',
													'B'=>'Plazo fijo'
												), 'div' => 'w25'));		
		echo $form->input('Empleado.grat_legal', array(
												'label' => 'Gratificación legal', 
												'options' => array(
													'S'=>'Si',
													'T'=>'Si (con tope)',
													'N'=>'No'
												), 'div' => 'w25'));
		echo '<br />';
		echo $form->input('Empleado.cargas', array('label' => 'Cargas familiares', 'div' => 'w25'));
		?>
	</fieldset>
	<fieldset>
 		<legend>Previsión y Salud</legend>
		<?php
		echo $form->input('Prevision.afp_id', array('label' => 'A.F.P.', 'div' => 'w25'));
		echo $form->input('Prevision.apv', array(
												'label' => 'APV', 
												'options' => array(
													'S'=>'Si',
													'N'=>'No'
												), 'div' => 'w25'));
		echo $form->input('Prevision.apv_monto', array('label' => 'Monto APV', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('Salud.isapre_id', array('label' => 'Isapre/Fonasa', 'div' => 'w25'));
		echo $form->input('Salud.valor_plan', array('label' => 'Valor del plan', 'default' => '0', 'div' => 'w25'));
		echo $form->input('Salud.valor_tipo', array(
												'label' => 'UF/Pesos', 
												'options' => array(
													'U'=>'UF',
													'P'=>'Pesos'
												), 'div' => 'w25'));
		?>
	</fieldset>	
<?php echo $form->end('Guardar');?>
</div>
<?php } ?>