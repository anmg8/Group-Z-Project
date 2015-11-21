<?php
	
	
	if(isset($_SESSION['logged_in_user'])) {
      echo"Logged out of " . $_SESSION['logged_in_user'] . ".";
	  unset($_SESSION['error']);
	  echo"<a href='http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home'>Back to home</a>";
	  session_destroy();
    }
	else 
	{
		echo"Error: No user is currently signed in.";
	}
	
	
		
?>