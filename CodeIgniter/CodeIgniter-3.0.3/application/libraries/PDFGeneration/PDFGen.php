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
$pdf->SetXY(157, 84);
$pdf->Write(0, $formData->getPhone());

//write new request check box               TODO: add logic to determine proper checkbox
$pdf->SetXY(13.5, 97);
$pdf->Write(0, "X");

//write additional request check box
$pdf->SetXY(13.5, 103.5);
$pdf->Write(0, "X");

//write student worker check box
$pdf->SetXY(13.5, 127);
$pdf->Write(0,"X");

$security = $formData->getSecurity();

//write current staff check box    //////////////getSecurity()
$pdf->SetXY(98.5, 101.5);
$pdf->Write(0, "X");

//write former staff check box
$pdf->SetXY(156, 101.5);
$pdf->Write(0, "X");

//write former staff name
$pdf->SetXY(136, 110);
$pdf->Write(0, $security[0]);

//end security ///////////////////////////////

//write FERPA score
$pdf->SetXY(35, 165.5);
$pdf->Write(0, $formData->getFerpaScore());

//write access desc
$pdf->SetXY(7, 192);
$pdf->MultiCell(203, 5, $formData->getAccessDescription(), 0, "L");

////////////Academic Careers checkboxes //////////////

//write UGRD checkbox
$pdf->SetXY(24.2, 244.1);
$pdf->Write(0, "X");

//write GRAD checkbox
$pdf->SetXY(64.8, 244.1);
$pdf->Write(0, "X");

//write MED checkbox
$pdf->SetXY(105.5, 244.1);
$pdf->Write(0, "X");

//write VET MED checkbox
$pdf->SetXY(146, 244.1);
$pdf->Write(0, "X");

//write LAW checkbox
$pdf->SetXY(186.5, 244.1);
$pdf->Write(0, "X");

////////////////End academic careers ////////////////////


//add a new page to the document
$pdf->AddPage();

$tplIdx = $pdf->importPage(2); //import the new page into the document
$pdf->useTemplate($tplIdx);

$pdf->SetRightMargin(0.1); //sets right margin of PDF to .1 cm so we can write to the update checkboxes


//////////////////////////////////Student Records Access ////////////

//write Basic Inquiry checkboxes
//view
$pdf->SetXY(186, 73);
$pdf->Write(0, "X");

//NO update

//write Adv. Inq. checkboxes
//view
$pdf->SetXY(186, 90);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 90);
$pdf->Write(0, "X");

//write 3Cs checkboxes
//view
$pdf->SetXY(186, 103.2);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 103.2);
$pdf->Write(0, "X");

//write advisor update checkboxes
//NO view

//update
$pdf->SetXY(199.7, 113);
$pdf->Write(0, "X");

//write Dept. SOC Update checkboxes
//NO view

//update
$pdf->SetXY(199.7, 124);
$pdf->Write(0, "X");

//write Service Indicators checkboxes
//view
$pdf->SetXY(186, 137);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 137);
$pdf->Write(0, "X");

//write Student group view checkboxes
//view
$pdf->SetXY(186, 148.5);
$pdf->Write(0, "X");

//NO update

//write view study list checkboxes
//view
$pdf->SetXY(186, 158.3);
$pdf->Write(0, "X");

//NO update


//write Registrar enrollment checkboxes
//view
$pdf->SetXY(186, 168.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 168.5);
$pdf->Write(0, "X");

//write Advisor Student center checkboxes
//view
$pdf->SetXY(186, 179.5);
$pdf->Write(0, "X");

//NO update


//write class Permission checkboxes
//NO view

//update
$pdf->SetXY(199.7, 189.5);
$pdf->Write(0, "X");

//write Class Permission View checkboxes
//view
$pdf->SetXY(186, 198.3);
$pdf->Write(0, "X");

//NO update


//write Class Roster checkboxes
//view
$pdf->SetXY(186, 208);
$pdf->Write(0, "X");

//NO update

//write Block Enrollments checkboxes
//view
$pdf->SetXY(186, 218.2);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 218.2);
$pdf->Write(0, "X");

//write Report Manager checkboxes
//view
$pdf->SetXY(186, 228.2);
$pdf->Write(0, "X");

//NO update

