<table cellpadding="0" cellspacing="0">
<tr><th COLSPAN="3">LIQUIDACION DE SUELDO
<tr><td width="100px">Razón Social:<td><?php echo $empleado['Empresa']['nombre'] ?><td STYLE="text-align:right"><?php echo $session->read('mes').' de '.$session->read('ano');?>
<tr><td>R.U.T.:<td><?php echo $empleado['Empresa']['rut'] ?><td>
<tr><td>Dirección:<td><?php echo $empleado['Empresa']['direccion'] ?><td>
</table>

<hr>

<table cellpadding="0" cellspacing="0">
<tr><td width="100px">Nombre:<td><?php echo $empleado['Empleado']['apell_paterno'].' '.
				$empleado['Empleado']['apell_materno'].' '.$empleado['Empleado']['nombres'] ?><td>
<tr><td>R.U.T.:<td><?php echo $empleado['Empleado']['rut'] ?>
</table>

<hr>

<table cellpadding="0" cellspacing="0">
<tr><th colspan="4">HABERES
<tr><th colspan="4" STYLE="text-align:left">IMPONIBLES
<tr><td width="30px"><td width="170px">Sueldo:<td width="160px"><?php echo '$ '.$sueldo; ?><td>
<tr><td><td>Horas Extra 50%:<td><?php echo '$ '.$horasExtra50; ?><td>
<tr><td><td>Horas Extra 100%:<td><?php echo '$ '.$horasExtra100; ?><td>
<tr><td><td>
<?php
$i = 0;
foreach ($imponibles as $imponible):
	echo $imponible['HaberesDescuento']['nombre']; ?>
	<td> <?php echo '$ '.$imponible['EmpleadosHaberesDescuento']['valor']; ?><td>
	<tr><td><td>
<?php 
endforeach; 
?>
<td><td>
<tr><td><td>Subtotal:<td><?php echo '$ '.$subTotalImponibles; ?><td>
<tr><td><td>Gratificación:<td><?php echo '$ '.$gratificacion; ?><td>
<tr><td><td><td>Total Imponibles:<td><?php echo '$ '.$totalImponible; ?>

<tr><th colspan="4" STYLE="text-align:left">NO IMPONIBLES
<tr><td><td>Asignación Familiar:<td><?php echo '$ '.$asignacionFamiliar; ?><td>
<tr><td><td>
<?php
$i = 0;
$total = 0;
foreach ($noImponibles as $noImponible):
	echo $noImponible['HaberesDescuento']['nombre'];?>
	<td> <?php echo '$ '.$noImponible['EmpleadosHaberesDescuento']['valor']; ?><td>
	<tr><td><td>
<?php 
endforeach; 
?>
<td><td>
<tr><td><td><td>Total No Imponibles:<td><?php echo '$ '.$totalNoImponible; ?>
<tr><td><td><td>Total Haberes:<td><?php echo '$ '.$totalHaber; ?>
</table>

<hr>

<?php $totalDescuentos = 0; ?>
<table cellpadding="0" cellspacing="0">
<tr><th colspan="4">DESCUENTOS
<tr><td width="30px"><td width="170px">
<?php echo 'Previsión '.$cotizacion.'%';?>
<td width="160px"><?php echo '$ '.$prevision; ?><td>
<tr><td><td>
<?php echo 'Ahorro Previsional Voluntario'; ?><td>
<?php echo '$ '.$apv; ?><td>
<tr><td><td>
<?php echo $msgSalud; ?><td>
<?php echo '$ '.$salud; ?><td>
<tr><td><td>
<?php echo 'Seguro de Cesantía';?><td>
<?php echo '$ '.$seguroCesantia;
?><td>
<tr><td><td>

<?php
$i = 0;
foreach ($descuentos as $descuento):
	echo $descuento['HaberesDescuento']['nombre'];?>
	<td> <?php echo '$ '.$descuento['EmpleadosHaberesDescuento']['valor']; ?><td>
	<tr><td><td>
<?php 
endforeach; 
?>
<td><td>
<tr><td><td>
<?php echo 'Subtotal:';?><td>
<?php echo '$ '.$subTotalDescuentos;
?><td>
<tr><td><td>
<?php echo 'Remuneración Neta:';?><td>
<?php echo '$ '.$remuneracionNeta;
?><td>
<tr><td><td>
<?php echo 'Impuesto Unico:';?><td>
<?php echo '$ '.$impuestoUnico;
?><td>
<tr><td><td><td>Total Descuentos:<td><?php echo '$ '.$totalDescuento; ?>
</table>

<hr>

<table cellpadding="0" cellspacing="0">
<tr><td width="30px"><td width="170px">
<td width="160px">Total a Pagar:<td><?php echo $alcanceLiquido; ?>
</table>

