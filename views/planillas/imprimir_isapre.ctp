<?php
include ('fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', 'Letter');
$pdf->SetMargins(9, 10);
$pdf->SetAutoPageBreak(true, 5);
$alto = 3;
$tamFuente = 8;
$bor = 0;

$i = 0;
foreach ($isapres as $isapre):
if ($empleados[$i]) {
	$pdf->AddPage();
	
	// encabezado
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(50, $alto, 'ISAPRE '.utf8_decode(strtoupper($isapre['Isapre']['nombre'])), $bor);
	$pdf->SetX(222);
	$pdf->Cell(30, $alto, 'FOLIO:', $bor, 1);
	$pdf->Cell(0, $alto, 'PLANILLA DE DECLARACION Y PAGO DE SALUD A ISAPRES', $bor, 1, 'C');
	$pdf->ln();
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(0, $alto, 'TIPO DE PAGO:   Declaración y Pago [X 1]    Declaración y No Pago [  2]    Pago Decl. Anterior [  3]    Gratificaciones [  4]    Otras [  5]', $bor, 1, 'C');
	$pdf->ln();
		
	// sección a
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(75, $alto, 'SECCION A: IDENTIFICACION DEL ENTE PAGADOR:', $bor);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(0, $alto, 'EMPLEADOR [X]    ENTIDAD ENCARGADA PAGO PENSION [ ]    TRABAJADOR INDEPENDIENTE [ ]    VOLUNTARIO [ ]', $bor, 1);
	$pdf->Cell(0, 0, '', 1, 1);
	$pdf->ln(1);
	$pdf->Cell(45, $alto, '1) Razón Social o Nombre:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(130, $alto, utf8_decode($empresa['Empresa']['nombre']), $bor);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(35, $alto, '2) R.U.T.:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(0, $alto, utf8_decode($empresa['Empresa']['rut']), $bor, 1);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(45, $alto, '3) Dirección:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(130, $alto, utf8_decode($empresa['Empresa']['direccion']), $bor);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(35, $alto, '4) Teléfono:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(0, $alto, utf8_decode($empresa['Empresa']['telefono']), $bor, 1);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(45, $alto, '5) Nombre Repr. Legal:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(130, $alto, utf8_decode($empresa['Empresa']['rep_legal_nombre']), $bor);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(35, $alto, '6) RUT Repr. Legal:', $bor);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(0, $alto, utf8_decode($empresa['Empresa']['rep_legal_rut']), $bor, 1);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(0, $alto, '7) Cambio en el Representante Legal [ ]       Cambio Dirección Empleador [ ]       Cambio RUT Empleador [ ]', $bor, 1);
	$pdf->ln();
	
	// sección b
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(75, $alto, 'SECCION B: DETALLE DE COTIZACIONES:', $bor, 1);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->Cell(0, 0, '', 1, 1);
	$pdf->ln(1);
	$pdf->Cell(100, $alto, 'IDENTIFICACION DEL AFILIADO', $bor, 1, 'C');
	$y = $pdf->GetY();
	$pdf->MultiCell(9, $alto, "Nº\n(1)", $bor, 'C');
	$pdf->SetXY(18, $y);
	$pdf->MultiCell(22, $alto, "RUT o CI\n(2)", $bor, 'C');
	$pdf->SetXY(18+22, $y);
	$pdf->MultiCell(9, $alto, "NºFu\n(3)", $bor, 'C');
	$pdf->SetXY(18+22+9, $y);
	$pdf->MultiCell(60, $alto, "Ap. Paterno Ap. Materno Nombres\n(4)", $bor, 'C');
	$y -= $alto;
	$pdf->SetXY(18+22+9+60, $y);
	$pdf->MultiCell(18, $alto, "Remun.\nImponible\n(5)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18, $y);
	$pdf->MultiCell(18, $alto, "Cotizac.\n7%\n(6)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18+18, $y);
	$pdf->MultiCell(18, $alto, "Ley 18566\n%    $\n(7)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18+18+18, $y);
	$pdf->MultiCell(18, $alto, "Cotizac.\nAdic.\n(8)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18+18+18+18, $y);
	$pdf->MultiCell(18, $alto, "Cotizac.\na Pagar\n(9)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18+18+18+18+18, $y);
	$pdf->MultiCell(18, $alto, "Cotizac.\nPactada\n(10)", $bor, 'C');
	$pdf->SetXY(18+22+9+60+18+18+18+18+18+18, $y);
	$pdf->MultiCell(0, $alto, "Movimientos del Personal\nCod.   F/Inicio   F/Término\n(11)", $bor, 'C');
	$pdf->Cell(0, 0, '', 1, 1);
	$pdf->ln(1);
	
	$totalImponible = 0;
	$totalSaludLegal = 0;
	$totalSaludLey18566 = 0;
	$totalSaludAdicional = 0;
	$totalSalud = 0;
	$totalSaludPlan = 0;
	$j = 0;
	foreach ($empleados[$i] as $empleado):
		$pdf->Cell(9, $alto, $j+1, $bor, 0, 'C');
		$pdf->Cell(22, $alto, utf8_decode($empleado['Empleado']['rut']), $bor);
		$pdf->Cell(9, $alto, utf8_decode($empleado['Empleado']['id']), $bor, 0, 'R');
		$pdf->Cell(60, $alto, utf8_decode($empleado['Empleado']['apell_paterno'].' '.$empleado['Empleado']['apell_materno'].' '.$empleado['Empleado']['nombres']), $bor);
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['imponible']), $bor, 0, 'R');
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['salud_legal']), $bor, 0, 'R');
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['salud_ley18566_porc'].'% '.$empleado['Liquidacion']['salud_ley18566_valor']), $bor, 0, 'R');
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['salud_adicional']), $bor, 0, 'R');
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['salud']), $bor, 0, 'R');
		$pdf->Cell(18, $alto, utf8_decode($empleado['Liquidacion']['salud_plan']), $bor, 0, 'R');
		
		$pdf->ln();
		$totalImponible += $empleado['Liquidacion']['imponible'];
		$totalSaludLegal += $empleado['Liquidacion']['salud_legal'];
		$totalSaludLey18566 += $empleado['Liquidacion']['salud_ley18566_valor'];
		$totalSaludAdicional += $empleado['Liquidacion']['salud_adicional'];
		$totalSalud += $empleado['Liquidacion']['salud'];
		$totalSaludPlan += $empleado['Liquidacion']['salud_plan'];
		$j++;
	endforeach;
	$pdf->SetY(135);
	$pdf->Cell(0, 0, '', 1);
	$pdf->ln(1);
	$pdf->SetX(79);
	$pdf->Cell(30, $alto, 'TOTAL PAGINA:', $bor);
	$pdf->Cell(18, $alto, $totalImponible, $bor, 0, 'R');
	$pdf->Cell(18, $alto, $totalSaludLegal, $bor, 0, 'R');
	$pdf->Cell(18, $alto, $totalSaludLey18566, $bor, 0, 'R');
	$pdf->Cell(18, $alto, $totalSaludAdicional, $bor, 0, 'R');
	$pdf->Cell(18, $alto, $totalSalud, $bor, 0, 'R');
	$pdf->Cell(18, $alto, $totalSaludPlan, $bor, 1, 'R');
	$pdf->SetX(109);
	$pdf->Cell(108, 0, '', 1, 1);
	
	// sección c
	$pdf->ln($alto);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$y2 = $pdf->GetY();
	$pdf->Cell(160, $alto, 'SECCION C: DETALLE DE COTIZACIONES:', $bor, 1);
	$pdf->Cell(160, 0, '', 1);
	$pdf->ln(1);
	$pdf->SetFont('Courier', '', $tamFuente);
	$y = $pdf->GetY();
	$pdf->Cell(77, $alto, '(1) Detalle de Cotización Declarada y Otros', $bor, 1);
	$pdf->Cell(50, $alto, 'CONCEPTO', $bor, 0, 'C');
	$pdf->Cell(9, $alto, 'COD.', $bor, 0, 'C');
	$pdf->Cell(18, $alto, 'VALORES', $bor, 1, 'C');
	$pdf->Cell(50, $alto, 'Cotización Legal', $bor);
	$pdf->Cell(9, $alto, '01', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSaludLegal, $bor, 1, 'R');
	$pdf->Cell(50, $alto, 'Cot. Art.8 Ley 18566', $bor);
	$pdf->Cell(9, $alto, '02', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSaludLey18566, $bor, 1, 'R');
	$pdf->Cell(50, $alto, 'Cotiz. Adic. Voluntaria', $bor);
	$pdf->Cell(9, $alto, '03', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSaludAdicional, $bor, 1, 'R');
	$pdf->Cell(50, $alto, 'Total Cotiz. a Pagar', $bor);
	$pdf->Cell(9, $alto, '04', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSalud, $bor, 1, 'R');
	$pdf->Cell(50, $alto, 'Reajustes', $bor);
	$pdf->Cell(9, $alto, '05', $bor, 1, 'C');
	$pdf->Cell(50, $alto, 'Intereses', $bor);
	$pdf->Cell(9, $alto, '06', $bor, 1, 'C');
	$pdf->ln();
	$pdf->Cell(50, $alto, 'SUB-TOTAL', $bor);
	$pdf->Cell(9, $alto, '07', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSalud, $bor, 1, 'R');
	$pdf->ln();
	$pdf->Cell(50, $alto, 'TOTAL A PAGAR', $bor);
	$pdf->Cell(9, $alto, '08', $bor, 0, 'C');
	$pdf->Cell(18, $alto, $totalSalud, $bor, 1, 'R');
	
	$pdf->SetXY(96, $y);
	$pdf->Cell(73, $alto, '(2) Antecedentes sobre el pago', $bor, 1);
	$pdf->SetX(96); $pdf->Cell(73, $alto, 'Favor emitir cheque a nombre de:', $bor, 1);
	$pdf->SetX(96); $pdf->Cell(73, $alto, 'ISAPRE '.utf8_decode(strtoupper($isapre['Isapre']['nombre'])), $bor, 1);
	$pdf->ln();
	$pdf->SetX(96); $pdf->Cell(73, $alto, 'Efectivo [ ]  Cheque No.', $bor, 1);
	$pdf->ln();
	$pdf->SetX(96); $pdf->Cell(73, $alto, 'Banco         Plaza', $bor, 1);
	$pdf->ln($alto*5);
	$pdf->SetX(96); $pdf->MultiCell(73, $alto, 'Declaro que los datos consignados son expresión fiel de la realidad.', $bor, 'L');
	
	// seccion d
	$pdf->SetXY(175, $y2);
	$pdf->SetFont('Courier', 'B', $tamFuente);
	$pdf->Cell(0, $alto, 'SECCION D: ANTECEDENTES GENERALES:', $bor, 1);
	$pdf->SetX(175); $pdf->Cell(0, 0, '', 1, 1);
	$pdf->ln(1);
	$pdf->ln($alto);
	$pdf->SetFont('Courier', '', $tamFuente);
	$pdf->SetX(175); $pdf->Cell(0, $alto, '(1) NORMAL [X]   (2) ATRASADA [ ]   (3) ADELANTADA [ ]', $bor, 1);
	$pdf->ln();
	$pdf->SetX(175); $pdf->Cell(0, $alto, '(4) Fecha Pago:   /   /       (5) No. Afiliados ['.($j+1).']', $bor, 1);
	$pdf->SetX(175); $pdf->Cell(0, $alto, '               Día Mes Año', $bor, 1);
	$pdf->ln();
	$pdf->SetX(175); $pdf->Cell(0, $alto, 'Periodo Pago: '.$session->read('mes').'/'.$session->read('ano').'  (7) No. Hojas Anexas [0]', $bor, 1);
	$pdf->ln();
	$pdf->SetX(175); $pdf->Cell(0, $alto, 'Gratificaciones', $bor, 1, 'C');
	$pdf->SetX(175); $pdf->Cell(0, $alto, 'Desde: [   /    ]       Hasta: [   /    ]', $bor, 1, 'C');
	
	// firmas y timbres
	$pdf->SetXY(30, 205);
	$pdf->Cell(75, $alto, 'Firma del Empleador o Representante Legal', 'T', 0, 'C');
	$pdf->Cell(30);
	$pdf->Cell(45, $alto, 'VºBº Recepción y Cálculo', 'T', 0, 'C');
	$pdf->Cell(30);
	$pdf->Cell(45, $alto, 'VºBº y Timbre Cajero', 'T', 0, 'C');
	
}
	$i++;
endforeach;
$pdf->Output();
?>