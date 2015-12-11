<!DOCTYPE html>
<html>
    <head>
        <title>MyZou Request</title>
        <!--Using bootstrap-->
        <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> 
        <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">f
        
    </head>
        <body>
            <h1>Select the appropriate access you are requesting, and whether you wish to view or update this information.</h1>
            
            <form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou" method="post">     
                <p>Do you need access to basic bio demo and student data?</p>
                <input type="radio" name="bio" value="view">View
                <input type="radio" name="bio"  value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>In addition to the above, do you need access to relations with institution citizenship, visa, decedant data, student enrollment, gpa, term history, 3C's, advisors, or student groups?</p>
                <input type="radio" name="relations" value="view">View
                <input type="radio" name="relations" value="update">Update
            <br>
                <p>Do you need to add an advisor to a students record?</p>
                <input type="radio" name="add" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="add" value="update">Update
            <br>
                <p>Do you need to schedule courses, assign faculty to a course, or generate permission numbers?</p>
                <input type="radio" name="schedule" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="schedule" value="update">Update
            <br>
                <p>Do you need to assign or remove service indicators from a student's record?</p>
                <input type="radio" name="service" value="view">View
                <input type="radio" name="service" value="update">Update
            <br>
                <p>Do you need to view groups that a student is associated with?</p>
                <input type="radio" name="associated" value="view">View
                <input type="radio" name="associated" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to view a student's class schedule?</p>
                <input type="radio" name="class" value="view">View
                <input type="radio" name="class" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to add or drop a course utilizing Enrollment Request?</p>
                <input type="radio" name="enrollment" value="view">View
                <input type="radio" name="enrollment" value="update">Update
            <br>
                <p>Do you need access to students study list, advisor, program/plan, demographic data, or e-mail address?</p>
                <input type="radio" name="demographic" value="view">View
                <input type="radio" name="demographic" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to create general or student specific permission numbers?</p>
                <input type="radio" name="permission" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="permission" value="update">Update
            <br>
                <p>Do you need to view class permission numbers which have been created for a course?</p>
                <input type="radio" name="numbers" value="view">View
                <input type="radio" name="numbers" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to view students enrolled, dropped or withdrawn in a course?</p>
                <input type="radio" name="course" value="view">View
                <input type="radio" name="course" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to view a report manager?</p>
                <input type="radio" name="report" value="view">View
                <input type="radio" name="report" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to edit self service advisor information?</p>
                <input type="radio" name="edit" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="edit" value="update">Update
            <br>
                <p>Do you need to view enrollment summary, term statistics, and UM term staistics?</p>
                <input type="radio" name="stats" value="view">View
                <input type="radio" name="stats" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need to allow printing of the Academic Advising Profile?</p>
                <input type="radio" name="profile" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="profile" value="update">Update
            <br>
                <p>Do you need to access test scores? If so, select all scores you wish to access.</p>
                <input type="checkbox" name="test" value="act">ACT
                <input type="checkbox" name="test" value="lsat">LSAT
                <input type="checkbox" name="test" value="prax">PRAX
                <input type="checkbox" name="test" value="tofel">TOFEL
            <br>
                <input type="checkbox" name="test" value="ielts">IELTS
                <input type="checkbox" name="test" value="millers">MILLERS
                <input type="checkbox" name="test" value="gmax">GMAX
                <input type="checkbox" name="test" value="clep">CLEP
            <br>
                <input type="checkbox" name="test" value="ged">GED
                <input type="checkbox" name="test" value="gre">GRE
                <input type="checkbox" name="test" value="ap">AP
                <input type="checkbox" name="test" value="base">BASE
            <br>
                <input type="checkbox" name="test" value="sat">SAT
                <input type="checkbox" name="test" value="mcat">MCAT
                <input type="checkbox" name="test" value="plamu">PLA-MU
            <br>
                <input type="checkbox" name="test" value="all">Access all test scores
            <br>
                <p>Do you need student financials access for staff outside of the cashier's office?</p>
                <input type="radio" name="financials" value="view">View
                <input type="radio" name="financials" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need access to "Cost Centers"?</p>
                <input type="radio" name="cost" value="view">View
                <input type="radio" name="cost" value="update">Update
            <br>  
                <p>Do you need to access a student's financial aid or budgets?</p>
                <input type="radio" name="aid" value="view">View
                <input type="radio" name="aid" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br>
                <p>Do you need access to immunizations information?</p>
                <input type="radio" name="immunizations" value="view">View
                <input type="radio" name="immunizations" value="update">Update
            <br>
                <p>Do you need access to transfer credit admission?</p>
                <input type="radio" name="transfer" value="view">View
                <input type="radio" name="transfer" value="update">Update
            <br>
                <p>Do you need access to relationships?</p>
                <input type="radio" name="relationships" value="view">View
                <input type="radio" name="relationships" value="update">Update
            <br>
                <p>Do you need access to student groups?</p>
                <input type="radio" name="groups" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="groups" value="update">Update
            <br>
                <p>Do you need access to student health?</p>
                <input type="radio" name="health" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="health" value="update">Update
            <br>
                <p>Do you need access to support staff (Registrar's Office)?</p>
                <input type="radio" name="support" value="view">View
                <input type="radio" name="support" value="update">Update
            <br>
                <p>Do you need access to advanced standing report?</p>
                <input type="radio" name="standing" value="view">View
                <input type="radio" name="standing" value="update">Update
            <br>
                <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
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
                 
                    $bio = htmlspecialchars($_POST['bio']);
                    if($bio == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
			}
                    $relations = htmlspecialchars($_POST['relations']);
                    if($relations == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
			}
                    $add = htmlspecialchars($_POST['add']);
                    if($add == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $schedule = htmlspecialchars($_POST['schedule']);
                    if($schedule == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $service = htmlspecialchars($_POST['service']);
                    if($service == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $associated = htmlspecialchars($_POST['associated']);
                    if($associated == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $class = htmlspecialchars($_POST['class']);
                    if($class == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $enrollment = htmlspecialchars($_POST['enrollment']);
                    if($enrollment == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $demographic = htmlspecialchars($_POST['demographic']);
                    if($demographic == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $permission = htmlspecialchars($_POST['permission']);
                    if($permission == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $numbers = htmlspecialchars($_POST['numbers']);
                    if($numbers == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $course = htmlspecialchars($_POST['course']);
                    if($course == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $report = htmlspecialchars($_POST['report']);
                    if($report == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $edit = htmlspecialchars($_POST['edit']);
                    if($edit == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $stats = htmlspecialchars($_POST['stats']);
                    if($stats == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $profile = htmlspecialchars($_POST['profile']);
                    if($profile == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $test = htmlspecialchars($_POST['test']);
                    if($test == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $financials = htmlspecialchars($_POST['financials']);
                    if($financials == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $cost = htmlspecialchars($_POST['cost']);
                    if($cost == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $aid = htmlspecialchars($_POST['aid']);
                    if($aid == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $immunizations = htmlspecialchars($_POST['immunizations']);
                    if($immunizations == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $transfer = htmlspecialchars($_POST['transfer']);
                    if($transfer == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $relationships = htmlspecialchars($_POST['relationships']);
                    if($relationships == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $groups = htmlspecialchars($_POST['groups']);
                    if($groups == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $health = htmlspecialchars($_POST['health']);
                    if($health == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $support = htmlspecialchars($_POST['support']);
                    if($support == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $standing = htmlspecialchars($_POST['standing']);
                    if($standing == '') {
				        echo "<a href='myzou.php'>Return to MyZou.</a><br>";	
				        exit("Error: Field cannot be blank<br>");
            }
                    $RequestInfo = "INSERT INTO forms(bio,add,schedule,service,associated,class,enrollment,demographic,permission,numbers,course,report,edit,stats,profile,test,financials,cost,aid,immunizations,transfer,relationships,groups,health,support,standing) VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20,$21,$22,$23,$24,$25,$26)";
			$result = pg_prepare($link, "forms", $RequestInfo);
			
			$result = pg_execute($link, "forms", $RequestInfo);
			if(!$result)
   			{
   				$_SESSION['error'] = 'Could not enter data: ' . mysql_error();
                header('Location: ' . $error);
   			}
                }
            if(!mysql_close($link)) {
                $_SESSION['error'] = "Could not close connection to database";
                header('Location: error.php');
            }
            
            ?>
             <!-- Latest compiled and minified JavaScript -->
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      </body>    
</html>