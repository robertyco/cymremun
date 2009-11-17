<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<div class="empresas form">
<?php echo $form->create('Empresa');?>
	<fieldset>
 		<legend>Empresa</legend>
	<?php
		echo $form->input('rut', array('label' => 'R.U.T. *', 'div' => 'w25', 'class' => 'required'));
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50', 'class' => 'required'));
		echo '<br />';
		echo $form->input('actividad', array('div' => 'w50'));
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
		echo $form->input('rep_legal_rut', array('label' => 'R.U.T. *', 'div' => 'w25', 'class' => 'required'));
		echo $form->input('rep_legal_nombre', array('label' => 'Nombre *', 'div' => 'w50', 'class' => 'required'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
