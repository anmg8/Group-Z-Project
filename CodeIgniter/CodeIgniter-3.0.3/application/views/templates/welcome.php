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
					
					
					$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/error";
					
					
					if(isset($_SESSION['logged_in_user']))
					{
						echo"Welcome, " . $_SESSION['logged_in_user'] . ".";
						echo" &#91<a href='http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/logout'>Logout</a>&#93;";
						
					}
					else 
					{
						echo"You are not logged in. ";
						echo" &#91<a href='http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login'>Login</a>&#93;";
						echo" &#91<a href='http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2'>Register</a>&#93;";
					}
				?>