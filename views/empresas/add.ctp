<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('jquery.Rut.js');
	echo $javascript->link('validacion.js');
	echo $javascript->link('formularios.js');
?>
<div class="empresas form">
<?php echo $form->create('Empresa');?>
	<fieldset>
 		<legend>Empresa</legend>
	<?php
		echo $form->input('rut', array('label' => 'R.U.T. *', 'div' => 'w25', 'class' => 'required rut'));
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50', 'class' => 'required'));
		echo '<br />';
		echo $form->input('giro', array('div' => 'w50'));
		echo '<br />';
		echo $form->input('actividad_id', array('label' => 'Actividad', 'div' => 'w100'));
		echo '<br />';
		echo $form->input('direccion', array('label' => 'Dirección *', 'div' => 'w50', 'class' => 'required'));
		echo '<br />';
		echo $form->input('comuna', array('div' => 'w25'));
		echo $form->input('ciudad', array('label' => 'Ciudad *', 'div' => 'w25', 'class' => 'required'));
		echo $form->input('region', array(
									'options' => array(
										'I',
										'II',
										'III',
										'IV',
										'V',
										'VI',
										'VII',
										'VIII',
										'IX',
										'X',
										'XI',
										'XII',
										'Metropolitana',
										'XIV',
										'XV'
									),
									'label' => 'Región', 'div' => 'w25')
								);
		echo '<br />';
		echo $form->input('telefono', array('label' => 'Teléfono', 'div' => 'w25', 'class' => 'number'));
		echo $form->input('fax', array('div' => 'w25', 'class' => 'number'));
		echo '<br />';
		echo $form->input('email', array('div' => 'w50', 'class' => 'email'));
	?></fieldset>
	<fieldset>
 		<legend>Representante Legal</legend>
	<?php		
		echo $form->input('rep_legal', array('label' => 'Rep. Legal', 
												'options' => array(
													'S'=>'Si',
													'N'=>'No'
												),'div' => 'w25', 'onChange' => 'bloqRepLegal();'));
		echo $form->input('rep_legal_rut', array('label' => 'R.U.T. *', 'div' => 'w25', 'class' => 'rut'));
		echo $form->input('rep_legal_nombre', array('label' => 'Nombre *', 'div' => 'w50'));
	?>
	</fieldset>
	<fieldset>
 		<legend>Caja de Compensación</legend>
	<?php		
		echo $form->input('compensacion_id', array('label' => 'Institución', 'div' => 'w50'));
	?>
	</fieldset>
	<fieldset>
 		<legend>Accidente del Trabajo</legend>
	<?php		
		echo $form->input('seguridad_id', array('label' => 'Institución', 'div' => 'w25', 'onChange' => 'bloqNadherente();'));
		echo $form->input('nadherente', array('label' => 'Nº Adherente', 'div' => 'w25'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
<script>
bloqRepLegal();
bloqNadherente();
</script>
