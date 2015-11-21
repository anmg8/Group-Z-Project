<?php
require_once('FPDF/fpdf.php');
require_once('FPDI/fpdi.php');

require '../pdfController/form.php';
require '../pdfController/RequestAccess.php';
require '../pdfController/Security.php';
require '../pdfController/AcademicCareer.php';
require '../pdfController/Financials.php';
require '../pdfController/FinancialAid.php';
require '../pdfController/Reserved.php';

session_start();

//DEBUG
//var_dump($_SESSION['formData']);

$formData = $_SESSION['formData'];
/* $formData = array( 
	"Name" => "Adam Newland",
	"Title" => "Student",
	"Department" => "Computer Science",
	"pawprint" => "anmg8"
); */

// initiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile("security-request-form.pdf");
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page 
$pdf->useTemplate($tplIdx);

// now write some text to the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(255, 0, 0);


//write name field
$pdf->SetXY(55, 53); //coords for Name field
$pdf->Write(0, $formData->getFullName());

//write title field
$pdf->SetXY(55, $pdf->GetY() + 13); //hacky way to set position for printout, maybe not the best way
$pdf->Write(0, $formData->getTitle());

//write department field
$pdf->SetXY(55, $pdf->GetY() + 12);
$pdf->Write(0, $formData->getDepartment());

//write pawprint field
$pdf->SetXY(157, 51);
$pdf->Write(0, $formData->getPawprint());

//write EMPID
$pdf->SetXY(157, 60);
$pdf->Write(0, $formData->getEmpId());

//write address
$pdf->SetXY(157, 69);
$pdf->Write(0, $formData->getAddress());

//write phone number
$pdf->SetXY(157, 78);
$pdf->Write(0, $formData->getPhone());

//write new request check box               TODO: add logic to determine proper checkbox
$pdf->SetXY(13, 97);
$pdf->Write(0, "X");


//add a new page to the document
$pdf->AddPage();

$tplIdx = $pdf->importPage(2); //import the new page into the document
$pdf->useTemplate($tplIdx);


//add final page
$pdf->AddPage();

$tplIdx = $pdf->importPage(3);

$pdf->useTemplate($tplIdx);

// Output the new PDF
$pdf->Output();


?>