
    <head>
        <title>MyZou Request</title>
        <!--Using bootstrap-->
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
        <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        
    </head>
	<style>
	#info {
        	position: absolute;
            right: 40%;
            border: 1px solid #d4d4d4;
            padding: 10px;
        }
        .letters{
    		font-weight: bold;
		}
	   display:inline-block;
	   font-weight:bold;
	   border: 3px solid black;
           }	
        input[type="radio"]{
            -webkit-appearance: checkbox;
            -moz-appearance: checkbox;
            }
        .checkbox-grid li {
        display:block;
        float: left;
        width:200px;
        }
		button{
		    display:inline-block;
		    font-weight:bold;
		    border: 3px solid black;
		}
	</style>
        <body>
		<h1>HI</h1>
		<?php
			
			function CreateRow($role, $description, $view, $update)
			{
				$array = array(
					"role" 			=> $role,
					"description" 	=> $description,
					"view" 			=> $view,
					"update" 		=> $update,
					"value" 		=> "none"
				);
				
				return $array;
			}
			/*
			$roles = array(
					"Basic Inquiry",
					"Advanced Inquiry",
					"3Cs",
					"Advisorr Update",
					"Department SOC Update",
					"Service Indicators (Holds)"
					);
					
			$descriptions = array(
				"Do you need access to basic bio demo and student data?",
				"In addition to the above, do you need access to relations with institution citizenship, visa, decedant data, student enrollment, gpa, term history, 3C's, advisors, or student groups?",
				
			
			);
			*/
			$rows = array(
				CreateRow("BasicInquiry", "Do you need access to basic bio demo and student data?", true, false),
				CreateRow("AdvancedInquiry", "In addition to the above, do you need access to relations with institution citizenship, visa, decedant data, student enrollment, gpa, term history, 3C's, advisors, or student groups?", true, true)
				
			);
			$rows_count = count($rows);
			?>
			<form method = "post" action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou2">
			<?php
			for($i = 0; $i < $rows_count; $i++) {
				echo "<p class='letters'>" . $rows[$i]['description'] . "</p>";
				//$name = $rows[$i]['role'];
				$input_type = "checkbox";
				if( $rows[$i]['view'] == true) {
					$name = $rows[$i]['role'] . "view";
					?><input type='checkbox' name='<?php echo $name ?>' value='yes'>View<br><?php
				}
				else {
					$name = $rows[$i]['role'] . "view";
					/*
					?><input type='checkbox' name='<?php echo $name ?>'  value='invalid' disabled><label style='color:#d3d3d3;'>View</label><br><?php
					*/
				}
				if($rows[$i]['update'] == true){
					$name = $rows[$i]['role'] . "update";
					?><input type='checkbox' name='<?php echo $name ?>' value='true'>Update<br><?php
				}
				else {
					$name = $rows[$i]['role'] . "update";
					/*
					?><input type='checkbox' name='<?php echo $name ?>'  value='invalid' disabled><label style='color:#d3d3d3;'>Update</label><br><?php
					*/
				}
				echo"\n\n<br>";
			}
				
				
		?>
			<input name="submit" type="submit" value="submit">
			<!--input class = "button" type = "submit" name= "submit" value = "Reset" --> 
			<a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home">Back Home</a>		
		</form>

		<?php
			
			//var_dump($_POST["$rows[0]['role'] . 'view'"]);
			//TODO: check if user is logged in. Error or redirect to home if not logged in
				
			if(isset($_POST['submit'])) {
				for($i = 0; $i < 1; $i++) {
					//echo $rows[$i]['role'] . "view";
					
					if(isset($_POST[$rows[$i]['role'] . "view"])){
						$rows[$i]['value'] = 
							$_POST[$rows[$i]['role'] . "view"];
					}
					
				}	
				//var_dump($rows);
			}
				














			session_start();

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
			$home = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login";
			$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
			//if a session exists, redirect to home
			if(!isset($_SESSION['logged_in_user'])) {
				//header('Location: ' . $home);
			}
			
			
			
			
			if(!mysql_close($link)) {
				$_SESSION['error'] = "could not close connection to database";
				echo $_SESSION['error'];
				//header('Location: error.php');
			}
		?>
      </body>    
</html>