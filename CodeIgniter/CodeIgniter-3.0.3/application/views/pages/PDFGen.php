<?php
require_once(APPPATH.'libraries/PDFGeneration/FPDF/fpdf.php');
require_once(APPPATH.'libraries/PDFGeneration/FPDI/fpdi.php');

require_once(APPPATH.'libraries/pdfController/form.php');
require_once(APPPATH.'libraries/pdfController/RequestAccess.php');
require_once(APPPATH.'libraries/pdfController/Security.php');
require_once(APPPATH.'libraries/pdfController/AcademicCareer.php');
require_once(APPPATH.'libraries/pdfController/Financials.php');
require_once(APPPATH.'libraries/pdfController/FinancialAid.php');
require_once(APPPATH.'libraries/pdfController/Reserved.php');
require_once(APPPATH.'libraries/pdfController/Admissions.php');


//DEBUG
//var_dump($_SESSION['formData']);

if( !isset($_SESSION ) )
		{
		session_start();
		}	

$formData = unserialize($_SESSION['formData']);


/* $formData = array( 
	"Name" => "Adam Newland",
	"Title" => "Student",
	"Department" => "Computer Science",
	"pawprint" => "anmg8"
); */

// instantiate FPDI
$pdf = new FPDI();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile(APPPATH.'libraries/PDFGeneration/security-request-form.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page 
$pdf->useTemplate($tplIdx);

// now write some text to the imported page
$pdf->SetFont('Helvetica');
$pdf->SetTextColor(0, 0, 0);

$fullName = $formData->getFullName();

//write name field
$pdf->SetXY(55, 53); //coords for Name field
$pdf->Write(0, $fullName);

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

//write additional request check box
if( $formData->getIsAdditional() )
	{
	$pdf->SetXY(13.5, 103.5);
	$pdf->Write(0, "X");
	}
else //write new request check box
	{
	$pdf->SetXY(13.5, 97);
	$pdf->Write(0, "X");
	}

//write student worker check box
if( $formData->getIsStudentWorker() )
	{
	$pdf->SetXY(13.5, 127);
	$pdf->Write(0,"X");
	}

$security = $formData->getSecurity(); //returns an array with one element
$security = $security[0]; //takes the only element of the array ( a Security Object ) and sets it to $security

if( $security->getName() )
	{
	//write current staff check box 
	if( $security->getCurrentStaff() ) 
		{  
		$pdf->SetXY(98.5, 101.5);
		$pdf->Write(0, "X");
		}
	else //write former staff check box
		{
		$pdf->SetXY(156, 101.5);
		$pdf->Write(0, "X");
		}
	}

//write former staff name
if( $security->getName() )
	{
	$pdf->SetXY(136, 109);
	$pdf->Write(0, $security->getName());
	}

//write former staff position
if( $security->getPosition() )
	{
	$pdf->SetXY(136, 117);
	$pdf->Write(0, $security->getPosition());
	}

//write former employee pawprint
if( $security->getPawprint() )
	{
	$pdf->SetXY(136, 125);
	$pdf->Write(0, $security->getPawprint() );
	}

//write former employee emplid
if( $security->getEmpId() )
{
$pdf->SetXY(136, 133);
$pdf->Write(0, $security->getEmpId());
}

//end security ///////////////////////////////

//write FERPA score
$pdf->SetXY(35, 165.5);
$pdf->Write(0, $formData->getFerpaScore());

//write access desc
$pdf->SetXY(7, 192);
$pdf->MultiCell(203, 5, $formData->getAccessDescription(), 0, "L");

////////////Academic Careers checkboxes //////////////

$career = $formData->getAcedemicCareer(); 
$career = $career[0];

//write UGRD checkbox
if( $career->getUGrad() )
	{	
	$pdf->SetXY(24.2, 244.1);
	$pdf->Write(0, "X");
	}

//write GRAD checkbox
if( $career->getGrad() )
	{
	$pdf->SetXY(64.8, 244.1);
	$pdf->Write(0, "X");
	}

//write MED checkbox
if( $career->getMed() )
	{
	$pdf->SetXY(105.5, 244.1);
	$pdf->Write(0, "X");
	}

//write VET MED checkbox
if( $career->getVetMed() )
	{
	$pdf->SetXY(146, 244.1);
	$pdf->Write(0, "X");
	}

//write LAW checkbox
if( $career->getLaw() )
	{
	$pdf->SetXY(186.5, 244.1);
	$pdf->Write(0, "X");
	} 
 
////////////////End academic careers ////////////////////


//add a new page to the document
$pdf->AddPage();

$tplIdx = $pdf->importPage(2); //import the new page into the document
$pdf->useTemplate($tplIdx);

$pdf->SetRightMargin(0.1); //sets right margin of PDF to .1 cm so we can write to the update checkboxes


//////////////////////////////////Student Records Access ////////////

$recordAccess = $formData->getStudentRecordsAccess(); //array of objects

$cashiersAccess = array(); //create arrays to hold objects for printout on page 3
$finAidAccess = array();
$reservedAccess = array();

foreach( $recordAccess as $value) 
{
	$tmp = $value->getRole();

	switch( $tmp ) {

	case "Basic Inquiry":
		//write Basic Inquiry checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 73);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Advanced Inquiry":
		//write Adv. Inq. checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 90);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 90);
		$pdf->Write(0, "X");
		}
		break;

	case "3Cs":
		//write 3Cs checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 103.2);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 103.2);
		$pdf->Write(0, "X");
		}
		break;

	case "Advisor Update":
		//write advisor update checkboxes
		//NO view

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 113);
		$pdf->Write(0, "X");
		}
		break;

	case "Department SOC Update":
		//write Dept. SOC Update checkboxes
		//NO view

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 124);
		$pdf->Write(0, "X");
		}
		break;

	case "Service Indicators (Holds)":
		//write Service Indicators checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 137);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 137);
		$pdf->Write(0, "X");
		}
		break;

	case "Student Group View":
		//write Student group view checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 148.5);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "View Study List":
		//write view study list checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 158.3);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Registrar Enrollment":
		//write Registrar enrollment checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 168.5);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 168.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Advisor Student Center":
		//write Advisor Student center checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 179.5);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Class Permissions":
		//write class Permission checkboxes
		//NO view

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 189.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Class Permissions View":
		//write Class Permission View checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 198.3);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Class Roster":
		//write Class Roster checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 208);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Block Enrollments":
		//write Block Enrollments checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 218.2);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 218.2);
		$pdf->Write(0, "X");
		}
		break;

	case "Report Manager":
		//write Report Manager checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 228.2);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Self Service Advisor":
		//write Self Service Advisor checkboxes
		//NO view

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 242.2);
		$pdf->Write(0, "X");
		}
		break;

	case "Fiscal Officer":
		//write Fiscal Officer checkboxes
		//view
		if( $value->getView() )
		{
		$pdf->SetXY(186, 256.3);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

	case "Academic Advising Profile":
		//write Academic Advising Profile
		//NO view

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 266.2);
		$pdf->Write(0, "X");
		}
		break;
	//////////////////////////////////////////Cashiers Access 
	case "SF General Inquiry":
		array_push($cashiersAccess, $value);
		break;
		
	case "SF Cash Group Post":
		array_push($cashiersAccess, $value);
		break;
		
		//////////////////////////////////// Financial Aid
	case "FA Cash":
		array_push($finAidAccess, $value);
		break;
		
	case "FA Non Financial Aid Staff":
		array_push($finAidAccess, $value);
		break;
		
	//////////////////////////////////////Reserved Access
	case "Immunization view":
		array_push($reservedAccess, $value);
		break;
		
	case "Transfer Credit Admission":
		array_push($reservedAccess, $value);
		break;
		
	case "Relationships":
		array_push($reservedAccess, $value);
		break;
		
	case "Student Groups":
		array_push($reservedAccess, $value);
		break;
	
	case "Accommodate (Student Health)":
		array_push($reservedAccess, $value);
		break;
		
	case "Support Staff (Registrar's Office)":
		array_push($reservedAccess, $value);
		break;
		
	case "Advance Standing Report":
		array_push($reservedAccess, $value);
		break;
		
	} //end switch statement
} //end for loop

