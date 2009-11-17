<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento', array('action' => 'editDescuentoEmpresa'));?>
	<fieldset>
 		<legend>Editar haber</legend>
	<?php
		echo $form->input('id');
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->input('tipo', array('options' => array(
											'I'=>'Si',
											'N'=>'No'											
										), 'label' => 'Imponible', 'div' => 'w25'));
		echo $form->hidden('empresa_id', array('value' => $empresaId));
	?>
	</fieldset>
<?php echo $form->end('Guardar');?>
</div>