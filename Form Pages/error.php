


<?php

function throw_error($message) {
		$_SESSION['error'] = "<p>Error: " . $message . "</p>";
		//header('Location: http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login');
	}

if(isset($_SESSION['error'])) {
	echo"<p>Error: " . $_SESSION['error'] . ".</p>";
	unset($_SESSION['error']);
}


?>