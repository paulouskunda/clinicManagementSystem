<?php
require_once '../includeFiles/Connection.php';
require_once '../admin/pdfGen/fpdf.php';

//create pdf object
$pdf = new FPDF('P','mm','A3');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

$pdf->Cell(59 ,5,'A Refral Letter',0,1);//end of line


$pdf->Cell(130 ,5,'',0,0);




?>