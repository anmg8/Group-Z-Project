
<div align = "center">

	<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login" method="post">
	Faculty PawPrint: <input type="text" name="PawPrint"><br>
	Faculty Password: <input type="text" name="Password"><br>
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

	
	if(isset($_POST['submit'])) {
		
		$username = $_POST['PawPrint'];
		$password = $_POST['Password'];
		echo $username . " " . $password;
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
			$_SESSION['error'] = 'Could not search db to check for pawprint in use ';
			header('Location: ' . $error);
		}
		else {
			if (mysql_num_rows($result) > 1) {
				$_SESSION['error'] = "\nFound multiple rows in table persons with pawprint =" . $username;
				header('Location: ' . $error);
			}
			else {
				
				$sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $username . '" AND b7_16806033_testdb.person.password ="' . $password . '"';
				
				$result = mysql_query( $sql, $link );
				
				echo $result;
				if(! $result )
				{
					$_SESSION['error'] = 'Could not enter data: ';
					header('Location: ' . $error);
					
				}
				else if(mysql_num_rows($result) == 0)
				{
					$_SESSION['error'] = 'Username/password combination not found in database.';
					header('Location: ' . $error);
				}
				else
				{
					$_SESSION['logged_in_user'] = $username;
					header('Location: ' . $success);
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