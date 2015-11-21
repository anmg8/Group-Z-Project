<html>
<style>
<head>
        hr {
           display: block;
           height:5px;
           border-top: 5px solid gold;
           }
       	</style>
    </head>
    <body>
		<hr>
		<h1><?php echo $title; ?></h1>
		<?php
		
		
			session_start();
			
			if(isset($_SESSION['error']))
			{
				echo "<p id='error'>Error: " . $_SESSION['error'] . "</p>";
				unset($_SESSION['error']);
			}			
		
		?>
		</body>