////////////////////End Student Records Access /////////////////////


//add final page
$pdf->AddPage();

$tplIdx = $pdf->importPage(3);

$pdf->useTemplate($tplIdx);

$pdf->SetRightMargin(0.1);

//////////////////// Admissions Access (test scores) ///////////////////
										
$admissions = $formData->getAdmissionAccess();

foreach( $admissions as $value )
	{
	$tmp = $value->getTest();
	
	switch( $tmp ) {
		
		case "ALL":
		if( $value->getValue() )
			{
			//write ALL                              
			$pdf->SetXY(143.3, 40.3);
			$pdf->Write(0, "X"); 
			}
		break;
		
		case "ACT":
		if( $value->getValue() )
			{
			//write ACT
			$pdf->SetXY(21.5, 47);
			$pdf->Write(0, "X");
			}
		break;
		
		case "IELTS": 
		if( $value->getValue() )
			{
			//write IELTS
			$pdf->SetXY(21.5, 52.4);
			$pdf->Write(0, "X");
			}
		break;
			
		case "GED": 
		if( $value->getValue() )
			{
			//write GED
			$pdf->SetXY(21.5, 58.3);
			$pdf->Write(0, "X");
			}
		break;
		
		case "SAT":
		if( $value->getValue() )
			{
			//write SAT
			$pdf->SetXY(62, 47);
			$pdf->Write(0, "X");
			}
		break;
		
		case "LSAT":
		if( $value->getValue() )
			{
			//write LSAT
			$pdf->SetXY(62, 52.4);
			$pdf->Write(0, "X");
			}
		break;
		
		case "MILLERS":
		if( $value->getValue() )
			{
			//write MILLERS
			$pdf->SetXY(62, 58.3);
			$pdf->Write(0, "X");
			}
		break;
		
		case "GRE":
		if( $value->getValue() )
			{
			//write GRE
			$pdf->SetXY(102.7, 47);
			$pdf->Write(0, "X");
			}
		break;
		
		case "MCAT":
		if( $value->getValue() )
			{
			//write MCAT
			$pdf->SetXY(102.7, 52.4);
			$pdf->Write(0, "X");
			}
		break;
		
		case "PRAX":
		if( $value->getValue() )
			{
			//write PRAX
			$pdf->SetXY(102.7, 58.3);
			$pdf->Write(0, "X");
			}
		break;
		
		case "GMAT": 
		if( $value->getValue() )
			{
			//write GMAT
			$pdf->SetXY(143.3, 47);
			$pdf->Write(0, "X");
			}
		break;
		
		case "AP": 
		if( $value->getValue() )
			{
			//write AP
			$pdf->SetXY(143.3, 52.4);
			$pdf->Write(0, "X");
			}
		break;
		
		case "PLA-MU":
		if( $value->getValue() )
			{
			//write PLA-MU
			$pdf->SetXY(143.3, 58.3);
			$pdf->Write(0, "X");
			}
		break;
		
		case "TOFEL":
		if( $value->getValue() )
			{
			//write TOFEL
			$pdf->SetXY(184, 47);
			$pdf->Write(0, "X");
			}
		break;
		
		case "CLEP":
		if( $value->getValue() )
			{
			//write CLEP
			$pdf->SetXY(184, 52.4);
			$pdf->Write(0, "X");
			}
		break;
		
		case "BASE":  // not base case :)
		if( $value->getValue() )
			{
			//write BASE
			$pdf->SetXY(184, 58.3);
			$pdf->Write(0, "X");
			}
		break;
		
		}  //end switch
	} //end foreach loop
