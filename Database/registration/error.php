<!DOCTYPE html>
<html>
<head>
<meta charset=UTF-8>
<title>CS 3380 Lab 8</title>
</head>
<body>


  <?php

    INCLUDE("../../secure/database.php");

    $link = mysql_connect(HOST, USERNAME, PASSWORD);
    if (!$link) {
        echo "<p>";
        die('Could not connect: ' . mysql_error());
        echo "</p>";
    }

    session_start();

    if(isset($_SESSION['error'])) {
      echo"<p>Error: " . $_SESSION['error'] . ".";
    }



    if(!mysql_close($link)) {
    	$_SESSION['error'] = "could not close connection to database";
    	header('Location: error.php');
    }

   ?>

</body>
</html>
