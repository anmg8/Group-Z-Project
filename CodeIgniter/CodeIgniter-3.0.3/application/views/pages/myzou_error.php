<?php
	if(isset($_SESSION['myzou_error']))
	{
		echo "<p>Error when trying to submit form: " . $_SESSION['myzou_error'] . ".</p>";
		unset ($_SESSION['myzou_error']);
			
	}
	else {
		echo "<p>No errors.</p>";
	}
	echo "<p><a href='http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou3'>Back to MyZou</a></p>";
	
?>