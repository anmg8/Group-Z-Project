<style>
#field
    {
        text-align:center;
    }
    fieldset 
    {
        width: 700px;
        margin:auto;
        text-align:center;
    }
    legend {
        text-align:center;
        width:200px;
        font-weight:bold;
    }
    input[type="text"]{
        border: 3px solid black;
    }
    select {
        border: 3px solid black;
    }
    input[type=number]{
        border: 3px solid black;
    }
	input[type=password]{
		border: 3px solid black;
	}
    button{
	display:inline-block;
	font-weight:bold;
	border: 3px solid black;
        
		}
    label {
        display: inline-block;
        width:auto;
        text-align: left;
        }
     input {width: 650px;}
     select {width: 650px;}
</style>
<body>
		<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2" method="post">
			<fieldset>
				<legend>Enter Account Information</legend>
				<label>FERPA Quiz Score</label> <input type="text" name="ferpa" required> <br> You can access the <a href="http://myzoutraining.missouri.edu/ferpareq.php">FERPA Quiz here</a>
				<p>Academic Organization <select required><option value="" name="dept">Department</option><option value="Animal Science">Animal Science</option><option value="Computer      Science">Computer Science</option><option value="Information Technology">Information Technology</option><option value="Underwater Arts">Underwater Arts</option></select></p>
				<p>Username (Full Legal Name) <input type="text" name="username" required></p>
				<p>Pawprint <input type="text" name="pawprint" required></p>
				<p>Employee ID <input type="text" name="employeeID" required></p>
				<p>Department Title<input type="text" name="department_title" required></p>
				<p>Campus Address <input type="text" name="address" required></p>
				<p>Phone Number <input type="number" name="phone" maxlength="10" required></p>
				<p>Password <input type="password" name="password" required></p>
						
			<div id=buttons>
					<button type="submit" class="button" name="submit" value="submit">Create</button>
					<button type="submit" class="button" name="cancel" value="cancel">Cancel</button>
				</div>
				
			</fieldset>
		</form>
</body>


	<!--form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2" method="post">
	Faculty PawPrint: <input type="text" name="PawPrint"><br>
	Faculty Password: <input type="text" name="Password"><br>
	<input type="submit" name="submit" value="Register"> 
	</form-->


<?php

	$host = "sql311.byethost7.com";
	$user = "b7_16806033";
	$pass = "GoTeamZ";
	
	$link = mysql_connect($host, $user, $pass);
	
	if (!$link) {
			$_SESSION['error'] =  'Could not connect: ' . mysql_error();
			header('Location: error.php');
	}
	
	if(! mysql_select_db( "b7_16806033_testdb", $link )) {
		$_SESSION['error'] = " Could not switch to database.";
		header('Location: error.php');
	}
	
	
	
	
	
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
	
    //session_start();
    if(isset($_POST['submit'])) {
		if($_POST['submit'] == 'cancel') {
			header('Location: ' . $success);

		}
		else {
			
			/*
			
				<legend>Enter Account Information</legend>
				<label>FERPA Quiz Score</label> <input type="text" name="ferpa"> </p>
				<p>Academic Organization (Department) <select><option value="department"></option><option value="Animal Science">Animal Science</option><option value="Computer      Science">Computer Science</option><option value="Information Technology">Information Technology</option><option value="Underwater Arts">Underwater Arts</option></select></p>
				<p>Username (Full Legal Name) <input type="text" name="username"></p>
				<p>Pawprint <input type="text" name="pawprint"></p>
				<p>Employee ID <input type="text" name="employeeID"></p>
				<p>Department Title<input type="text" name="department_title"></p>
				<p>Campus Address <input type="text" name="address"></p>
				<p>Phone Number <input type="number" name="phone" max="10"></p>
				<p>Password <input type="text" name="password"></p>
			
			*/
			$ferpa 			= $_POST['ferpa'];
			$dept 			= $_POST['dept'];
			$username 		= $_POST['username'];
            $pawprint       = $_POST['pawprint'];
			$empl_id		= $_POST['employeeID'];
			$dept_title		= $_POST['department_title'];
			$address		= $_POST['address'];
			$phone			= $_POST['phone'];
            $password       = $_POST['password'];
            $salt = mt_rand();
			//this line stops the salt from being stored properly in the database. don't use it
            $salt = sha1($salt);
		   
		   
            $pwhash = sha1($password . $salt);
			
			if(	$username == '' ||
				$pawprint == '' ||
				$empl_id == '' ||
				$dept_title == '' ||
				$address == '' ||
				$phone == '' ||
				$password == '') {
					
					$_SESSION['error'] = 'Invalid input';
					header('Location: ' . $error);
			}
			else
			{
			$sql = 'SELECT * FROM person WHERE
				b7_16806033_testdb.person.pawprint ="' . $username . '"';
			$result = mysql_query($sql, $link);
			if(! $result )
			{
				$_SESSION['error'] = 'Could not search db to check for pawprint in use. ' . mysql_error();
				header('Location: ' . $error);
			}
			else {
				if (mysql_num_rows($result) >= 1) {
					$_SESSION['error'] = "\nThat username is already taken.";
					header('Location: ' . $error);
				}
				else {
					//TODO: check values from html form ($pawprint, $pwhash, etc. )
	
					$sql = "INSERT INTO b7_16806033_testdb.person
						(pawprint, pwhash, salt, full_name, campus_address, campus_phone) 
						VALUES ( '" . $pawprint . "','" . $pwhash . "', '" . $salt . "', '" . $username . "', '" . $address . "', '" . $phone . "')";
						
					$result = mysql_query( $sql, $link );
					if(! $result )
					{
						$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
						header('Location: ' . $error);
					}
					else
					{
						//echo "Created new user " . $username .  " successfully.\n " . $salt . ", " . $password;
						$_SESSION['logged_in_user'] = $username;
						//$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
						//header('Location: ' . $error);
						header('Location: ' . $success);
					}
				}
			}
		}
	}
}
		if(!mysql_close($link)) {
			$_SESSION['error'] = "could not close connection to database";
			header('Location: error.php');
		}
		
?>