<?php
$pdf = new FPDF();
$sqlCDOrders = "SELECT * FROM cdReqNumber ORDER BY reqNumberID";
$resultCDOrders = sqlsrv_query($conn, $sqlCDOrders);
while ($row = sqlsrv_fetch_array($resultCDOrders, SQLSRV_FETCH_ASSOC)) {
	
	$dispensedBy = $_SESSION['first-name'] . ' ' . $_SESSION['surname'];
	$orderedBy = $row['firstName'] . ' ' . $row['lastName'];

	$time = strtotime($row['orderedOn']->format('d-M-Y'));
	$myFormatForView = date("d/m/Y ", $time);

	$pdf->AddPage();

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 5, '*** IN DEVELOPMENT - NOT AN OFFICIAL DOCUMENT ***',0,1,'C',1);
	$pdf->Cell(190, 5, '*** PHARMACY COPY ***',0,1,'C',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 6);
	$pdf->Cell(190, 5, 'Requisition number',0,1,'C',1);
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(190, 5, $row['reqNumberID'],0,1,'C',1);

	$pdf->Ln(2);

	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(190, 8, $row['ward'],0,1,'C',1);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(190, 5, 'Controlled Drug Stock Order',0,1,'C',1);

	$pdf->Ln(10);

	$pdf->SetFillColor(230,230,230);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(160, 5, 'Drug',1,0,'C',1);
	$pdf->Cell(30, 5, 'Quantity',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(160, 10, $row['drugName'],1,0,'C',1);
	$pdf->Cell(30, 10, $row['quantity'],1,1,'C',1);
	//$pdf->Cell(190, 5, 'Other information:',1,1,'L',1);
	$pdf->MultiCell( 190, 20, 'Other information:', 1);

	$pdf->Ln(5);

	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(40, 5, 'Ward',1,0,'C',1);
	$pdf->Cell(40, 5, 'Ordered by',1,0,'C',1);
	$pdf->Cell(60, 5, 'Position',1,0,'C',1);
	$pdf->Cell(25, 5, 'Ext',1,0,'C',1);
	$pdf->Cell(25, 5, 'Date',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(40, 10, $row['ward'],1,0,'C',1);
	$pdf->Cell(40, 10, $orderedBy,1,0,'C',1);
	$pdf->Cell(60, 10, $row['position'],1,0,'C',1);
	$pdf->Cell(25, 10, $row['ext'],1,0,'C',1);
	$pdf->Cell(25, 10, $myFormatForView,1,1,'C',1);

	$pdf->Ln(15);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 5, 'All boxes must be completed',0,1,'C',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(190, 5, 'Dispensed by',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(140, 15, $dispensedBy,1,0,'C',1);
	$pdf->Cell(50, 15, date("d/m/Y"),1,1,'C',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(190, 5, 'Checked by',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', '', 6);
	$pdf->Cell(70, 15, 'Signature:',1,0,'L',1);
	$pdf->Cell(70, 15, 'Print name:',1,0,'L',1);
	$pdf->Cell(50, 15, 'Date',1,1,'L',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(190, 5, 'Delivered/Collected by',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', '', 6);
	$pdf->Cell(60, 15, 'Signature:',1,0,'L',1);
	$pdf->Cell(60, 15, 'Print name:',1,0,'L',1);
	$pdf->Cell(40, 15, 'Date',1,0,'L',1);
	$pdf->Cell(30, 15, 'Position: HCA/NHCA/Porter',1,1,'L',1);

	// Ward copy

	$pdf->AddPage();

	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 5, '*** IN DEVELOPMENT - NOT AN OFFICIAL DOCUMENT ***',0,1,'C',1);
	$pdf->Cell(190, 5, '*** WARD COPY - Please retain for 2 years ***',0,1,'C',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 6);
	$pdf->Cell(190, 5, 'Requisition number',0,1,'C',1);
	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(190, 5, $row['reqNumberID'],0,1,'C',1);

	$pdf->Ln(2);

	$pdf->SetFont('Arial', 'B', 16);
	$pdf->Cell(190, 8, $row['ward'],0,1,'C',1);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(190, 5, 'Controlled Drug Stock Order',0,1,'C',1);

	$pdf->Ln(10);

	$pdf->SetFillColor(230,230,230);
	$pdf->SetFont('Arial', '', 10);
	$pdf->Cell(160, 5, 'Drug',1,0,'C',1);
	$pdf->Cell(30, 5, 'Quantity',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(160, 10, $row['drugName'],1,0,'C',1);
	$pdf->Cell(30, 10, $row['quantity'],1,1,'C',1);
	//$pdf->Cell(190, 5, 'Other information:',1,1,'L',1);
	$pdf->MultiCell( 190, 20, $row['info'], 1);

	$pdf->Ln(5);

	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(40, 5, 'Ward',1,0,'C',1);
	$pdf->Cell(40, 5, 'Ordered by',1,0,'C',1);
	$pdf->Cell(60, 5, 'Position',1,0,'C',1);
	$pdf->Cell(25, 5, 'Ext',1,0,'C',1);
	$pdf->Cell(25, 5, 'Date',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(40, 10, $row['ward'],1,0,'C',1);
	$pdf->Cell(40, 10, $orderedBy,1,0,'C',1);
	$pdf->Cell(60, 10, $row['position'],1,0,'C',1);
	$pdf->Cell(25, 10, $row['ext'],1,0,'C',1);
	$pdf->Cell(25, 10, $myFormatForView,1,1,'C',1);

	$pdf->Ln(15);

	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(190, 5, 'All boxes must be completed',0,1,'C',1);

	$pdf->Ln(5);

	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(190, 5, 'Delivered/Collected by',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', '', 6);
	$pdf->Cell(60, 15, 'Signature:',1,0,'L',1);
	$pdf->Cell(60, 15, 'Print name:',1,0,'L',1);
	$pdf->Cell(40, 15, 'Date',1,0,'L',1);
	$pdf->Cell(30, 15, 'Position: HCA/NHCA/Porter',1,1,'L',1);

	$pdf->Ln(15);

	$pdf->SetFont('Arial', '', 10);
	$pdf->SetFillColor(230,230,230);
	$pdf->Cell(190, 5, 'Received by',1,1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial', '', 6);
	$pdf->Cell(70, 15, 'Signature:',1,0,'L',1);
	$pdf->Cell(70, 15, 'Print name:',1,0,'L',1);
	$pdf->Cell(50, 15, 'Date',1,1,'L',1);
}
$pdf->Output('', 'cd-requisition-orders.pdf','');
?>