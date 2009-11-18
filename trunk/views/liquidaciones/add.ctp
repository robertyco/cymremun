<?php $paginator->options(array('url' => $empleadoId)); ?>
<h2>Liquidación de sueldo:</h2>
<h3>
<?php echo $html->link(
			$empleadoNombre, array('controller' => 'Empleados', 'action'=>'view', $empleadoId)
		); ?>

</h3>

<hr />

<h3>Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
</tr>
<tr>
	<td>Sueldo</td>
	<td><?php echo $sueldo; ?></td>
</tr>
<tr>
	<td>Horas Extra 50%</td>
	<td><?php echo $horasExtra50; ?></td>
</tr>
<tr>
	<td>Horas Extra 100%</td>
	<td><?php echo $horasExtra100; ?></td>
</tr>

<?php
if (empty($im)) $im = 0;
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
			echo $valor;
			?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<td><b>Subtotal</b></td>
	<td><b><?php echo $subTotalImponibles; ?></b></td>
</tr>
<tr>
	<td>Gratificación</td>
	<td><?php echo $gratificacion; ?></td>
</tr>
<tr>
	<td><b>TOTAL HABER IMPONIBLE</b></td>
	<td><b><?php echo $totalImponible; ?></b></td>
</tr>
</table>


<h3>No Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
</tr>
<tr>
	<td>Asignación familiar</td>
	<td><?php echo $asignacionFamiliar; ?></td>
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
			echo $valor;
			?>
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<td><b>TOTAL HABER NO IMPONIBLE</b></td>
	<td><b><?php echo $totalNoImponible; ?></b></td>
</tr>
</table>

<hr />

<h3>Descuentos</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
</tr>
<tr>
	<td><?php echo 'Previsión '.$cotizacion.'%'; ?></td>
	<td><?php echo $prevision; ?></td>
</tr>
<tr>
	<td>Ahorro Previsional Voluntario</td>
	<td><?php echo $apv; ?></td>
</tr>
<tr>
	<td><?php echo $msgSalud; ?></td>
	<td><?php echo $salud; ?></td>
</tr>
<tr>
	<td>Seguro de Cesantía</td>
	<td><?php echo $seguroCesantia; ?></td>
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
			echo $valor;
			?>			
		</td>
	</tr>
<?php endforeach; ?>
<tr>
	<td><b>Subtotal</b></td>
	<td><b><?php echo $subTotalDescuentos; ?></b></td>
</tr>
<tr>
	<td>Remuneración Neta</td>
	<td><?php echo $remuneracionNeta; ?></td>
</tr>
<tr>
	<td>Impuesto Unico</td>
	<td><?php echo $impuestoUnico; ?></td>
</tr>
</table>


<table cellpadding="0" cellspacing="0">
<tr>
	<td><b>TOTAL HABERES</b></td>
	<td width="25%"><b><?php echo $totalHaber; ?></b></td>
</tr>
<tr>
	<td><b>TOTAL DESCUENTOS</b></td>
	<td><b><?php echo $totalDescuento; ?></b></td>
</tr>
<tr>
	<td><b>ALCANCE LIQUIDO</b></td>
	<td><b><?php echo $alcanceLiquido; ?></b></td>
</tr>
</table>

<div class="actions">
	<ul>
		<li><?php echo $html->link('Imprimir', array('action'=>'imprimir', $empleadoId));?></li>
		<?php if ($Auth['User']['tipo'] != 'consultor') { ?>
			<li><?php echo $html->link('Modificar datos', array('controller' => 'EmpleadosHaberesDescuentos', 'action'=>'addHdEmpleado', $empleadoId));?></li>
		<?php } ?>
	</ul>
</div>
