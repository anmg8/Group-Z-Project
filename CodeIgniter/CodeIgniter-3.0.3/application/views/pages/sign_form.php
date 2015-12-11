<?php


	//ask for access key
	//display form if key has been set
		//does user wish to sign?
		//does user wish to print in pdf?
		//delete?
	//otherwise, display nothing else

		
		
		

?>



<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/sign_form" method="post">
	<fieldset>    
     <label class="field" for "text">Please enter your signature:
	 <input type="text" name="signature"/>
	</fieldset>	
	<input class = "button" type = "submit" name= "submit" value = "Submit" > 
</form>

<a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home">Back Home</a>

<?php

	$host = "sql311.byethost7.com";
	$user = "b7_16806033";
	$pass = "GoTeamZ";
	
	$link = mysql_connect($host, $user, $pass);
	
	
	if (!$link) {
		throw_error('Could not connect: ' . mysql_error());
			
	}
	
	else if(! mysql_select_db( "b7_16806033_testdb", $link )) {
		throw_error('Could not switch to database: ' . mysql_error());
	}

	else if(isset($_POST["submit"])) {
		
		if(!isset($_SESSION['access_key'])) {
			throw_error('Please enter an access key <a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/view_forms">here</a> before submitting an electronic signature.');
		}
		else if (!isset($_POST['signature'])) {
			throw_error('Please enter a signature before signing.');
		}
		else if (strlen($_POST['signature']) < 4 || strlen($_POST['signature']) > 20) {
			throw_error('Please enter a signature between 4 and 20 characters.');
		}
		else {
			$_SESSION['signature'] = $_POST['signature'];
			
			/*
			$sql = "SELECT * FROM signatures WHERE username = '$_SESSION['logged_in_user'] AND form_id = $_SESSION['access_key']";
			$result = mysql_query($sql, $link);
			$line = mysql_fetch_array($result, MYSQL_ASSOC);
			if(mysql_num_rows($result) >= 1) {
				throw_error("You already signed this form.");
			}
			*/
			
				
					
			$sql = "
			INSERT INTO signature (form_id, pawprint, sign)
			VALUES ('"
			. $_SESSION['access_key']
			. "','"
			. $_SESSION['logged_in_user']
			. "','"
			. $_POST['signature']
			. "')";
			
			$result = mysql_query($sql, $link);
			
			if(!$result) {
				echo mysql_error();
			}
			
			
			//header('Location: ' . "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/sign_confirm");
		}
	}
	
	
	if(!mysql_close($link)) {
			throw_error("could not close connection to database");
			//header('Location: error.php');
	}
?>