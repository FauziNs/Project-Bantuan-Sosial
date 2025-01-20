<?php
require_once("tcpdf/tcpdf.php");

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Mochamad Althaf Pramsetya Perkasa');
$pdf->setTitle('Laporan Zakat Fitrah');
$pdf->setSubject('Zakat Fitrah');
$pdf->setKeywords('TCPDF, PDF, example, test, guide');

//font
$pdf->setFont('dejavusans', '', 11, '', true);

$pdf->AddPage();

//add content
$html = file_get_contents("http://localhost/Praktek/laporanbayarzakat.php");

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('Laporan Zakat Fitrah.pdf', 'D');
