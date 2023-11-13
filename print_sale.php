<?php
require_once('includes/load.php');
require_once('TCPDF-main/tcpdf.php');

date_default_timezone_set(date_default_timezone_get());


page_require_level(3);


$sales = find_all_sale();


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);


$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Admin');
$pdf->SetTitle('Sales Report');
$pdf->SetSubject('Sales Report');
$pdf->SetKeywords('Product, List, PDF');

// Add a new page
$pdf->AddPage();

// Create the header
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Sales Report', 0, 1, 'C');

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Date and Time: ' . gmdate('Y-m-d H:i:s', time() + 19800), 0, 1, 'C');


// Create the table header
$pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(7, 10, 'ID', 1, 0, 'C');
    $pdf->Cell(70, 10, 'Product Name', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
    $pdf->Cell(40, 10, 'Total', 1, 0, 'C');
    $pdf->Cell(45, 10, 'Date Sold', 1, 1, 'C');
    $pdf->SetFillColor(255,255,255);
// Create the table rows
$pdf->SetFont('helvetica', '', 12);
foreach ($sales as $sale) {
    
    if ($sale['qty'] < 5) {
        $pdf->SetFillColor(255, 204, 204); // Light red color
        $pdf->SetTextColor(0); // Black text color
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(7, 10, count_id(), 1, 0, 'C', true);
        $pdf->Cell(70, 10, $sale['name'], 1, 0, 'C', true);
        $pdf->Cell(30, 10, $sale['qty'], 1, 0, 'C', true);
        $pdf->Cell(40, 10, $sale['price'], 1, 0, 'C', true);
        $pdf->Cell(45, 10, $sale['date'], 1, 1, 'C', true);
        $pdf->SetFillColor(255,255,255); // Reset fill color to default
        $pdf->SetTextColor(0, 0, 0); // Reset text color to default
        $pdf->SetFont('helvetica', '', 12);
    }
    else{
        $pdf->Cell(7, 10, count_id(), 1, 0, 'C', true);
        $pdf->Cell(70, 10, $sale['name'], 1, 0, 'C', true);
        $pdf->Cell(30, 10, $sale['qty'], 1, 0, 'C', true);
        $pdf->Cell(40, 10, $sale['price'], 1, 0, 'C', true);
        $pdf->Cell(45, 10, $sale['date'], 1, 1, 'C', true);
    }
}

$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(0, 10, 'Date and Time: ' . gmdate('Y-m-d H:i:s', time() + 19800), 0, 1, 'C');
// Clear any output before generating the PDF
ob_end_clean(); // Clear any output before generating the PDF
$pdf->Output('sale_report_' . date('Y-m-d_H-i-s', time() + 16200) . '.pdf', 'D');
