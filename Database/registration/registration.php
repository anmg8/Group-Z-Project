<!DOCTYPE html>
<html>
<head>
<meta charset=UTF-8>
<title>CS 3380 Lab 8</title>
</head>
<body>
<!-- Jump out of PHP and create a form to hold the inputs-->
<div align = "center">

	<form action="registration.php" method="post">
	Faculty PawPrint: <input type="text" name="PawPrint"><br>
	Faculty Password: <input type="text" name="Password"><br>
	<input type="submit" name="submit">
	</form>

</div>

<?php

	INCLUDE("../../secure/database.php");

	$link = mysql_connect(HOST, USERNAME, PASSWORD);
	if (!$link) {
			$_SESSION['error'] =  'Could not connect: ' . mysql_error();
			header('Location: error.php');
	}

	if(! mysql_select_db( "cjc455", $link )) {
		$_SESSION['error'] = " Could not switch to database.";
		header('Location: error.php');

	}

	session_start();

	if(isset($_POST['submit'])) {

		$username = $_POST['PawPrint'];
		$password = $_POST['Password'];

		if($username == '' || $password == '') {
			$_SESSION['error'] = 'Invalid input';
			header('Location: error.php');
		}
		else
		{

		$sql = 'SELECT * FROM login WHERE cjc455.login.pawprint ="' . $username . '"';
		$result = mysql_query($sql, $link);

		if(! $result )
		{
			$_SESSION['error'] = 'Could not search db to check for pawprint in use. ' . mysql_error();
			header('Location: error.php');
		}
		else {
			if (mysql_num_rows($result) >= 1) {
				$_SESSION['error'] = "\nThat username is already taken.";
				header('Location: error.php');
			}
			else {
				$sql = "INSERT INTO cjc455.login (pawprint, password) VALUES ( '" . $username . "','" . $password . "')";

				$result = mysql_query( $sql, $link );

				if(! $result )
				{
					$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
					header('Location: error.php');
				}
				else
				{
					echo "Created new user " . $username .  " successfully.\n";
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
</body>
</html>
