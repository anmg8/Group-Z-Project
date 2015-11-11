
<div align = "center">

	<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2" method="post">
	Faculty PawPrint: <input type="text" name="PawPrint"><br>
	Faculty Password: <input type="text" name="Password"><br>
	<input type="submit" name="submit" value="Register"> 
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
	
	
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
	if(isset($_POST['submit'])) {
		$username = $_POST['PawPrint'];
		$password = $_POST['Password'];
		if($username == '' || $password == '') {
			$_SESSION['error'] = 'Invalid input';
			header('Location: ' . $error);
		}
		else
		{
		$sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $username . '"';
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
				$sql = "INSERT INTO b7_16806033_testdb.person (pawprint, password) VALUES ( '" . $username . "','" . $password . "')";
				$result = mysql_query( $sql, $link );
				if(! $result )
				{
					$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
					header('Location: ' . $error);
				}
				else
				{
					echo "Created new user " . $username .  " successfully.\n";
					$_SESSION['logged_in_user'] = $username;
					header('Location: ' . $success);
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