<?php
	
	if(!isset($_SESSION['access_key']) || !isset($_SESSION['logged_in_user'])) {
		echo "<p>Please select a form before viewing this page.</p>";
	}
	else {
		echo "Signature successful.";
		unset($_SESSION['access_key']);
	}
		
?>