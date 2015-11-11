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

*/
	require 'form.php';
	require 'RequestAccess.php';
	require 'Security.php';
	require 'AcademicCareer.php';
	require 'Financials.php';
	require 'FinancialAid.php';
	require 'Reserved.php';
	
	$conn = mysql_connect('localhost', 'root', 'root') or die('Could not connect: ' . mysql_error());
	$pawprint = "acbgf8";
	
	
	
	if (!$conn) {
    	die('Could not connect: ' . mysql_error()); 
	}
	
	mysql_select_db("test_db");
	$form = new form();
	$result = mysql_query("SELECT * FROM person WHERE pawprint = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$fullName = $row["full_name"];
		$pawprint = $row["pawprint"];
		$address = $row["campus_address"];
		$phone = $row["campus_phone"];
	}
	
	$form->setEmpId($pawprint);
	$form->setFullName($fullName);
	$form->setPawprint($pawprint);
	$form->setAddress($address);
	$form->setPhone($phone);
	
	
	$result = mysql_query("SELECT * FROM form WHERE faculty_pawprint_id = '$pawprint'") or die('Could not query: ' . mysql_error());
	
	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		
		$formId = $row["form_id"];
		$description = $row["description"];
		
	}
	$form->setFormId($formId);
	$form->setAccessDescription($description);
	
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

	$result = mysql_query("SELECT * FROM security WHERE pawprint = '$pawprint'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$currentStaff = $row["current_staff"];
		$formerStaff = $row["former_staff"];
		$name = $row["name"];
		$position = $row["position"];
		$pawprint = $row["pawprint"];
		$empId = $row["emp_id"];
		
		$form->setSecurity($currentStaff, $formerStaff, $name, $position, $pawprint, $empId);
	}
	
	$result = mysql_query("SELECT * FROM academic_careers WHERE faculty_pawprint_id = '$pawprint'") or die('Could not query: ' . mysql_error());

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$uGrad = $row["u_grad"];
		$grad = $row["grad"];
		$med = $row["med"];
		$vetMed = $row["vet_med"];
		$law = $row["law"];
		
		$form->setAcedemicCareer($uGrad, $grad, $med, $vetMed, $law);
	}
	
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
	

	
	var_dump($form);

	mysql_close($conn);
?>
