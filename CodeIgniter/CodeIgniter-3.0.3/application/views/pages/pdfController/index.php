<?php
/*
	
	New/Additional request radio Btn
	studentWorker check box
	
	academic career Check boxes* 
	{
		ugrad
		grad
		med
		vet med
		law
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


	require 'pdfController/form.php';
	require 'pdfController/RequestAccess.php';
	require 'pdfController/Security.php';
	require 'pdfController/AcademicCareer.php';
	require 'pdfController/Financials.php';
	require 'pdfController/FinancialAid.php';
	require 'pdfController/Reserved.php';
	
	
	
	$this->load->library('pdfController/form');
	$this->load->library('pdfController/RequestAccess');
	$this->load->library('pdfController/Security');
	$this->load->library('pdfController/AcademicCareer');
	$this->load->library('pdfController/Financials');
	$this->load->library('pdfController/FinancialAid');
	$this->load->library('pdfController/Reserved');
*/	
	require_once(APPPATH.'libraries/pdfController/form.php');
	require_once(APPPATH.'libraries/pdfController/RequestAccess.php');
	require_once(APPPATH.'libraries/pdfController/Security.php');
	require_once(APPPATH.'libraries/pdfController/AcademicCareer.php');
	require_once(APPPATH.'libraries/pdfController/Financials.php');
	require_once(APPPATH.'libraries/pdfController/FinancialAid.php');
	require_once(APPPATH.'libraries/pdfController/Reserved.php');

	
	//TODO: add separate private file to handle DB connection for more security
	$conn = mysql_connect('sql311.byethost7.com', 'b7_16806033', 'GoTeamZ') or die('Could not connect: ' . mysql_error());
	
	$pawprint = "anmg8"; //for testing only. need to remove and replace with data coming from previous PHP pages
	
	//wrong pawprint
	//$pawprint = $_SESSION['logged_in_user'];
	
	if (!$conn) { 
    	die('Could not connect: ' . mysql_error());  
	}
	
	mysql_select_db("b7_16806033_testdb", $conn);
	$form = new form();
	$result = mysql_query("SELECT * FROM person WHERE pawprint = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$fullName = $row["full_name"];
		$pawprint = $row["pawprint"];
		$address = $row["campus_address"];
		$phone = $row["campus_phone"];
		$title = $row["department_title"];
		$empId = $row["empl_id"];
	}
	
	$form->setEmpId($pawprint); //TODO: should be a separate field for EMPID
	$form->setFullName($fullName);
	$form->setPawprint($pawprint);
	$form->setAddress($address);
	$form->setPhone($phone);
	$form->setTitle($title);
	$form->setEmpId($empId);
	
	
	$result = mysql_query("SELECT * FROM form WHERE staff_pawprint = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		$formId = $row["form_id"];
		$description = $row["description"];
		$stuWorker = $row["student_worker"];
		$UGRAD = $row["UGRAD"];
		$GRAD = $row["GRAD"];
		$MED = $row["MED"];
		$VETMED = $row["VETMED"];
		$LAW = $row["LAW"];
		
	}
	$form->setFormId($formId);
	$form->setAccessDescription($description);
	$form->setIsStudentWorker($stuWorker);
	$form->setAcedemicCareer($UGRAD, $GRAD, $MED, $VETMED, $LAW);
	
	$result = mysql_query("SELECT * FROM form_view_update_elements WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		 
		$role = $row["role"];
		$view = $row["view_checked"];
		$update = $row["update_checked"];
		
		$form->setStudentRecordsAccess($role, $view, $update);
	}	
	
	$result = mysql_query("SELECT * FROM department WHERE faculty_pawprint_id = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$title = $row["title"];
		$department = $row["department_name"];
	}
	
	$form->setDepartment($department);
	$form->setTitle($title);
	
	$result = mysql_query("SELECT * FROM ferpa_status WHERE faculty_pawprint_id = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$ferpa = $row["score_percent"];
	}	
	
	$form->setFerpaScore($ferpa);

	$result = mysql_query("SELECT * FROM form WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$currentStaff = $row["current_staff_member"];
		$formerStaff = $row["former_Staff_member"];
		$name = $row["staff_name"];
		$position = $row["staff_position"];
		$pawprint = $row["staff_pawprint"];
		$empId = $row["staff_empid"];
		
		$form->setSecurity($currentStaff, $formerStaff, $name, $position, $pawprint, $empId);
	}
	
	/* $result = mysql_query("SELECT * FROM academic_career WHERE faculty_pawprint_id = '$pawprint'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$uGrad = $row["UGRAD"];
		$grad = $row["GRAD"];
		$med = $row["med"];
		$vetMed = $row["vet_med"];
		$law = $row["law"];
		
		$form->setAcedemicCareer($uGrad, $grad, $med, $vetMed, $law);
	} */
	
	$result = mysql_query("SELECT * FROM admissions WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$test = $row['name'];
		
		
		$form->setAdmissionAccess($test);
	}
	
		$result = mysql_query("SELECT * FROM financials WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$role = $row['role'];
		$view = $row['view_checked'];
		$update = $row['update_checked'];
		
		
		$form->setStudentFinancials($role, $view, $update);
	}
	
	$result = mysql_query("SELECT * FROM financial_aid WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$role = $row['role'];
		$view = $row['view_checked'];
		
		
		$form->setStudentFinancialAid($role, $view);
	}
	
	$result = mysql_query("SELECT * FROM reserved_access WHERE form_id = '$formId'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$role = $row['role'];
		$view = $row['view_checked'];
		$update = $row['update_checked'];
		
		
		$form->setReservedAccess($role, $view, $update);
	}
	mysql_close($conn);

	session_start();
	$_SESSION['formData'] = $form;


	//future idea. look into redirecting URI after class is loaded into Session to avoid having html form and JS

	/*$finalForm = packData($form);

	function packData( $formObj )
	{
		$packedForm = array(
		'formID' => $formObj->getFormId(),
		'fullName' => $formObj->getFullName(),
		'Title' => $formObj->getTitle(),
		'Department' => $formObj->getDepartment(),
		'Pawprint' => $formObj->getPawprint(),
		'EmpID' => $formObj->getEmpId(),
		'Address' => $formObj->getAddress(),
		'Phone' => $formObj->getPhone(),
		'isNew' => $formObj->getIsNew(),
		'isAdd' => $formObj->getIsAdditional(),
		'stuWork' => $formObj->getIsStudentWorker(),
		'ferpa' => $formObj->getFerpaScore(),
		'accDesc' => $formObj->getAccessDescription(),
		'security' => $formObj->getSecurity(),
		'acadCareer' => $formObj->getAcedemicCareer(),
		'stuRecAccess' => $formObj->getStudentRecordsAccess(),
		'stuFin' => $formObj->getStudentFinancials(),
		'stuFinAid' => $formObj->getStudentFinancialAid(),
		'resAccess' => $formObj->getReservedAccess(),
		'adminAccess' => $formObj->getAdmissionAccess()
		);
		return $packedForm;
	}*/
	var_dump ($form);
	
	?>
	
<!-- <form method="post" action="PDFGen" id="subForm">
    <input type="hidden" name="formData" value="<?php $form ?>"/>
    <input type="submit">
	</form> -->
	
<!--	<script type="text/javascript"> //javascript to automatically submit form data to POST
    document.getElementById('subForm').submit(); // SUBMIT FORM
	</script> -->

