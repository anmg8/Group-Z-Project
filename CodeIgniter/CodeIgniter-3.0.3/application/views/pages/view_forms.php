<?php


	//ask for access key
	//display form if key has been set
		//does user wish to sign?
		//does user wish to print in pdf?
		//delete?
	//otherwise, display nothing else

		
		
		

?>


<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/view_forms" method="post">
	<fieldset>    
     <label class="field" for "text">Please enter an access key to view a form (5 characters):
	 <input type="text" name="access_key"/>
	</fieldset>	
	<input class = "button" type = "submit" name= "submit" value = "Submit" > 
</form>



<?php

	$host = "sql311.byethost7.com";
	$user = "b7_16806033";
	$pass = "GoTeamZ";
	
	$link = mysql_connect($host, $user, $pass);
	
	
	function start_columns(){
		echo"<table border='1' style='width:100% border-collapse: collapse padding: 5px'>";
	}
	function show_column($line, $title, $column) {
		echo"<tr>";
		$string = "";
		if($line[$column] == "")  {
			$string = "No Value";
		}
		else {
			$string = $line[$column];
		}
		echo "<td>" . $title . "</td><td>" . $string . "</td>";
		echo"</tr>";
	}
	function end_columns() {
		echo"</table>";
	}
	function form_buttons() {
		echo '<p><a href="http://teamz/byethost7.com/CodeIgniter/CodeIgniter-3/index.php/view/pages/pdfController/index.php">Generate PDF</a></p> 
			  <p><a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/sign_form">Sign Electronically</a></p>'; //add link to pdf generator when ready
	}
	function show_title($text) {
		echo "<tr><h2>$text</h2></tr>";
	}
	if (!$link) {
		throw_error('Could not connect: ' . mysql_error());
			
	}
	
	else if(! mysql_select_db( "b7_16806033_testdb", $link )) {
		throw_error('Could not switch to database: ' . mysql_error());
	}

	else if(isset($_POST["submit"])) {
		if(!isset($_POST['access_key'])) {
			throw_error("Please set access_key");
		}
		else if(strlen($_POST['access_key'])  != 5) {
			throw_error("Access key must contain 5 characters");
		} 
		else {
			$sql = "SELECT * FROM form WHERE form_id = '" . $_POST['access_key'] . "'";
			$result = mysql_query($sql, $link);
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			$form_id = $line['form_id'];
			
			
			if (mysql_num_rows($result) == 0) {
				throw_error("Access key not found");
			}
			else if (mysql_num_rows($result) > 1) {
				throw_error("Found multiple forms with access key");
			}
			else {
				echo"Found form with access key of <b>" . $_POST['access_key'] . "</b>.";
				$_SESSION['access_key'] = $_POST['access_key'];
				form_buttons();
				
				
				
				start_columns();
				show_title("Form Data");
				show_column($line, "Form ID", "form_id");
				show_column($line, "Applicant Name", "app_name");
				show_column($line, "Applicant Title", "app_title");
				show_column($line, "Applicant Organization", "app_organization");
				end_columns();
				
				//$sql = "SELECT * FROM admissions WHERE form_id = '" . $form_id . "'";
				//$result = mysql_query($sql, $link);
				
				$sql = "SELECT * FROM signature WHERE form_id ='" . $_SESSION['access_key'] . "'";
				$result = mysql_query($sql, $link);
				$line = mysql_fetch_array($result, MYSQL_ASSOC);
				start_columns();
				show_title("Form Signatures");
				if(mysql_num_rows($result) == 0) {
					echo"<tr><td>No Signatures Yet</td></tr>";
				}
				else {
					//while($row = mysqli_fetch_assoc($result)) {
					//	echo "id: " . $row["form_id"]. " - Name: " . $row["pawprint"]. " " . $row["sign"]. "<br>";
					//}
					$pawprint = $line['pawprint'];
					$sign = $line['sign'];
					echo "<tr><th><b>Pawprint</b></th><th><b>Signature</b></th></tr>";
					echo"<tr><td>$pawprint</td>";
					echo"<td>$sign</td></tr>";
				}
				end_columns();

				
				
				
			}
		}
	}
	
	
	if(!mysql_close($link)) {
			throw_error("could not close connection to database");
			//header('Location: error.php');
	}
?>




