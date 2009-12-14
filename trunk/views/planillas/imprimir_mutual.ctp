<?php
include ('fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'Letter');
$pdf->SetMargins(9, 10);
$pdf->SetAutoPageBreak(true, 5);
$alto = 3;
$tamFuente = 8;
$bor = 0;

$pdf->AddPage();

$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->MultiCell(0, $alto, "PLANILLA DE DECLARACION Y PAGO DE COTIZACIONES\nINSTITUCION ACCIDENTES DEL TRABAJO\n".$empresa['Seguridad']['nombre'], $bor, 'C');
$pdf->SetXY(240, 9);
$pdf->SetFont('Courier', '', $tamFuente-2);
$pdf->Cell(20, $alto, 'FOLIO', $bor, 0, 'C');
$pdf->Rect(240, 12, 20, 5);
$pdf->SetXY(10, 22);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(40, $alto, 'TIPO DE REMUNERACION', $bor, 1);
$pdf->Cell(50, $alto, '1) Sueldo, Sobresueldo y Otros [  ]', $bor, 1);
$pdf->Cell(50, $alto, '2) Gratificación               [  ]', $bor, 1);
$pdf->SetXY(75, 22);
$pdf->Cell(18, $alto, 'Periodo: ', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(20, $alto, $session->read('mes').'/'.$session->read('ano'), $bor);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->SetXY(115, 22);
$pdf->Cell(41, $alto, 'Total Remun. Imponible: ', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(23, $alto, '', $bor);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(35, $alto, 'Nº De Trabajadores: ', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(15, $alto, $ntrab, $bor);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(0, $alto, 'Nº De Adherente: ', $bor, 1);
$pdf->SetY(32);
$pdf->Cell(0, 0, '', 1, 1);

$pdf->ln(1);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(35, $alto, 'Razón Social:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(70, $alto, utf8_decode($empresa['Empresa']['nombre']), $bor);
$pdf->SetX(130);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(25, $alto, 'R.U.T.:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(45, $alto, utf8_decode($empresa['Empresa']['rut']), $bor);
$pdf->SetX(190);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(30, $alto, 'Cod. Act. Econ.:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(45, $alto, utf8_decode($empresa['Empresa']['actividad_id']), $bor);
$pdf->ln();
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(35, $alto, 'Dirección:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(70, $alto, utf8_decode($empresa['Empresa']['direccion'].', '.$empresa['Empresa']['ciudad']), $bor);
$pdf->SetX(190);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(30, $alto, 'Teléfono:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(45, $alto, utf8_decode($empresa['Empresa']['telefono']), $bor);
$pdf->ln();
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(35, $alto, 'Nombre Rep. Legal:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(70, $alto, utf8_decode($empresa['Empresa']['rep_legal_nombre']), $bor);
$pdf->SetX(130);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(25, $alto, 'R.U.T. Repr.:', $bor);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->Cell(45, $alto, utf8_decode($empresa['Empresa']['rep_legal_rut']), $bor, 1);
$pdf->SetFont('Courier', '', $tamFuente);
$pdf->ln(1);
$pdf->Cell(0, 0, '', 1, 1);
$pdf->ln(1);

$y = $pdf->GetY();
$pdf->SetXY(29, $y+2);
$pdf->MultiCell(10, $alto, "Nº", $bor, 'C');
$pdf->SetXY(29+10, $y+2);
$pdf->MultiCell(25, $alto, "RUT o CI", $bor, 'C');
$pdf->SetXY(29+10+25, $y+2);
$pdf->MultiCell(90, $alto, "Ap.Paterno Ap.Materno Nombres", $bor, 'C');
$pdf->SetXY(29+10+25+90, $y);
$pdf->MultiCell(20, $alto, "Remun.\nImpon.", $bor, 'C');
$pdf->ln(1);
$pdf->SetX(29);
$pdf->Cell(145, 0, '', 1, 1);
$pdf->ln(1);

$totalImponible = 0;
$i = 0;
foreach ($empleados as $empleado):
	$pdf->Cell(20);
	$pdf->Cell(10, $alto, $i+1, $bor, 0, 'C');
	$pdf->Cell(25, $alto, utf8_decode($empleado['Empleado']['rut']), $bor);
	$pdf->Cell(90, $alto, utf8_decode($empleado['Empleado']['apell_paterno'].' '.$empleado['Empleado']['apell_materno'].' '.$empleado['Empleado']['nombres']), $bor);
	$pdf->Cell(20, $alto, utf8_decode($empleado['Liquidacion']['imponible']), $bor, 0, 'R');
	
	$pdf->ln();
	$totalImponible += $empleado['Liquidacion']['imponible'];
	$i++;
endforeach;

$pdf->SetY(105);
$pdf->SetFont('Courier', 'B', $tamFuente);
$pdf->SetX(29);
$pdf->Cell(145, 0, '', 1, 1);
$pdf->ln(1);
$pdf->SetX(124);
$pdf->Cell(30, $alto, 'TOTAL PAGINA:', $bor);
$pdf->Cell(20, $alto, $totalImponible, $bor, 1, 'R');
$pdf->ln();
$pdf->Cell(0, 0, '', 1, 1);
$pdf->ln(2);

$pdf->SetFont('Courier', '', $tamFuente);
$pdf->Cell(35, $alto, '', $bor);
$pdf->Cell(10, $alto, '%', $bor, 0, 'C');
$pdf->Cell(20, $alto, 'Valor', $bor, 0, 'C');
$pdf->ln();
$y = $pdf->GetY();
$pdf->Cell(35, $alto, 'Tasa Cotización:', $bor);
$pdf->Cell(10, $alto, $empresa['Empresa']['porc_seguro']+0.95, $bor, 0, 'C');
$pdf->Cell(20, $alto, round(($totalImponible * ($empresa['Empresa']['porc_seguro']+0.95)) / 100), $bor, 0, 'R');
$pdf->ln();
$pdf->Cell(35, $alto, 'Reajustes:', $bor);
$pdf->ln();
$pdf->Cell(35, $alto, 'Interés Penal:', $bor);
$pdf->ln();
$pdf->Cell(35, $alto, 'Multas:', $bor);
$pdf->ln();
$pdf->Cell(35, $alto, 'Diferencias de Cotización:', $bor);
$pdf->ln();
$pdf->ln();
$pdf->Cell(45, $alto, 'TOTAL A PAGAR:', $bor);
$pdf->Cell(20, $alto, round(($totalImponible * ($empresa['Empresa']['porc_seguro']+0.95)) / 100), $bor, 0, 'R');
$pdf->ln();

	$pdf->SetXY(85, $y);
	$pdf->Cell(73, $alto, 'Antecedentes sobre el pago', $bor, 1);
	$pdf->ln();
	$pdf->SetX(85); $pdf->Cell(73, $alto, 'Efectivo [ ]  Cheque No.', $bor, 1);
	$pdf->ln();
	$pdf->SetX(85); $pdf->Cell(73, $alto, 'Banco         Plaza', $bor, 1);
	$pdf->ln($alto*5);
	$pdf->SetX(85); $pdf->MultiCell(73, $alto, 'Declaro que los datos consignados son expresión fiel de la realidad.', $bor, 'L');

// $pdf->Rect(175, 115, 90, 80);
	$pdf->SetXY(175, 116);
	$pdf->Cell(90, $alto, 'USO EXCLUSIVO MUTUAL', $bor, 1, 'C');
	$pdf->SetXY(195, 145);
	$pdf->Cell(50, $alto, 'FIRMA FECHA TIMBRE', 'T', 1, 'C');
	$pdf->SetX(195);
	$pdf->Cell(50, $alto, 'DE DECLARACION', $bor, 1, 'C');
	
	$pdf->SetXY(90, 180);
	$pdf->Cell(75, $alto, 'Firma del Empleador o Representante Legal', 'T', 0, 'C');
	
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->SetXY(157, 22); $pdf->Cell(23, $alto, $totalImponible, $bor);



$pdf->Output();
?>