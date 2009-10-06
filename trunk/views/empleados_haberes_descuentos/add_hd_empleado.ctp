<?php
$paginator->options(array('url' => $empleadoId));
?>
<h2>Haberes y Descuentos</h2>
<h3><?php echo $empleadoNombre['Empleado']['nombres'].' '.
			$empleadoNombre['Empleado']['apell_paterno'].' '.
			$empleadoNombre['Empleado']['apell_materno']?></h3>
<hr />
<h3>Haberes</h3>
<?php echo $form->create('EmpleadosHaberesDescuento', array('action' => 'addValorHd'));?>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th><?php echo $paginator->sort('Imponible', 'HaberesDescuento.tipo');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($haberesEmpleado as $haberEmpleado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}	
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $haberEmpleado['EmpleadosHaberesDescuento']['fecha']; ?>
		</td>
		<td>
			<?php echo $haberEmpleado['HaberesDescuento']['nombre']; ?>
		</td>
		<td>
			<?php
				if ($haberEmpleado['HaberesDescuento']['tipo'] == 'I') {
					echo 'Si';
				} else {
					echo 'No';
				}			
			?>
		</td>
		<td>
			<?php
			$valor = $haberEmpleado['EmpleadosHaberesDescuento']['valor'];
			$im = $i - 1;
			echo $form->hidden($im.'.id', array('value' => $haberEmpleado['EmpleadosHaberesDescuento']['id']));
			echo $form->input($im.'.valor', array( 'label' => false , 'div' => 'w25', 'value' => $valor));
			?>
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $haberEmpleado['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $haberEmpleado['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<hr />

<h3>Descuentos</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<?php
$i = 0;
foreach ($descuentosEmpleado as $descuentoEmpleado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}	
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $descuentoEmpleado['EmpleadosHaberesDescuento']['fecha']; ?>
		</td>
		<td>
			<?php echo $descuentoEmpleado['HaberesDescuento']['nombre']; ?>
		</td>
		<td>		
			<?php
			$valor = $descuentoEmpleado['EmpleadosHaberesDescuento']['valor'];
			$im++;
			echo $form->hidden($im.'.id', array('value' => $descuentoEmpleado['EmpleadosHaberesDescuento']['id']));
			echo $form->input($im.'.valor', array( 'label' => false , 'div' => 'w25', 'value' => $valor));
			?>			
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $descuentoEmpleado['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $descuentoEmpleado['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?php echo $form->end('Asignar valores');?>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Cargar haberes y descuentos desde empresa', array('action'=>'cargarHd', $empresaId, $empleadoId));?></li>
	</ul>
</div>
