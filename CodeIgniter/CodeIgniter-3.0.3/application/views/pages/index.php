<?php
//gather the files that make up the form class
	require_once(APPPATH.'libraries/pdfController/form.php');
	require_once(APPPATH.'libraries/pdfController/RequestAccess.php');
	require_once(APPPATH.'libraries/pdfController/Security.php');
	require_once(APPPATH.'libraries/pdfController/AcademicCareer.php');
	require_once(APPPATH.'libraries/pdfController/Financials.php');
	require_once(APPPATH.'libraries/pdfController/FinancialAid.php');
	require_once(APPPATH.'libraries/pdfController/Reserved.php');
	require_once(APPPATH.'libraries/pdfController/Admissions.php');
	
	//TODO: add separate private file to handle DB connection for more security
	$conn = mysql_connect('sql311.byethost7.com', 'b7_16806033', 'GoTeamZ') or die('Could not connect: ' . mysql_error());
	
	$form_id = $_SESSION['formID'];
	
	if (!$conn) { 
    	die('Could not connect: ' . mysql_error());  
	}
	
	mysql_select_db("b7_16806033_testdb", $conn);
	$form = new form();
	
	//query to get pawprint based on form_id
	$result = mysql_query("SELECT app_pawprint FROM form WHERE form_id = '$form_id'") or die('Could not query: ' . mysql_error());
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	$pawprint = $row['app_pawprint'];
	
	$result = mysql_query("SELECT * FROM person WHERE pawprint = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$fullName = $row["full_name"];
		$pawprint = $row["pawprint"];
		$address = $row["campus_address"];
		$phone = $row["campus_phone"];
		$title = $row["department_title"];
		$empId = $row["empl_id"];
		$ferpa = $row["ferpa_score"];
		$dept = $row["academic_organization"];
	}
	
	$form->setFullName($fullName);
	$form->setPawprint($pawprint);
	$form->setAddress($address);
	$form->setPhone($phone);
	$form->setTitle($title);
	$form->setEmpId($empId);
	$form->setFerpaScore($ferpa);
	$form->setDepartment($dept);
	
	
	$result = mysql_query("SELECT * FROM form WHERE form_id = '$form_id'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		$description = $row["access_description"];
		$stuWorker = $row["student_worker"];
		$UGRAD = $row["UGRAD"];
		$GRAD = $row["GRAD"];
		$MED = $row["MED"];
		$VETMED = $row["VETMED"];
		$LAW = $row["LAW"];
	}
	$form->setFormId($form_id);
	$form->setAccessDescription($description);
	$form->setIsStudentWorker($stuWorker);
	$form->setAcedemicCareer($UGRAD, $GRAD, $MED, $VETMED, $LAW);
	
	
	$result = mysql_query("SELECT * FROM form_view_update_elements WHERE form_id = '$form_id'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		 
		$role = $row["role"];
		$view = $row["view_checked"];
		$update = $row["update_checked"];
		
		$form->setStudentRecordsAccess($role, $view, $update);
	}	

	$result = mysql_query("SELECT * FROM form WHERE form_id = '$form_id'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$currentStaff = $row["current_staff_member"];
		$formerStaff = $row["former_Staff_member"];
		$name = $row["staff_name"];
		$position = $row["staff_position"];
		$pawprint = $row["staff_pawprint"];
		$empId = $row["staff_emplid"];
		
		$form->setSecurity($currentStaff, $formerStaff, $name, $position, $pawprint, $empId);
	}
	
	
	$result = mysql_query("SELECT * FROM admissions WHERE form_id = '$form_id'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$test = $row['name'];
		$checked = $row['value'];
		
		$form->setAdmissionAccess($test, $checked);
	}
	
	
	mysql_close($conn);

	if( !isset($_SESSION ) )
		{
		session_start();
		}	

	$_SESSION['formData'] = serialize($form);

	header('Location: http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/PDFGen');
	
?>