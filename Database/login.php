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

        $u = htmlspecialchars($_POST['PawPrint']);
        $p = htmlspecialchars($_POST['Password']);

        if($username == '' || $password == '') {
            $_SESSION['error'] = 'Invalid input';
            header('Location: error.php');
        }
        else
        {
            //Get user data
            $query = 'SELECT * FROM cjc455.person WHERE pawprint = $1';
            $assign = pg_prepare($link, "auth_user", $query);
            $result = pg_execute($link, "auth_user", array($u));

            $line = pg_fetch_array($result, NULL, PGSQL_ASSOC);
            $salt = $line['salt'];
            $dbpass = $line['pwhash'];

            //Save Password
            $usr_pass_hash = sha1($salt . $p);

            if($usr_pass_hash == $dbpass){
                $_SESSION['username'] = $u;

                header("Location: home.php");
            }
            else{
                echo "<span style='color: red;'>Bad username/password combination</span>";
            }
        }
    }
?>
</body>
</html>
