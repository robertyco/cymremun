<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<div class="ufs form">
<?php echo $form->create('Uf');?>
	<fieldset>
 		<legend>U.F.</legend>
	<div class="w25">
	<label for="mesMonth">Fecha</label>
	<?php
		echo $form->month('mes', $session->read('mes'), array());
		echo $form->year('ano', date('Y')-50, date('Y')+1, $session->read('ano'));
	?>
	</div>
	<?php
		echo $form->input('valor', array('div' => 'w25', 'class' => 'required number'));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>
