  <style>
        #field
		{
	        text-align:center;
                }
        fieldset{
				 display: inline;
                 width: 150px;
                 margin:auto;
                 text-align:center;
                 }
        legend {
               font-size:20px;
               font-weight:bold;
               }
        label.field{
                 text-align:center;
                 width:200px;
                 font-weight: bold;
                 }
        input[type="text"]{
		    border: 3px solid black;
		}
	input[type="password"]{
		    border: 3px solid black;
		}
        .button{
		    display:inline-block;
		    font-weight:bold;
		    border: 3px solid black;
		}
        fieldset p{
                clear:both;
                padding: 5px;
                }
		#myDiv 
		{
		text-align: center;
		font-size: 20px;
		}
        h1 {
            position: relative;
            width: 785px;
            float: left;
        }
        #hello {
            width: 100px;
            float: right;
        }
        #linksWrapper {
            width: 140px;
        }
        #link {
            margin: 10px 2px;
        }
		 </style>
	<link rel-"stylesheet" href-""http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

	<div id="hello">
			<!--p>Hello, <a href="account.php">name</a></p-->
		</div>
        <a href="edit">Edit Account</a><br>
		<form id="field" action="home.php" method="POST">
					<fieldset>    
							<legend>Select Application</legend>	
		<div id="linksWrapper">
			<a id="link" href="myzou3">MyZou</a><br>
			<a id="link" href="view_forms2">View Forms</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">Conduct Coordinator</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">MU Connect</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">OrgSync</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">Instructor Course Evaluations (ICE)</a><br>
		</fieldset>
		</div>
		
		
		<?php
        if(!isset($_SESSION['logged_in_user'])) {
				header('Location: http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login');                                       }
			unset($_SESSION['error']);
			unset($_SESSION['access_key']);
		?>
