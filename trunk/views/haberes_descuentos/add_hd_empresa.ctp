<?php
	echo $javascript->link('jquery-1.3.2.js');
	echo $javascript->link('jquery-validate/jquery.validate.js');
	echo $javascript->link('jquery-validate/localization/messages_es.js');
	echo $javascript->link('validacion.js');
?>
<?php
$paginator->options(array('url' => $empresaId));
?>
<h2>Haberes y Descuentos</h2>
<h3>Haberes</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>
	<th><?php echo $paginator->sort('Imponible', 'tipo');?></th>
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($haberesEmpresa as $haberEmpresa):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $haberEmpresa['HaberesDescuento']['nombre']; ?>
		</td>
		<td>
			<?php 
				if ($haberEmpresa['HaberesDescuento']['tipo'] == 'I') {
					echo 'Si';
				} else {
					echo 'No';
				}
			?>
		</td>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'editHaberEmpresa', $haberEmpresa['HaberesDescuento']['id'], $empresaId),
				null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $haberEmpresa['HaberesDescuento']['id'], $empresaId), null, 
				sprintf('¿Está seguro que desa borrar el ítem "%s"?', $haberEmpresa['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento', array('action' => 'addHaberEmpresa'));?>
	<fieldset>
 		<legend>Agregar haber</legend>
	<?php
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->input('tipo', array('options' => array(
											'I'=>'Si',
											'N'=>'No'											
										), 'label' => 'Imponible', 'div' => 'w25'));		
		echo $form->hidden('empresa_id', array('value' => $empresaId));
	?>
	</fieldset>	
<?php echo $form->end('Agregar');?>
</div>

<hr />
<h3>Descuentos</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('nombre');?></th>	
	<th class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($descuentosEmpresa as $descuentoEmpresa):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $descuentoEmpresa['HaberesDescuento']['nombre']; ?>
		</td>
		<td class="actions">			
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'editDescuentoEmpresa', $descuentoEmpresa['HaberesDescuento']['id'], $empresaId),
				null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $descuentoEmpresa['HaberesDescuento']['id'], $empresaId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $descuentoEmpresa['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="haberesDescuentos form">
<?php echo $form->create('HaberesDescuento', array('action' => 'addDescuentoEmpresa'));?>
	<fieldset>
 		<legend>Agregar descuento</legend>
	<?php
		echo $form->input('nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->hidden('tipo', array('value' => 'D'));
		echo $form->hidden('empresa_id', array('value' => $empresaId));
	?>
	</fieldset>	
<?php echo $form->end('Agregar');?>
</div>