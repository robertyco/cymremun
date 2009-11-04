<?php $paginator->options(array('url' => $empleadoId)); ?>
<h2>Liquidación de sueldo:</h2>
<h3>
<?php echo $html->link(
			$empleadoNombre, array('controller' => 'Empleados', 'action'=>'view', $empleadoId)
		); ?>

</h3>

<hr />

<fieldset>
<legend>Datos mensuales</legend>
<?php 
	echo $form->create('Liquidaciones', array('action' => 'addDatosMes'));
		echo $form->hidden('Liquidacion.empleado_id', array('value' => $empleadoId));
		echo $form->input('Liquidacion.dias_trabajados', array(
			'label' => 'Días Trabajados', 'div' => 'w25', 'value' => $liquidacion['Liquidacion']['dias_trabajados']
		));
		echo $form->input('Liquidacion.horas_extra_50', array(
			'label' => 'Horas Extra 50%', 'div' => 'w25', 'value' => $liquidacion['Liquidacion']['horas_extra_50']
		));
		echo $form->input('Liquidacion.horas_extra_100', array(
			'label' => 'Horas Extra 100%', 'div' => 'w25', 'value' => $liquidacion['Liquidacion']['horas_extra_100']
		));
		echo '<br />';
	echo $form->end('Guardar');
?>
</fieldset>

<?php echo $form->create('Liquidaciones', array('action' => 'editItemValor')); ?>

<h3>Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<tr>
	<td>Sueldo Base</td>
	<td><?php echo $sueldoBase; ?></td>
	<td></td>
</tr>
<tr>
	<td>Horas Extra 50%</td>
	<td><?php echo $horasExtra50; ?></td>
	<td></td>
</tr>
<tr>
	<td>Horas Extra 100%</td>
	<td><?php echo $horasExtra100; ?></td>
	<td></td>
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
<tr>
	<td><b>Subtotal</b></td>
	<td><b><?php echo $subTotalImponibles; ?></b></td>
	<td></td>
</tr>
<tr>
	<td>Gratificación</td>
	<td><?php echo $gratificacion; ?></td>
	<td></td>
</tr>
<tr>
	<td><b>TOTAL HABER IMPONIBLE</b></td>
	<td><b><?php echo $totalImponible; ?></b></td>
	<td></td>
</tr>
</table>


<h3>No Imponibles</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'HaberesDescuento.nombre');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<tr>
	<td>Asignación familiar</td>
	<td><?php echo $asignacionFamiliar; ?></td>
	<td></td>
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
<tr>
	<td><b>TOTAL HABER NO IMPONIBLE</b></td>
	<td><b><?php echo $totalNoImponible; ?></b></td>
	<td></td>
</tr>
</table>

<hr />

<h3>Descuentos</h3>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('Ítem', 'haberes_descuento_id');?></th>
	<th width="25%"><?php echo $paginator->sort('valor');?></th>
	<th width="20px" class="actions">Acciones</th>
</tr>
<tr>
	<td><?php echo 'Previsión '.$cotizacion.'%'; ?></td>
	<td><?php echo $prevision; ?></td>
	<td></td>
</tr>
<tr>
	<td>Ahorro Previsional Voluntario</td>
	<td><?php echo $apv; ?></td>
	<td></td>
</tr>
<tr>
	<td><?php echo $msgSalud; ?></td>
	<td><?php echo $salud; ?></td>
	<td></td>
</tr>
<tr>
	<td>Seguro de Cesantía</td>
	<td><?php echo $seguroCesantia; ?></td>
	<td></td>
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
<tr>
	<td><b>Subtotal</b></td>
	<td><b><?php echo $subTotalDescuentos; ?></b></td>
	<td></td>
</tr>
<tr>
	<td>Remuneración Neta</td>
	<td><?php echo $remuneracionNeta; ?></td>
	<td></td>
</tr>
<tr>
	<td>Impuesto Unico</td>
	<td><?php echo $impuestoUnico; ?></td>
	<td></td>
</tr>
</table>

<?php echo $form->end('Asignar valores');?>

<table cellpadding="0" cellspacing="0">
<tr>
	<td><b>TOTAL HABERES</b></td>
	<td width="25%"><b><?php echo $totalHaber; ?></b></td>
	<td width="65px"></td>
</tr>
<tr>
	<td><b>TOTAL DESCUENTOS</b></td>
	<td><b><?php echo $totalDescuento; ?></b></td>
	<td></td>
</tr>
<tr>
	<td><b>ALCANCE LIQUIDO</b></td>
	<td><b><?php echo $alcanceLiquido; ?></b></td>
	<td></td>
</tr>
</table>

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
