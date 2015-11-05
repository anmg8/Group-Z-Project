<!DOCTYPE html>
<html>
<head>
  <title>Connection Test</title>


</head>
<body>

	<h1>Test</h1>

  <?php


  //connect to database
  INCLUDE("../secure/database.php");

  $link = mysql_connect(HOST, USERNAME, PASSWORD);
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }
  echo 'Connected successfully';


  mysql_close($link);
  ?>

</body>
</html>
