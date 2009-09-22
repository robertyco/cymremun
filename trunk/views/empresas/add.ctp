<div class="empresas form">
<?php echo $form->create('Empresa');?>
	<fieldset>
 		<legend>Empresa</legend>
	<?php
		echo $form->input('rut', array('label' => 'R.U.T. *', 'div' => 'w25'));
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('actividad', array('div' => 'w50'));
		echo '<br />';
		echo $form->input('direccion', array('label' => 'Dirección *', 'div' => 'w50'));
		echo '<br />';
		echo $form->input('comuna', array('div' => 'w25'));
		echo $form->input('ciudad', array('label' => 'Ciudad *', 'div' => 'w25'));
		echo $form->input('region', array('label' => 'Región', 'div' => 'w25'));
		echo '<br />';
		echo $form->input('telefono', array('label' => 'Teléfono', 'div' => 'w25'));
		echo $form->input('fax', array('div' => 'w25'));
		echo '<br />';
		echo $form->input('email', array('div' => 'w50'));
	?></fieldset>
	<fieldset>
 		<legend>Representante Legal</legend>
	<?php		
		echo $form->input('rep_legal_rut', array('label' => 'R.U.T.', 'div' => 'w25'));
		echo $form->input('rep_legal_nombre', array('label' => 'Nombre', 'div' => 'w50'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
