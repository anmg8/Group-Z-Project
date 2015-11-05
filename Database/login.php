<!DOCTYPE html>
<html>
<head>
<meta charset=UTF-8>
<title>CS 3380 Lab 8</title>
</head>
<body>
<div align = "center">

	<form action="login.php" method="post">
	PawPrint: <input type="text" name="PawPrint"><br>
	Password: <input type="text" name="Password"><br>
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
			if(isset($_POST['submit'])){
				//Get user data
				$username = htmlspecialchars($_POST['PawPrint']);
				pg_prepare($link, "auth_user", "SELECT * FROM cjc455.person WHERE pawprint = $1 AND password = $2");
				$auth_user_result = pg_execute($link, "auth_user", array($username));
				$auth_user_result = pg_fetch_array($auth_user_result, NULL, PGSQL_ASSOC);
				//Save Password
			}
		}
	}
?>