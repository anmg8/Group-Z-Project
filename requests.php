<!DOCTYPE html>
<html>
    <head>
        <title>Request Options</title>
        <!--Using bootstrap-->
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
        <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        
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
        
        </style>
    </head>
        <body>
              <form action="requests.php" method="post">
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
                Name:<input type="text" name="Staff_member_name"><br>
                Position:<input type="text" name="Staff_member_position"><br>
                Pawprint/SSO:<input type="text" name="Staff_member_pawprint"><br>
                Employee ID (if available):<input type="Staff_member_empl_id" name="id">
            </div>
            <div>
                <input type="radio" name="member" value="no"> No<br>
                <input type="radio" name="member" value="current"> Current staff member<br>
                <input type="radio" name="member" value="former"> Former staff member<br>
            <br>
            </div>
            <br>
            <br>
            <br>
            <p class="letters">  Select the academic career(s). Select all that apply.</p>
                <input type="checkbox" name="career" value="undergrad"> Undergrad
                <input type="checkbox" name="career" value="graduate"> Graduate
                <input type="checkbox" name="career" value="medicine"> Medicine<br>
                <input type="checkbox" name="career" value="veterinary"> Veterinary Medicine
                <input type="checkbox" name="career" value="law"> Law
            <br>
            <br>
            <p class="letters">  Please describe the ype of access needed (i.e. view student name, address, rosters, etc.). Please be specific.</p>
                <textarea name="access" rows="6" cols="60"></textarea>  
            <br>
            <br>
            <button type="submit" value="continue"> Continue </button>
            <button type="reset" value="reset"> Reset </button>
            <button type="button" value="cancel"> Cancel </button>
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
	
	
		$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login";
		$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
		
		//Verify data once submitted and insert into database
		if(isset($_POST['submit'])){
			
			$request = htmlspecialchars($_POST['request']);
			if($request == '') {
				echo "<a href='request.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$student = htmlspecialchars($_POST['student']);
			if($student == '') {
				echo "<a href='request.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$member = htmlspecialchars($_POST['member']);
			if($NewRequest == '') {
				echo "<a href='request.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$career = htmlspecialchars($_POST['career']);
			if($career == '') {
				echo "<a href='request.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$access = htmlspecialchars($_POST['access']);
			if($NewRequest == '') {
				echo "<a href='request.php'>Return to request.</a><br>";	
				exit("Error: Field cannot be blank<br>");
			}
			
			$RequestInfo = "INSERT INTO forms(request,student,member,career,access) VALUES ($1,$2,$3,$4,$5)";
			$result = pg_prepare($conn, "forms", $RequestInfo);
			
			$result = pg_execute($conn, "forms", $RequestInfo);
			if(!$result)
   			{
   				echo pg_last_error();
   				exit(1);
   			}
		}		
				
		
		?>      
    
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>      
    </body>    
</html>