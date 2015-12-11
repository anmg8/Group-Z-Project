<!DOCTYPE html>
<html>
    <head>
        <title>MyZou Request</title>
        <!--Using bootstrap-->
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
        <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!--Using bootstrap--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
	<style>
	#info {
        	position: absolute;
            right: 40%;
            border: 1px solid #d4d4d4;
            padding: 10px;
        }
        .letters{
    		font-weight: bold;
			margin: 15px;
		}
		
	   display:inline-block;
	   font-weight:bold;
	   border: 3px solid black;
           }	
        input[type="radio"]{
            -webkit-appearance: checkbox;
            -moz-appearance: checkbox;
            }
        .checkbox-grid li {
        display:block;
        float: left;
        width:200px;
		margin: 15px;
        }
		
		button{
		    display:inline-block;
		    font-weight:bold;
		    border: 3px solid black;
		}
	</style>
        <body>
			
			<?php
				//already started in welcome
				//session_start();

				$host = "sql311.byethost7.com";
				$user = "b7_16806033";
				$pass = "GoTeamZ";
				$link = mysql_connect($host, $user, $pass);
				if (!$link) {
						$_SESSION['error'] =  'Could not connect: ' . mysql_error();
						//header('Location: error.php');
				}
				if(! mysql_select_db( "b7_16806033_testdb", $link )) {
					$_SESSION['error'] = " Could not switch to database.";
					//header('Location: error.php');
				}
				$home = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login";
				$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
			
			
			?>

			
			<?php
			
				//load up autocomplete data
				$auto_username = $auto_title = $auto_organization = $auto_pawprint = $auto_emplid = $auto_address = $auto_phone = "";
				
				
                if(!isset($_SESSION['logged_in_user'])) {
				    header('Location: http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login');                                           }
				
				else {
					
					$sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $_SESSION['logged_in_user'] . '"';
					$result = mysql_query($sql, $link);
					$line = mysql_fetch_array($result, MYSQL_ASSOC);

					$auto_pawprint 			= $line['pawprint'];
					$auto_emplid			= $line['empl_id'];
					$auto_title				= $line['department_title'];
					$auto_organization		= $line['academic_organization'];
					$auto_username 			= $line['full_name'];
					$auto_address 			= $line['campus_address'];
					$auto_phone 			= $line['campus_phone'];
					
				}
			
				
			?>
            
            <form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou3" method="post">  

			<h2>Applicant Information</h2>
			Username:<input type="text" name="username" value="<?php echo ($auto_username) ?>"><br><br>
			Title:<input type="text" name="title" value="<?php echo ($auto_title) ?>"><br><br>
			Academic Organization (Department):<input type="text" name="organization" value="<?php echo ($auto_organization) ?>"><br><br>
			PawPrint/SSO:<input type="text" name="pawprint" value="<?php echo ($auto_pawprint) ?>"><br><br>
			EmplID:<input type="text" name="emplid" value="<?php echo ($auto_emplid) ?>"><br><br>
			Campus Address:<input type="text" name="campusaddress" value="<?php echo ($auto_address) ?>"><br><br>
			Phone Number :<input type="text" placeholder="eg. 1234567890" name="phonenumber" value="<?php echo ($auto_phone) ?>"><br><br>
			
			<h2>Request Information</h2>
			New Request <input type="radio" name="new_or_additional_request" value="new" checked="checked" ><br><br>
			Additional Request <input type="radio" name="new_or_additional_request" value="additional"><br><br>
			Check if Student Worker:<input type="checkbox" name="studentworker" value="true"><br><br>
			
			<h2>Copy security of Current/Former Staff Member</h2>
			Current Staff Member:<input type="checkbox" value="current" name="current_or_former_staff_member"><br>
			Former Staff Member:<input type="checkbox" value = "former" name="current_or_former_staff_member"><br>
			Name:<input type="text" name="staffname"><br>
			Position:<input type="text" name="staffposition"><br>
			PawPrint/SSO:<input type="text" name="staffpawprint"><br>
			EmplID (If Avaliable):<input type="text" name="staffemplid"><br>
			
			<h2>Access Description</h2>
			<p>*Please describe the type of access needed (i.e. view student name, address, rosters etc.). Please be specific</p>
			<textarea name="access_description" rows="4" cols="50" placeholder="Description..."></textarea> 

			
			
			<?php
				$myzou_error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error";
				$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_success"; 
				
				
			
			
			?>
			
				<?php
				function CreateRow($role, $name, $description, $view, $update)
				{
					$array = array(
						"role" 				=> $role,			//used for database keys
						"name"				=> $name,			//used for html form elements (needs to be short and contain only letters)
						"description" 		=> $description,	//displayed to the user
						"view" 				=> $view,			//can the user check the view box?
						"update" 			=> $update,			//can the user check the update box?
						"value_view" 		=> "false",			//is the view box checked?
						"value_update" 		=> "false"			//is the update box checked?
					);
					return $array;
				}
				function CreateHeader($num_rows, $text)
				{
					$array = array(
						"num_rows" 				=> $num_rows,			//used for database keys
						"text"					=> $text			//used for html form elements (needs to be short and contain only letters)
					);
					return $array;
				}
				function CreateBoolean($text) {
					$array = array(
						"text"					=> $text,			//displayed to user, also used for html name, and database access
						"value"					=> 0			//is this value checked or not?
					);
					return $array;
				}
				
				
				
				
				$academic_booleans = array(
					CreateBoolean("UGRAD"),
					CreateBoolean("GRAD"),
					CreateBoolean("MED"),
					CreateBoolean("VETMED"),
					CreateBoolean("LAW")
				);
				
				$rows_headers = array(
					CreateHeader(18, "Student Records Access"),
					CreateHeader(2, "Student Financials (Cashiers) Access"),
					CreateHeader(2, "Student Financial Aid Access"),
					CreateHeader(7, "Reserved Access"));
					
				$rows = array(
					CreateRow("Basic Inquiry", 		"bi", "Do you need access to basic bio demo and student data?", true, false),
					CreateRow("Advanced Inquiry", 		"ai", "In addition to the above, do you need access to relations with institution citizenship, visa, decedant data, student enrollment, gpa, term history, 3C's, advisors, or student groups?", true, true),
					CreateRow("3Cs", 						"cs", "Checklists, Comments, Communications", true, true),
					CreateRow("Advisor Update", 		"au", "Do you need to add an advisor to a students record?", false, true),
					CreateRow("Department SOC Update", 	"ds", "Do you need to schedule courses, assign faculty to a course, or generate permission numbers?", false, true),
					CreateRow("Service Indicators (Holds)", "si", "Do you need to assign or remove service indicators from a student's record?", false, true),
					CreateRow("Student Group View", 	"sg", "Do you need to view groups that a student is associated with?", true, false),
					CreateRow("View Study List", 		"sl", "Do you need to view a student's class schedule?", true, false),
					CreateRow("Registar Enrollment", 	"re", "Do you need to add or drop a course utilizing Enrollment Request?", true, true),
					CreateRow("Advisor Student Center", 	"sc", "Do you need access to students study list, advisor, program/plan, demographic data, or e-mail address?", true, true),
					CreateRow("Class Permissions", 		"cp", "Do you need to create general or student specific permission numbers?", false, true),
					CreateRow("Class Permissions View", 	"cv", "Do you need to view class permission numbers which have been created for a course?", true, false),
					CreateRow("Class Roster", 				"cr", "Do you need to view students enrolled, dropped or withdrawn in a course?", true, false),
					CreateRow("Block Enrollments", 		"be", "Adding and dropping a course utilizing Enrollment Request", true, true),
					CreateRow("Report Manager", 		"rm", "Do you need to view a report manager?", true, false),
					CreateRow("Self Service Advisor", 	"ss", "Do you need to edit self service advisor information?", false, true),
					CreateRow("Fiscal Officer", 		"fo", "Do you need to view enrollment summary, term statistics, and UM term staistics?", true, false),
					CreateRow("Academic Advising Profile",	"aa", "Do you need to allow printing of the Academic Advising Profile?", false, true),
					
					CreateRow("SF General Inquiry",		"gi", "For staff outside of the Cashiers Office
", true, false),
					CreateRow("SF Cash Group Post",		"cg", "Also known as 'Cost Centers' (for areas that want to apply charges)
", true, true),
					
					CreateRow("FA Cash", 			"fa", "View a student's financial aid awards and budget
", true, false),
					CreateRow("FA Non Financial Aid Staff",	"as", "Also known as 'Cost Centers' (for areas that want to apply charges)
", true, false),
					CreateRow("Immunization View",				"iv", "", true, true),
					CreateRow("Transfer Credit Admission", 			"tc", "", true, true),
					CreateRow("Relationships", 				"rel", "", true, true),
					CreateRow("Student Groups",		 		"stug", "", false, true),
					CreateRow("Accommodate (Student Health)", 		"acc", "",false,true),
					CreateRow("Support Staff (Registrar's Office)",		 "hi","",true, true),
					CreateRow("Advance Standing Report",			"adv", "", true,true)
				);
				
				$admissions_access = array(
					CreateBoolean("ACT"),
					CreateBoolean("SAT"),
					CreateBoolean("GRE"),
					CreateBoolean("GMAT"),
					CreateBoolean("TOFEL"),
					CreateBoolean("IELTS"),
					CreateBoolean("LSAT"),
					CreateBoolean("MCAT"),
					CreateBoolean("AP"),
					CreateBoolean("CLEP"),
					CreateBoolean("GED"),
					CreateBoolean("MILLERS"),
					CreateBoolean("PRAX"),
					CreateBoolean("PLAMU"),
					CreateBoolean("BASE")
				);
				
				
				
				echo"<p>*Select the Academic Career(s). Please check all that apply.</p>";
				$academic_booleans_count = count($academic_booleans );
				for($i = 0; $i < $academic_booleans_count; $i++) {
					echo"<span><input type='checkbox' name='" . $academic_booleans[$i]["text"] . "' value='1'>" . $academic_booleans[$i]["text"] . "</span>";
				}
				
				
				echo"<h1><center>Mark whether you are requesting 'view' or 'update' access for all relevant records.</center></h1>";
				
				$rows_count = count($rows);
				$headers_count = count($rows_headers);
				
				$next_header = 0;
				$current_header = 0;
				for($i = 0; $i < $rows_count; $i++) {
					if($i >= $next_header)
					{
						echo"<h2>" . $rows_headers[$current_header]["text"] . "</h2>";
						
						$next_header += $rows_headers[$current_header]["num_rows"];
						$current_header += 1;
					}

					echo "<h3>";
					echo $rows[$i]["role"];
					echo "</h3>";
					
					echo "<p class='letters'>";
					echo $rows[$i]["description"];
					echo "</p>";
					
					if( $rows[$i]['view'] == true ) {
						echo"<input type='checkbox' name='" . $rows[$i]["name"] . "v' value='true'>View";
					}
					else {
						echo"<input type='checkbox' disabled><label style='color:#d3d3d3;'>View</label>";
				
					}
					if( $rows[$i]['update'] == true ) {
						echo"<input type='checkbox' name='" . $rows[$i]["name"] . "u' value='true'>Update";
					}
					else {
						echo"<input type='checkbox' disabled><label style='color:#d3d3d3;'>Update</label>";
					}
					//echo"<input type='checkbox' name='" . $rows[$i]["role"] . "-update' value='true'>Update";
				}
				
				
				echo"<h2>Admissions Access</h2>";
				$num_admissions = count($admissions_access );
				for($i = 0; $i < $num_admissions; $i++) {
					echo"<p><input type='checkbox' name='" . $admissions_access[$i]["text"] . "' value='true'>" . $admissions_access[$i]["text"] . "</p>";
				}
				?>
                <button type="submit" value="submit" name = "submit">Continue</button>
            </form>
            
			<?php
				$error = 'http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error';
				//unset($_POST['submit']);
				if(isset($_POST['submit'])){
					
					$sql = "SELECT * FROM form";
					$result = mysql_query( $sql, $link );
						
					if(! $result )
					{
						echo 'Could not enter data: ' . mysql_error();
						header('Location: ' . $error);
					}
					else {
						echo "success " . $sql;
						
					}	
					
					//insert data into form table
					//$form_id = mysql_num_rows($result) + 1;
					
					$approved = 0;
					function post_value($name, $min_len, $max_len) 
					{
						$val = "";
						if(!isset($_POST[$name]) || $_POST[$name] == ""  ){
							//$_SESSION['myzou_error'] = "Please do not forget to fill out " . $name;
							//header('Location: ' . "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error");
							
						}
						else if(strlen($_POST[$name]) > $max_len || strlen($_POST[$name]) < $min_len){
							//$_SESSION['myzou_error'] = "Feild must be between $min_len and $max_len characters: " . $name;
							//header('Location: ' . "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error");
						}
						else {
							$val = $_POST[$name];
						}
						$val = $_POST[$name];
						return $val;
						
					}
					function post_value_bool ($name) {
						if(isset($_POST[$name])) {
							return 1;
						}
						else {
							return 0;
						}
					}
					function post_value_phone($name){
						$val = post_value($name, 1, 10);
						if(strlen($val) != 7 && strlen($val) != 10 && strlen($val) != 11)
						{
							//$_SESSION['myzou_error'] = "Feild must be 7, 10, or 11 numbers " . $name;
							//header('Location: ' . "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error");

							
						}
						else if(!is_numeric ($val)){
							//$_SESSION['myzou_error'] = "Feild must contain only digits " . $name;
							//header('Location: ' . "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou_error");

						}
						else {
							return $val;
						}
					}
					
					function generate_access_key() {
						$digits = 5;
						$string = rand(pow(10, $digits-1), pow(10, $digits)-1);
						return $string;
					}
					$access_description = post_value('access_description', 1, 200);
					$ugrad = post_value_bool('UGRAD');
					$grad = post_value_bool('GRAD');
					$med = post_value_bool('MED');
					$vetmed = post_value_bool('VETMED');
					$law = post_value_bool('LAW');
					
					
					function sql_row($value, $isText) {
						if(!isset($value) || $value == "") {
							//echo"<p>Error: Please fill out all forms.</p>";
							//header('Location: ' . 'http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou3');
						}
						
						$v = "";
						if($isText == true) {
							$v = "'" . $value . "',";
						}
						else {
							$v = $value . ",";
							
						}
						return $v;
					}
					
					$username = post_value("username", 1, 49);
					$title = post_value("title", 1, 49);
					$organization = post_value("organization", 1, 49);
					$pawprint = post_value("pawprint", 3, 10);
					$emplid = post_value("emplid", 1, 49);
					$campusaddress = post_value("campusaddress", 1, 49);
					$phonenumber = post_value_phone("phonenumber");
					
					
					$new_request = post_value_bool("new_or_additional_request");
					$additional_request = post_value_bool("new_or_additional_request");	
					$check_if_student_worker = post_value_bool("studentworker");		
					
					$current_staff_member = post_value_bool("current_or_former_staff_member");
					$former_staff_member = post_value_bool("current_or_former_staff_member");

					$staff_member_name = post_value("staffname", 1, 49);
					$staff_member_position = post_value("staffposition", 1, 49);
					$staff_member_pawprint = post_value("staffpawprint", 1, 10);
					$staff_member_empl_id = post_value("staffemplid", 1, 40); //post_value("staffemplid");
					$form_id = generate_access_key();
					$sql = "INSERT INTO form (
							form_id,
							app_name,
							app_title,
							app_organization,
							app_pawprint,
							app_emplid,
							app_address,
							app_phone,
							new_request,
							additional_request,
							student_worker,
							current_staff_member,
							former_staff_member,
							staff_name,
							staff_position,
							staff_pawprint,
							staff_emplid,
							access_description,
							UGRAD,
							GRAD,
							MED,
							VETMED,
							LAW
							) VALUES (" .
							sql_row($form_id, true) .
							sql_row($username, true) .
							sql_row($title, true) .
							sql_row($organization, true) .
							sql_row($pawprint, true) .
							sql_row($emplid, true) .
							sql_row($campusaddress, true) .
							sql_row($phonenumber, true) .
							sql_row($new_request, FALSE) .
							sql_row($additional_request, FALSE) .
							sql_row($check_if_student_worker, FALSE) .
							sql_row($current_staff_member, FALSE) .
							sql_row($former_staff_member, FALSE) .
							sql_row($staff_member_name, true) .
							sql_row($staff_member_position, true) .
							sql_row($staff_member_pawprint, true) .
							sql_row($staff_member_empl_id, true) .
							sql_row($access_description, true) .
							sql_row($ugrad, FALSE) .
							sql_row($grad, FALSE) .
							sql_row($med, FALSE) .
							sql_row($vetmed, FALSE) .
							"," . $law . ")";
							
							$sql = "INSERT INTO form (
							form_id,
							app_name,
							app_title,
							app_organization,
							app_pawprint,
							app_emplid,
							app_address,
							app_phone,
							new_request,
							additional_request,
							student_worker,
							current_staff_member,
							former_staff_member,
							staff_name,
							staff_position,
							staff_pawprint,
							staff_emplid,
							access_description,
							UGRAD,
							GRAD,
							MED,
							VETMED,
							LAW
							) VALUES (
							'$form_id'," .
							sql_row($username, true) .
							sql_row($title, true) .
							sql_row($organization, true) .
							sql_row($pawprint, true) .
							sql_row($emplid, true) .
							sql_row($campusaddress, true) .
							sql_row($phonenumber, true) .
							sql_row($new_request, FALSE) .
							sql_row($additional_request, FALSE) .
							sql_row($check_if_student_worker, FALSE) .
							sql_row($current_staff_member, FALSE) .
							sql_row($former_staff_member, FALSE) .
							sql_row($staff_member_name, true) .
							sql_row($staff_member_position, true) .
							sql_row($staff_member_pawprint, true) .
							sql_row($staff_member_empl_id, true) .
							sql_row($access_description, true) .
							sql_row($ugrad, FALSE) .
							sql_row($grad, FALSE) .
							sql_row($med, FALSE) .
							sql_row($vetmed, FALSE) .
							 $law . ")";
					$result = mysql_query( $sql, $link );
						
					$errorMessage = "";
						
						
					if(! $result )
					{
						//$errorMessage .= 'Could not enter data: ' . mysql_error();
						throw_error("Could not enter data: $sql " . mysql_error());
						//header('Location: ' . $error);
					}
					else {
						echo "success " . $sql;
						
					}		
					
					
					
					//now time for view_update_elements
					//gather data from html form
					$rows_count = count($rows);
					for($i = 0; $i < $rows_count; $i++) {
						if(isset($_POST[$rows[$i]["name"] . 'v'])) {
							//echo $rows[$i]["name"] . 'v\n';
							$rows[$i]['value_view'] = "true";
						}
						if(isset($_POST[$rows[$i]["name"] . 'u'])) {
							//echo $rows[$i]["name"] . 'u\n';
							$rows[$i]['value_update'] = "true";
						}
					}
					
					//insert form_view_update_elements into database
					$rows_count = count($rows);
					for($i = 0; $i < $rows_count; $i++) {
						
						$view = 0;
						if($rows[$i]['view'] == "true") {
							$view = 1;
						}
						$update = 0;
						if($rows[$i]['update'] == "true") {
							$update = 1;
						}
						$sql = "INSERT INTO form_view_update_elements
							(form_id, role, view_checked, update_checked)
							VALUES (". $form_id .", '".$rows[$i]['role']."', " . $view . ", " . $update . ")";
							echo"hi";
						$result = mysql_query( $sql, $link );
						
						if(! $result )
						{
							$errorMessage .=  'Could not enter data: ' . mysql_error();
							//header('Location: ' . $error);
						}
						else {
							echo "success " . $sql;
							
						}
						
					}
					
					
					
					$admissions_access_count = count($admissions_access);
					for($i = 0; $i < $admissions_access_count; $i++) {
						$value = 0;
						if(isset($_POST[$admissions_access[$i]["text"]])) {
							$value = 1;
						}
						
						$sql = "INSERT INTO admissions
							(form_id, name, value)
							VALUES (". $form_id .", '".$admissions_access[$i]['text']."', " . $value . ")";
							
						$result = mysql_query( $sql, $link );
						
						if(! $result )
						{
							$errorMessage .=  'Could not enter data: ' . mysql_error();
							//header('Location: ' . $error);
						}
						else {
							echo "success " . $sql;
							
						}
						
					}
					
					if(!mysql_close($link)) {
						$_SESSION['error'] = "could not close connection to database";
						$errorMessage .=  $_SESSION['error'];
						//header('Location: error.php');
					}
					$_SESSION['access_key'] = $form_id;
					header('Location: ' . $success);
					
					
				}
				
            ?>
             <!-- Latest compiled and minified JavaScript -->
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      </body>    
</html>
