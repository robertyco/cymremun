<?php $paginator->options(array('url' => $empleadoId)); ?>
<h2>Liquidación de sueldo:</h2>
<h3><?php echo $empleadoNombre ?></h3>

<hr />

<?php echo $form->create('Liquidaciones', array('action' => 'editItemValor')); ?>

<h3>Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($imponibles as $imponible):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}	
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $imponible['HaberesDescuento']['nombre']; ?>
		</td>
		<td>
			<?php
			$valor = $imponible['EmpleadosHaberesDescuento']['valor'];
			$im = $i - 1;
			echo $form->hidden($im.'.id', array('value' => $imponible['EmpleadosHaberesDescuento']['id']));
			echo $form->input($im.'.valor', array( 'label' => false , 'div' => 'w25', 'value' => $valor));
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'deleteItem', $imponible['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $imponible['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<hr />

<h3>No Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($noImponibles as $noImponible):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}	
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $noImponible['HaberesDescuento']['nombre']; ?>
		</td>
		<td>
			<?php
			$valor = $noImponible['EmpleadosHaberesDescuento']['valor'];
			$im++;
			echo $form->hidden($im.'.id', array('value' => $noImponible['EmpleadosHaberesDescuento']['id']));
			echo $form->input($im.'.valor', array( 'label' => false , 'div' => 'w25', 'value' => $valor));
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'deleteItem', $noImponible['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $noImponible['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<hr />

<h3>Descuentos</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($descuentos as $descuento):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}	
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $descuento['HaberesDescuento']['nombre']; ?>
		</td>
		<td>		
			<?php
			$valor = $descuento['EmpleadosHaberesDescuento']['valor'];
			$im++;
			echo $form->hidden($im.'.id', array('value' => $descuento['EmpleadosHaberesDescuento']['id']));
			echo $form->input($im.'.valor', array( 'label' => false , 'div' => 'w25', 'value' => $valor));
			?>			
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'deleteItem', $descuento['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $descuento['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?php echo $form->end('Asignar valores');?>

<fieldset>
<legend>Agregar haber o descuento</legend>
<?php 
	echo $form->create('Liquidaciones', array('action' => 'addItem'));
		echo $form->input('HaberesDescuento.nombre', array('label' => 'Nombre *', 'div' => 'w50'));
		echo $form->input('HaberesDescuento.tipo', array('options' => array(
											'I'=>'Haber (Imp)',
											'N'=>'Haber (No Imp)',
											'D'=>'Descuento'
										), 'label' => 'Tipo', 'div' => 'w25'));
		echo $form->input('EmpleadosHaberesDescuento.valor', array('label' => 'Valor', 'div' => 'w25'));
		echo $form->hidden('EmpleadosHaberesDescuento.empleado_id', array('value' => $empleadoId));
	echo $form->end('Agregar');
?>
</fieldset>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Cargar haberes y descuentos desde empresa', array('action'=>'cargarHd', $empresaId, $empleadoId));?></li>
	</ul>
</div>
