
<div align = "center">

	<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login" method="post">
	Faculty PawPrint: <input type="text" name="PawPrint"><br>
	Faculty Password: <input type="password" name="Password"><br>
	<input type="submit" name="submit" value="Login">
	</form>

</div>


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

	session_start();
    //if a session exists, redirect to home
    if(isset($_SESSION['logged_in_user'])) {
        header('Location: ' . $success);
    }

	if(isset($_POST['submit'])) {
		
		$username = htmlspecialchars($_POST['PawPrint']);
		$password = htmlspecialchars($_POST['Password']);
		echo $username . " " . $password;
		if($username == '' || $password == '') {
			$_SESSION['error'] = 'Invalid input';
			header('Location: ' . $error);
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
			$_SESSION['error'] = 'Could not search db to check for pawprint in use ';
			header('Location: ' . $error);
		}
		else {
			if (mysql_num_rows($result) > 1) {
				$_SESSION['error'] = "\nFound multiple rows in table persons with pawprint =" . $username;
				header('Location: ' . $error);
			}
			else {                
                $hash = sha1($password . $salt);
                //check if salt and hash match
                if($hash == $db_hash) {
                    $_SESSION['logged_in_user'] = $username;
					header('Location: ' . $success);
                }
                else {
                    $_SESSION['error'] = 'Username/password combination not found in database.';
					header('Location: ' . $error);
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