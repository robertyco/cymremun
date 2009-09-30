<?php
$paginator->options(array('url' => $empleadoId));
?>
<h2>Haberes y Descuentos</h2>
<h3><?php echo $empleadoNombre['Empleado']['nombres'].' '.
			$empleadoNombre['Empleado']['apell_paterno'].' '.
			$empleadoNombre['Empleado']['apell_materno']?></h3>
<hr />
<h3>Haberes</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('fecha');?></th>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th><?php echo $paginator->sort('Imponible', 'HaberesDescuento.tipo');?></th>
	<th><?php echo $paginator->sort('valor');?></th>
	<th class="actions">Acciones</th>
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
			<?php echo $haberEmpleado['EmpleadosHaberesDescuento']['valor']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $haberEmpleado['EmpleadosHaberesDescuento']['id']), null, null, false
			); ?>
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
	<th><?php echo $paginator->sort('valor');?></th>
	<th class="actions">Acciones</th>
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
			<?php echo $descuentoEmpleado['EmpleadosHaberesDescuento']['valor']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(
				$html->image('b_edit.png', array('title' => 'Editar')), 
				array('action'=>'edit', $descuentoEmpleado['EmpleadosHaberesDescuento']['id']), null, null, false
			); ?>
			<?php echo $html->link(
				$html->image('b_drop.png', array('title' => 'Borrar')), 
				array('action'=>'delete', $descuentoEmpleado['EmpleadosHaberesDescuento']['id'], $empleadoId), null, 
				sprintf('¿Está seguro que desea borrar el ítem "%s"?', $descuentoEmpleado['HaberesDescuento']['nombre']), false
			); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Cargar haberes y descuentos desde empresa', array('action'=>'cargarHd', $empresaId, $empleadoId));?></li>
	</ul>
</div>
