<?php
require_once('FPDF/fpdf.php');
require_once('FPDI/fpdi.php');

/* TODO:
Request user data from the database
Insert data into PDF at appropriate location.

Need from DB: (lots O' data) (* is required field)
	Name*
	Title*
	Department*
	Pawprint*
	EmpID*
	Address*
	Phone #*
	New/Additional request radio Btn
	studentWorker check box
	copy security
	{
		current staff/ former staff radio Btn
		Name
		Position
		pawprint
		empID
	}
	Ferpa Score*
	access Description*
	academic career Check boxes*
	Student Records Access (view/update check Boxes)
	{
		basic inq (view)
		Advanced inq
		3Cs
		Adv update 
		Dept SOC update 
		Service indicators
		Student group view
		view study list
		registrar enrollment
		advisor student center (view)
		class permission (update)
		class permission view
		class roster (view)
		block enrollments
		report manager (view)
		self service advisor (update)
		fiscal officer (view)
		academic advising profile (update)
	}
	Admissions Access check boxes
	Student Financials access
	{
		SF gen inq (view)
		SF cash group post 
	}
	Student financial Aid access
	{
		FA cash (view)
		FA non finaid staff (view)
	}
	Reserved Access
	{
		immunization view (view/update)
		transfer credit admission
		Relationships 
		Student groups  (update)
		Accommodate (update)
		Support Staff 
		Advance Standing report
	}

*/

$formData = $_POST['formData'];

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
$pdf->Write(0, $formData["Name"]);

//write title field
$pdf->SetXY(55, $pdf->GetY() + 13); //hacky way to set position for printout, maybe not the best way
$pdf->Write(0, $formData["Title"]);

//write department field
$pdf->SetXY(55, $pdf->GetY() + 12);
$pdf->Write(0, $formData["Department"]);

//write pawprint field
$pdf->SetXY(157, 51);
$pdf->Write(0, $formData["pawprint"]);


//write new request check box
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