//write Self Service Advisor checkboxes
//NO view

//update
$pdf->SetXY(199.7, 242.2);
$pdf->Write(0, "X");

//write Fiscal Officer checkboxes
//view
$pdf->SetXY(186, 256.3);
$pdf->Write(0, "X");

//NO update

//write Academic Advising Profile
//NO view

//update
$pdf->SetXY(199.7, 266.2);
$pdf->Write(0, "X");

////////////////////End Student Records Access /////////////////////

//add final page
$pdf->AddPage();

$tplIdx = $pdf->importPage(3);

$pdf->useTemplate($tplIdx);

$pdf->SetRightMargin(0.1);

//////////////////// Admissions Access ///////////////////

//write ALL 
$pdf->SetXY(143.3, 40.3);
$pdf->Write(0, "X");

//write ACT
$pdf->SetXY(21.5, 47);
$pdf->Write(0, "X");

//write IELTS
$pdf->SetXY(21.5, 52.4);
$pdf->Write(0, "X");

//write GED
$pdf->SetXY(21.5, 58.3);
$pdf->Write(0, "X");

//write SAT
$pdf->SetXY(62, 47);
$pdf->Write(0, "X");

//write LSAT
$pdf->SetXY(62, 52.4);
$pdf->Write(0, "X");

//write MILLERS
$pdf->SetXY(62, 58.3);
$pdf->Write(0, "X");

//write GRE
$pdf->SetXY(102.7, 47);
$pdf->Write(0, "X");

//write MCAT
$pdf->SetXY(102.7, 52.4);
$pdf->Write(0, "X");

//write PRAX
$pdf->SetXY(102.7, 58.3);
$pdf->Write(0, "X");

//write GMAT
$pdf->SetXY(143.3, 47);
$pdf->Write(0, "X");

//write AP
$pdf->SetXY(143.3, 52.4);
$pdf->Write(0, "X");

//write PLA-MU
$pdf->SetXY(143.3, 58.3);
$pdf->Write(0, "X");

//write TOFEL
$pdf->SetXY(184, 47);
$pdf->Write(0, "X");

//write CLEP
$pdf->SetXY(184, 52.4);
$pdf->Write(0, "X");

//write BASE
$pdf->SetXY(184, 58.3);
$pdf->Write(0, "X");

///////////////////// END Admissions Access //////////////

///////////////////// Cashiers Access ////////////////

//write SF General Inquiry 
//view 
$pdf->SetXY(186.7, 93.5);
$pdf->Write(0, "X");

//NO update

//write SF Cash group post
//view 
$pdf->SetXY(186.7, 101);
$pdf->Write(0, "X");

//update
$pdf->SetXY(200.5, 101);
$pdf->Write(0, "X");

/////////////////// END Cashiers access //////////////

/////////////////// Financial Aid Access ///////////////
//write FA Cash
//view
$pdf->SetXY(186.3, 138);
$pdf->Write(0, "X");

//write FANON Finaid staff
//view 
$pdf->SetXY(186.3, 145.5);
$pdf->Write(0, "X");

/////////////////// END Financial Aid Access /////////////////

/////////////////// Reserved Access //////////////////////
//write Immunization view
//view 
$pdf->SetXY(84.7, 245.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(98.5, 245.5);
$pdf->Write(0, "X");

//write Transfer Credit Admission
//view 
$pdf->SetXY(84.7, 252.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(98.5, 252.5);
$pdf->Write(0, "X");

//write Relationships
//view 
$pdf->SetXY(84.7, 259.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(98.5, 259.5);
$pdf->Write(0, "X");

//write Student Groups
//NO view 

//update
$pdf->SetXY(98.5, 266.5);
$pdf->Write(0, "X");

//write Accommodate 
//NO view 

//update
$pdf->SetXY(199.7, 245.5);
$pdf->Write(0, "X");

//write Support Staff
//view 
$pdf->SetXY(186, 252.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 252.5);
$pdf->Write(0, "X");

//write Advance Standing Report
//view 
$pdf->SetXY(186, 259.5);
$pdf->Write(0, "X");

//update
$pdf->SetXY(199.7, 259.5);
$pdf->Write(0, "X");


//////////////////// END Reserved Access ////////////////




// Output the new PDF
$pdf->Output();
?>