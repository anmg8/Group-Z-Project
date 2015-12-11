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
    
<?php 
	//session_start();
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
	
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
    
    $auto_dept = $auto_username = $auto_pawprint = $auto_empl_id = $auto_dept_title = $auto_address = $auto_phone = "";
    if(isset($_SESSION['logged_in_user'])) {
        $sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $_SESSION['logged_in_user'] . '"';
        $result = mysql_query($sql, $link);
        $line = mysql_fetch_array($result, MYSQL_ASSOC);
        
        $auto_dept = $line['academic_organization'];
        $auto_username = $line['full_name'];
        $auto_pawprint = $line['pawprint'];
        $auto_empl_id = $line['empl_id'];
        $auto_dept_title = $line['department_title'];
        $auto_address = $line['campus_address'];
        $auto_phone = $line['campus_phone'];  
    
    }
?>
    
		<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2" method="post">
			<fieldset>
				<legend>Enter Account Information</legend>
				<label>FERPA Quiz Score</label> <input type="text" name="ferpa" required> <br> A passing score of 85% on the FERPA Quiz is required before access to student data is approved. You can access the <a href="http://myzoutraining.missouri.edu/ferpa.html">FERPA Quiz here</a>
				<p>Academic Organization <input type="text" name="dept" value="<?php echo ($auto_dept) ?>" required></p>
				<p>Username (Full Legal Name) <input type="text" name="username" value="<?php echo ($auto_username) ?>" required></p>
				<p>Pawprint <input type="text" name="pawprint" value="<?php echo ($auto_pawprint) ?>" required></p>
				<p>Employee ID <input type="text" name="employeeID" value="<?php echo ($auto_empl_id) ?>" required></p>
				<p>Department Title<input type="text" name="department_title" value="<?php echo ($auto_dept_title) ?>" required></p>
				<p>Campus Address <input type="text" name="address" value="<?php echo ($auto_address) ?>" required></p>
				<p>Phone Number <input type="number" name="phone" maxlength="10" value="<?php echo ($auto_phone) ?>" required></p>
				<p>Password <input type="password" name="password" required></p>
						
			<div id=buttons>
					<button type="submit" class="button" name="submit" value="submit">Create</button>
					<!--button type="submit" class="button" name="cancel" value="cancel">Cancel</button-->
					<a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home">Back Home</a>
				</div>
				
			</fieldset>
		</form>
		
		
		
</body>



<?php
    //session_start();
    if(isset($_POST['submit'])) {
		if($_POST['submit'] == 'cancel') {
			header('Location: ' . $success);
			echo"hi";
		}
		else {
			echo"h1";

			
			
			echo $dept;
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
			$salt = (string)$salt;
			//this line stops the salt from being stored properly in the database. don't use it
            $salt = sha1($salt);
		   echo "\n" . $salt;
		   
            $pwhash = sha1($password . $salt);
			
			if(	$ferpa < 85 || $username == '' ||
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
				echo"hi";
				if (mysql_num_rows($result) >= 1) {
					$_SESSION['error'] = "\nThat username is already taken.";
					header('Location: ' . $error);
				}
				else {
					echo"hi";
					//TODO: check values from html form ($pawprint, $pwhash, etc. )
                    }
                        $sql = "INSERT INTO b7_16806033_testdb.person
                            (ferpa_score, pawprint, pwhash, salt, full_name, campus_address, campus_phone, empl_id, department_title, academic_organization) 
                            VALUES ( '" . $ferpa . "','" . $pawprint . "','" . $pwhash . "', '" . $salt . "', '" . $username . "', '" . $address . "', '" . $phone . "', " . $empl_id . ", '" . $dept_title . "', '" . $dept . "')";

                        $result = mysql_query( $sql, $link );
                        if(! $result)
                        {
                            $_SESSION['error'] = 'Could not enter data: ' . mysql_error();
                            header('Location: ' . $error);
                        }
                        else
                        {
                            echo"hi";
                            //echo "Created new user " . $username .  " successfully.\n " . $salt . ", " . $password;
                            $_SESSION['logged_in_user'] = $pawprint;

                            //$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
                            //header('Location: ' . $error);
                            header('Location: ' . $success);
                        }
					
				
			}
		}
	}
}
		if(!mysql_close($link)) {
			$_SESSION['error'] = "could not close connection to database";
			header('Location: ' . $error);
		}
		
?>