///////////////////// END Admissions Access //////////////

///////////////////// Cashiers Access ////////////////

//$cashiers = $formData->getStudentFinancials();    stored same as student records access
$cashiers = $cashiersAccess;

foreach( $cashiers as $value )
{
	$tmp = $value->getRole();

	switch( $tmp ) {

		case "SF General Inquiry":
		//write SF General Inquiry 
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(186.7, 93.5);
		$pdf->Write(0, "X");
		}

		//NO update
		break;

		case "SF Cash Group Post":
		//write SF Cash group post
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(186.7, 101);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() ) 
		{
		$pdf->SetXY(200.5, 101);
		$pdf->Write(0, "X");
		}
		break;

	}
}
/////////////////// END Cashiers access //////////////

/////////////////// Financial Aid Access ///////////////

//$finAid = $formData->getStudentFinancialAid();
$finAid = $finAidAccess;

foreach( $finAid as $value )
{
	$tmp = $value->getRole();

	switch( $tmp ) {

	case "FA Cash":
	//write FA Cash
	//view
	if( $value->getView() )
		{
		$pdf->SetXY(186.3, 138);
		$pdf->Write(0, "X");
		}
	break;

	case "FA Non Financial Aid Staff":
	//write FANON Finaid staff
	//view 
	if( $value->getView() )
		{
		$pdf->SetXY(186.3, 145.5);
		$pdf->Write(0, "X");
		}
	break;

	}
}

/////////////////// END Financial Aid Access /////////////////

/////////////////// Reserved Access //////////////////////

//$reserved = $formData->getReservedAccess();
$reserved = $reservedAccess;

foreach( $reserved as $value )
{
	$tmp = $value->getRole();

	switch ( $tmp ) {

	case "Immunization view":
		//write Immunization view
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(84.7, 245.5);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(98.5, 245.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Transfer Credit Admission":
		//write Transfer Credit Admission
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(84.7, 252.5);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(98.5, 252.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Relationships":
		//write Relationships
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(84.7, 259.5);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() ) 
		{
		$pdf->SetXY(98.5, 259.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Student Groups":
		//write Student Groups
		//NO view 

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(98.5, 266.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Accommodate (Student Health)":
		//write Accommodate 
		//NO view 

		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 245.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Support Staff (Registrar's Office)":
		//write Support Staff
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(186, 252.5);
		$pdf->Write(0, "X");
		}
		
		//update
		if( $value->getUpdate() )
		{
		$pdf->SetXY(199.7, 252.5);
		$pdf->Write(0, "X");
		}
		break;

	case "Advance Standing Report":
		//write Advance Standing Report
		//view 
		if( $value->getView() )
		{
		$pdf->SetXY(186, 259.5);
		$pdf->Write(0, "X");
		}

		//update
		if( $value->getUpdate() ) 
		{
		$pdf->SetXY(199.7, 259.5);
		$pdf->Write(0, "X");
		}
		break;

	} //end switch statement
} //end foreach loop

//////////////////// END Reserved Access ////////////////




// Output the new PDF
$pdf->Output();
?>