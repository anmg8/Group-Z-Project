<html>


	<head>
        <title>Mizzou Form WebApp</title>
		<style>
		
		#error {
			border: 5px solid red;
			padding: 10px;
		}
		
		</style>
    </head>
    <body>
		<h1>Welcome! This is a header.</h1>
		<h1><?php echo $title; ?></h1>
		<?php
		
		
			session_start();
			
			if(isset($_SESSION['error']))
			{
				echo "<p id='error'>Error: " . $_SESSION['error'] . "</p>";
				unset($_SESSION['error']);
			}			
		
		?>