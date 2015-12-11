<!DOCTYPE html>
<html>
    <head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<style>
#field
		{
			text-align:center;
                }
        fieldset{
                 width: 500px;
                 margin:auto;
                 text-align:center;
				 padding:20px;
				 border: 3px solid black;
                 }
        legend {
               font-size:20px;
               font-weight:bold;
               }
        label.field{
                 text-align:center;
                 width:200px;
                 font-weight: bold;
                 }
        input[type="text"]{
		    border: 3px solid black;
		}
	input[type="password"]{
		    border: 3px solid black;
		}
        .button{
		    display:inline-block;
		    font-weight:bold;
		    border: 3px solid black;
		}
         fieldset p{
                clear:both;
                padding: 5px;
                }
		#myDiv 
		{
			text-align: center;
			font-size: 20px;
		}
</style>
</head>
<body>
	<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login" method="post">
	<fieldset>    
     <label class="field" for "text">Faculty PawPrint <input type="text" name="PawPrint"/>
        <br></br>
    	<label class="field" for "password">Faculty Password <input type="password" name="Password"/>
        <br></br>
    	<input class = "button" type = "submit" name= "submit" value = "Login" > 	
	    </fieldset>	
    	</form>
    	<div id="myDiv">
    		<p>Don't have an account? Click here <a href="create2"> to create an account</a></p>
    	</div>  
	</form>
</body>
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
	
	
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";

    //if a session exists, redirect to home
    if(isset($_SESSION['logged_in_user'])) {
        header('Location: ' . $success);
    }
	if(isset($_SESSION['error'])) {
		echo "<p>Error: " . $_SESSION['error'] . "</p>";
	}
	if(isset($_POST['submit'])) {
		
		$username = htmlspecialchars($_POST['PawPrint']);
		$password = htmlspecialchars($_POST['Password']);
		//echo $username . " " . $password;
		if($username == '' || $password == '') {
			//$_SESSION['error'] = 'Invalid input';
			header('Location: ' . $error);
			throw_error("Please enter both a username and password.");
		}
		else
		{
        //get salt and hash from DB
        $sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $username . '"';
        $result = mysql_query($sql, $link);
        $line = mysql_fetch_array($result, MYSQL_ASSOC);

        $salt = $line['salt'];
        $db_hash = $line['pwhash'];
            
		if(! $result )
		{
			//$_SESSION['error'] = 'Error searching database.';
			//header('Location: ' . $error);
			throw_error("Error searching database.");
		}
		else {
			if (mysql_num_rows($result) > 1) {
			//	$_SESSION['error'] = "\nFound multiple rows in table persons with pawprint =" . $username;
                header('Location: ' . $error);
				throw_error("Found multiple rows in table persons with pawprint =" . $username);
			}
			else if (mysql_num_rows($result) == 0) {
			//	$_SESSION['error'] = "\nCould not find pawprint in database." . $username;
                header('Location: ' . $error);
				throw_error("Invalid pawprint or password");
			}
			else if (mysql_num_rows($result) == 1){                
                $hash = sha1($password . $salt);
                //check if salt and hash match
				//echo "hash " . $hash . ", salt " . $salt . ", db_hash " . $db_hash . ", result " . $result;
                if($hash == $db_hash) {
                    $_SESSION['logged_in_user'] = $username;
					header('Location: ' . $success);
                }
                else {
                  //  $_SESSION['error'] = 'Password inccorect.';// . "username " . $username_from_database . ", hash " . $hash . ", salt " . $salt . ", db_hash " . $db_hash . ", result " . $result;
				//	header('Location: ' . $error);
                    header('Location: ' . $error);
					throw_error("Invalid username or password.");
                }

			}
		}
		
	}
}
		if(!mysql_close($link)) {
			$_SESSION['error'] = "could not close connection to database";
			//header('Location: error.php');
		}
		
?>