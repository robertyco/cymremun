<?php
include ('fpdf/fpdf.php');
$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetMargins(20, 20);
$alto = 5;
$tamFuente = 11;

$i = 0;
foreach ($empleados as $empleado):
	if ($empleado['Empleado']['liquida'] == 1) {
	$pdf->AddPage();
	$pdf->SetFont('Helvetica', 'B', $tamFuente);
	$pdf->Cell(0, 10, 'LIQUIDACION DE SUELDO', 0, 0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica', '', $tamFuente);
	$pdf->Cell(30, $alto, 'Razón Social:');	
	$pdf->Cell(30, $alto, $empleado['Empresa']['nombre']);
	$pdf->Cell(0, $alto, $session->read('mes').' de '.$session->read('ano'), 0, 0, 'R');
	$pdf->Ln();
	$pdf->Cell(30, $alto, 'R.U.T.:');
	$pdf->Cell(30, $alto, $empleado['Empresa']['rut']);
	$pdf->Ln();
	$pdf->Cell(30, $alto, 'Dirección:');
	$pdf->Cell(30, $alto, $empleado['Empresa']['direccion']);
	$pdf->Ln();
	$pdf->Ln(1);
	$pdf->Cell(0, 0, '', 1);
	$pdf->Ln(1);
	$pdf->Cell(30, $alto, 'Nombre:');
	$pdf->Cell(30, $alto, utf8_decode($empleado['Empleado']['apell_paterno'].' '.$empleado['Empleado']['apell_materno'].' '.$empleado['Empleado']['nombres']));
	$pdf->Ln();
	$pdf->Cell(30, $alto, 'R.U.T.:');
	$pdf->Cell(30, $alto, $empleado['Empleado']['rut']);
	$pdf->Ln();

	// haberes
	$pdf->Cell(0, 0, '', 1);
	$pdf->Ln();
	$pdf->SetFont('Helvetica', 'B', $tamFuente);
	$pdf->Cell(0, 10, 'HABERES', 0, 0, 'C');
	$pdf->Ln();

	// imponibles
	$pdf->Cell(0, $alto, 'IMPONIBLES');
	$pdf->Ln();
	$pdf->SetFont('Helvetica', '', $tamFuente);
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Sueldo:');
	$pdf->Cell(0, $alto, '$ '.$sueldo[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Horas Extra 50%:');
	$pdf->Cell(0, $alto, '$ '.$horasExtra50[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Horas Extra 100%:');
	$pdf->Cell(0, $alto, '$ '.$horasExtra100[$i]);
	$pdf->Ln();
	foreach ($imponibles[$i] as $imponible):
		$pdf->Cell(10);
		$pdf->Cell(50, $alto, utf8_decode($imponible['HaberesDescuento']['nombre'].':'));
		$pdf->Cell(0, $alto, '$ '.$imponible['EmpleadosHaberesDescuento']['valor']);
		$pdf->Ln();
	endforeach; 
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Subtotal:');
	$pdf->Cell(0, $alto, '$ '.$subTotalImponibles[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Gratificación:');
	$pdf->Cell(0, $alto, '$ '.$gratificacion[$i]);
	$pdf->Ln();
	$pdf->Cell(60);
	$pdf->Cell(40, $alto, 'Total Imponibles:');
	$pdf->Cell(0, $alto, '$ '.$totalImponible[$i]);
	$pdf->Ln();

	// no imponibles
	$pdf->SetFont('Helvetica', 'B', $tamFuente);
	$pdf->Cell(0, $alto, 'NO IMPONIBLES');
	$pdf->Ln();
	$pdf->SetFont('Helvetica', '', $tamFuente);
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Asignación Familiar:');
	$pdf->Cell(0, $alto, '$ '.$asignacionFamiliar[$i]);
	$pdf->Ln();
	foreach ($noImponibles[$i] as $noImponible):
		$pdf->Cell(10);
		$pdf->Cell(50, $alto, utf8_decode($noImponible['HaberesDescuento']['nombre'].':'));
		$pdf->Cell(0, $alto, '$ '.$noImponible['EmpleadosHaberesDescuento']['valor']);
		$pdf->Ln();
	endforeach;
	$pdf->Cell(60);
	$pdf->Cell(40, $alto, 'Total No Imponibles:');
	$pdf->Cell(0, $alto, '$ '.$totalNoImponible[$i]);
	$pdf->Ln();
	$pdf->Cell(60);
	$pdf->Cell(40, $alto, 'Total Haberes:');
	$pdf->Cell(0, $alto, '$ '.$totalHaber[$i]);
	$pdf->Ln();

	// descuentos
	$pdf->Cell(0, 0, '', 1);
	$pdf->Ln();
	$pdf->SetFont('Helvetica', 'B', $tamFuente);
	$pdf->Cell(0, 10, 'DESCUENTOS', 0, 0, 'C');
	$pdf->Ln();
	$pdf->SetFont('Helvetica', '', $tamFuente);
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Previsión '.$cotizacion[$i].'%:');
	$pdf->Cell(0, $alto, '$ '.$prevision[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'APV:');
	$pdf->Cell(0, $alto, '$ '.$apv[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, $msgSalud[$i].':');
	$pdf->Cell(0, $alto, '$ '.$salud[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Seguro de Cesantía:');
	$pdf->Cell(0, $alto, '$ '.$seguroCesantia[$i]);
	$pdf->Ln();
	foreach ($descuentos[$i] as $descuento):
		$pdf->Cell(10);
		$pdf->Cell(50, $alto, utf8_decode($descuento['HaberesDescuento']['nombre']));
		$pdf->Cell(0, $alto, '$ '.$descuento['EmpleadosHaberesDescuento']['valor']);
		$pdf->Ln();
	endforeach; 
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Subtotal:');
	$pdf->Cell(0, $alto, '$ '.$subTotalDescuentos[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Remuneración Neta:');
	$pdf->Cell(0, $alto, '$ '.$remuneracionNeta[$i]);
	$pdf->Ln();
	$pdf->Cell(10);
	$pdf->Cell(50, $alto, 'Impuesto Unico:');
	$pdf->Cell(0, $alto, '$ '.$impuestoUnico[$i]);
	$pdf->Ln();
	$pdf->Cell(60);
	$pdf->Cell(40, $alto, 'Total Descuentos:');
	$pdf->Cell(0, $alto, '$ '.$totalDescuento[$i]);
	$pdf->Ln();
	$pdf->Cell(0, 0, '', 1);
	$pdf->Ln(2);
	$pdf->Cell(60);
	$pdf->Cell(40, $alto, 'Total a Pagar:');
	$pdf->Cell(0, $alto, '$ '.$alcanceLiquido[$i]);
	$pdf->Ln();
	}
	$i++;
endforeach;
$pdf->Output();
?>