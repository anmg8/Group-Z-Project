<!DOCTYPE html>
<html>
        
        <style>
       	#info {
            position: absolute;
            right: 45%;
            border: 3px solid black;
            padding: 10px;
        }
        .letters{
    		font-weight: bold;
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
        textarea {
        border: 3px solid black;
        }
        button{
        display:inline-block;
	font-weight:bold;
	border: 3px solid black;
	}
	submit{
		    display:inline-block;
		    font-weight:bold;
		    border: 3px solid black;
		}
	reset {
			display: inline-block;
			font-weight:bold;
			border: 3px solid black;
		}
		        </style>
         <body>
              <h1><center>Please specify request information.</center></h1>
			  <form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/requests" method="post">
            <br>
            <p class="letters">  Is this a new request, or are you requesting additional access?</p>
                <input type="radio" name="request" value="new"> New Request
                <input type="radio" name="request" value="additional"> Additional Request
            <br>
            <br>
            <p class="letters">  Are you a student worker?</p>
                <input type="radio" name="student" value="yes"> Yes
                <input type="radio" name="student" value="no"> No
            <br>
            <br>
            <p class="letters">  Do you wish to copy security of a current/former staff member? If so, please provide their information.</p>
                <div id="info" >
                Name <input type="text" name="Staff_member_name"><br><br>
                Position <input type="text" name="Staff_member_position"><br><br>
                Pawprint/SSO <input type="text" name="Staff_member_pawprint"><br><br>
                Employee ID (if available) <input type="Staff_member_empl_id" name="id">
            </div>
            <div>
                <input type="radio" name="member" value="no"> No<br>
                <input type="radio" name="member" value="current"> Current staff member<br>
                <input type="radio" name="member" value="former"> Former staff member<br>
            <br>
            </div>
            <br><br><br><br><br><br>
            <p class="letters">  Select the academic career(s). Select all that apply.</p>
            <ul class="checkbox-grid">
                <li><input type="checkbox" name="career" value="undergrad"><label for="career">Undergrad</label></li>
                <li><input type="checkbox" name="career" value="graduate"><label for="career">Graduate</label></li>
                <li><input type="checkbox" name="career" value="medicine"><label for="career">Medicine</label></li>
                <li><input type="checkbox" name="career" value="veterinary"><label for"career">Veterinary</label></li>
                <li><input type="checkbox" name="career" value="law"><label for "career">Law</label></li>
            </ul>
            <br>    
            <br>
            <p class="letters">  Please describe the type of access needed (i.e. view student name, address, rosters, etc.). Please be specific.</p>
                <textarea name="access" rows="6" cols="60"></textarea>  
            <br>
            <br>
            <input type="submit" name="submit" value="Continue"> 
            <input type="reset" value="Start Over"> 
            <!--<input type="button" value="Cancel"> -->
        </form>
        
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
	
	
	
	
	
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/create2";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
	
    //session_start();
		//if a session exists, redirect to home
        if(isset($_SESSION['logged_in_user'])) {
        header('Location: ' . $success);
        }
		
		//Verify data once submitted and insert into database
		if(isset($_POST['submit']))
		{
			
			$request = htmlspecialchars($_POST['request']);
			if($request == '') 
			{
				echo "<a href='requests.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$student = htmlspecialchars($_POST['student']);
			if($student == '') 
			{
				echo "<a href='requests.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$member = htmlspecialchars($_POST['member']);
			if($member == '') 
			{
				echo "<a href='requests.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$career = htmlspecialchars($_POST['career']);
			if($career == '') 
			{
				echo "<a href='requests.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$access = htmlspecialchars($_POST['access']);
			if($access == '') 
			{
				echo "<a href='requests.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$RequestInfo = "INSERT INTO forms(request,student,member,career,access) VALUES ($1,$2,$3,$4,$5)";
			$result = pg_prepare($link, "forms", $RequestInfo);
			$result = pg_execute($link, "forms", $RequestInfo);
			
			//$result = pg_execute($link, "forms", $RequestInfo);
			if(!$result)
			{
				$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
				header('Location: ' . $error);
			}
		}
		
		if(!mysql_close($link)) {
			$_SESSION['error'] = "could not close connection to database";
			header('Location: error.php');
		}				
		
		?>      
    
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>      
    </body>    
</html>