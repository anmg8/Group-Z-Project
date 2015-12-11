<!DOCTYPE html>
<html>
    <head>
        <title>MyZou Request</title>
        <!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!--Using bootstrap--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
	<style>
	#footer
        {
            color: black;
            text-align: center;
            font-size:15px;
            background-color:black;
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
	</style>
        <body>
            <div class="container">
            <h1><center>myZou Security Request Form</center></h1>            
            <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#tabs-1">Student Records Access</a></li>
            <li><a data-toggle="tab" href="#tabs-2">Admissions Access</a></li>
            <li><a data-toggle="tab" href="#tabs-3">Student Financials Access</a></li>
            <li><a data-toggle="tab" href="#tabs-4">Student Financial Aid Access</a></li>
            <li><a data-toggle="tab" href="#tabs-5">Reserved Access</a></li>
            </ul>
            <div class="tab-content">
            <div id="tabs-1" class="tab-pane fade in active">
            <h1><center>Mark whether you are requesting 'view' or 'update' access for all relevant records.</center></h1>
            <form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/myzou" method="post">     
                <p><strong>Basic Inquiry: </strong>Do you need access to basic bio demo and student data: names, address, FERPA directory data,photos, term info, degree    information, programs, honors and awards, service indicators (holds) and previous schools?</p>
                <input type="radio" name="bio" value="view">View
                <input type="radio" name="bio"  value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Advanced Inquiry: </strong>In addition to the above, do you need access to relations with institution citizenship, visa, decedant data, student enrollment, gpa, term history, 3C's, advisors, or student groups?</p>
                <input type="radio" name="relations" value="view">View
                <input type="radio" name="relations" value="update">Update
            <br><br>
                <p><strong>3Cs: </strong>Checklists, Comments, Communications</p>
                <input type="radio" name="add" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="add" value="update">Update
            <br><br>
            <p><strong>Advisor Update: </strong>Do you need to add an advisor to a students record?</p>
                <input type="radio" name="add" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="add" value="update">Update
            <br><br>
                <p><strong>Department SOC Update: </strong>Do you need to schedule courses, assign faculty to a course, or generate permission numbers?</p>
                <input type="radio" name="schedule" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="schedule" value="update">Update
            <br><br>
                <p><strong>Serivce Indicators (Holds): </strong>Do you need to assign or remove service indicators from a student's record?</p>
                <input type="radio" name="service" value="view">View
                <input type="radio" name="service" value="update">Update
            <br><br>
                <p><strong>Student Group View: </strong>Do you need to view groups that a student is associated with?</p>
                <input type="radio" name="associated" value="view">View
                <input type="radio" name="associated" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>View Study List: </strong>Do you need to view a student's class schedule?</p>
                <input type="radio" name="class" value="view">View
                <input type="radio" name="class" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Registrar Enrollment: </strong>Do you need to add or drop a course utilizing Enrollment Request?</p>
                <input type="radio" name="enrollment" value="view">View
                <input type="radio" name="enrollment" value="update">Update
            <br><br>
                <p><strong>Advisor Stduent Center: </strong>Do you need access to students study list, advisor, program/plan, demographic data, or e-mail address?</p>
                <input type="radio" name="demographic" value="view">View
                <input type="radio" name="demographic" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Class Permission: </strong>Do you need to create general or student specific permission numbers?</p>
                <input type="radio" name="permission" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="permission" value="update">Update
            <br><br>
                <p><strong>Class Permission View: </strong>Do you need to view class permission numbers which have been created for a course?</p>
                <input type="radio" name="numbers" value="view">View
                <input type="radio" name="numbers" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Class Roster: </strong>Do you need to view students enrolled, dropped or withdrawn in a course?</p>
                <input type="radio" name="course" value="view">View
                <input type="radio" name="course" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Block Enrollments: </strong>Do you need to add or drop a course utilizing Enrollment Request?</p>
                <input type="radio" name="enrollment" value="view">View
                <input type="radio" name="enrollment" value="update">Update
                <br><br>
                <p><strong>Report Manager: </strong>Do you need to assist in running various reports?</p>
                <input type="radio" name="report" value="view">View
                <input type="radio" name="report" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Self Service Advisor: </strong>Do you need to view advisee photo, addresses, service indicators, emergency contacts, telephone numbers, grades, class schedule, enrollment appointment, print academic advising profile?</p>
                <input type="radio" name="edit" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="edit" value="update">Update
            <br><br>
                <p><strong>Fiscal Officer: </strong> Do you need to view enrollment summary, term statistics, and UM term staistics?</p>
                <input type="radio" name="stats" value="view">View
                <input type="radio" name="stats" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>Academic Advising Profile: </strong>Do you need to allow printing of the Academic Advising Profile?</p>
                <input type="radio" name="profile" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="profile" value="update">Update
            <br><br>
            <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
            </div>
	    <div id="tabs-2" class="tab-pane fade">	
                <h1><center>Do you need to access test scores? If so, select all scores you wish to access.</center></h1>
                <ul class="checkbox-grid">
                <li><input type="checkbox" name="test" value="act"><label for="test">ACT</label></li>
                <li><input type="checkbox" name="test" value="lsat"><label for "test">LSAT</label></li>
                <li><input type="checkbox" name="test" value="prax"><label for "test">PRAX</label></li>
                <li><input type="checkbox" name="test" value="tofel"><label for"test">TOFEL</label></li>
                <li><input type="checkbox" name="test" value="ielts"><label for "test">IELTS</label></li>
                <li><input type="checkbox" name="test" value="millers"><label for "test">MILLERS</label></li>
                <li><input type="checkbox" name="test" value="gmax"><label for "test">GMAX</label></li>
                <li><input type="checkbox" name="test" value="clep"><label for "test">CLEP</label></li>
                <li><input type="checkbox" name="test" value="ged"><label for "test">GED</label></li>
                <li><input type="checkbox" name="test" value="gre"><label for "test">GRE</label></li>
                <li><input type="checkbox" name="test" value="ap"><label for "test">AP</label></li>
                <li><input type="checkbox" name="test" value="base"><label for "test">BASE</label></li>
                <li><input type="checkbox" name="test" value="sat"><label for "test">SAT</label></li>
                <li><input type="checkbox" name="test" value="mcat"><label for "test">MCAT</label></li>
                <li><input type="checkbox" name="test" value="plamu"><label for "test">PLA-MU</label></li>
                <li><input type="checkbox" name="test" value="all"><label for "test">Access all test scores</label></li><br>
                </ul>
                <br><br><br><br><br>
                <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
                </div>
		<div id="tabs-3" class="tab-pane fade">
                <h1><center>Mark whether you are requesting 'view' or 'update' access for all relevant records.</center></h1>		
		<p><strong>SF General Inquiry: </strong>Do you need student financials access for staff outside of the cashier's office?</p>
                <input type="radio" name="financials" value="view">View
                <input type="radio" name="financials" value="update" disabled><label style="color:#d3d3d3;">Update</label>
            <br><br>
                <p><strong>SF Cash Group Post: </strong>Also know as "Cost Centers" (for areas that want to apply charges).</p>
                <input type="radio" name="cost" value="view">View
                <input type="radio" name="cost" value="update">Update
            <br><br>
            <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
            </div>
            <div id="tabs-4" class="tab-pane fade">
		<h1><center>Mark whether you are requesting 'view' or 'update' access for all relevant records.</center></h1>
                <p><strong>FA Cash: </strong>Do you need to access a student's financial aid or budgets?</p>
                <input type="radio" name="aid" value="view">View
                <input type="radio" name="aid" value="update" disabled><label style="color:#d3d3d3;">Update</label>
			<br><br>
		<p><strong>FA Non Financial Aid Staff: </strong>Also known as "Cost Centers" (for areas that want to apply charges)</p>
                <input type="radio" name="cost" value="view">View
                <input type="radio" name="cost" value="update">Update
            <br><br>
            <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
            </div>
            <div id="tabs-5" class="tab-pane fade">
		<h1><center>Mark whether you are requesting 'view' or 'update' access for all relevant records.</center></h1>
                <p><strong>Immunization view: </strong>Do you need access to immunizations information?</p>
                <input type="radio" name="immunizations" value="view">View
                <input type="radio" name="immunizations" value="update">Update
            <br><br>
                <p><strong>Transfer Credi Admission: </strong>Do you need access to transfer credit admission?</p>
                <input type="radio" name="transfer" value="view">View
                <input type="radio" name="transfer" value="update">Update
            <br><br>
                <p><strong>Relationships: </strong>Do you need access to relationships?</p>
                <input type="radio" name="relationships" value="view">View
                <input type="radio" name="relationships" value="update">Update
            <br><br>
                <p><strong>Student Groups: </strong>Do you need access to student groups?</p>
                <input type="radio" name="groups" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="groups" value="update">Update
            <br><br>
                <p><strong>Accommodate (Student Health): </strong>Do you need access to student health?</p>
                <input type="radio" name="health" value="view" disabled><label style="color:#d3d3d3;">View</label>
                <input type="radio" name="health" value="update">Update
            <br><br>
                <p><strong>Support Staff (Registrar's Office): </strong>Do you need access to support staff (Registrar's Office)?</p>
                <input type="radio" name="support" value="view">View
                <input type="radio" name="support" value="update">Update
            <br><br>
                <p><strong>Advance Standing Report: </strong>Do you need access to advanced standing report?</p>
                <input type="radio" name="standing" value="view">View
                <input type="radio" name="standing" value="update">Update
            <br><br>
                <button type="submit" value="continue">Continue</button>
                <button type="reset" value="reset">Reset</button>
                <button type="button" value="cancel">Cancel</button>
            </div>
</div>
</div>
            </form>
            </body>
</html>
            
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
            $InputInfo = "INSERT INTO forms(bio,add,schedule,service,associated,class,enrollment,demographic,permission,numbers,course,report,edit,stats,profile,test,financials,cost,aid,immunizations,transfer,relationships,groups,health,support,standing) VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11,$12,$13,$14,$15,$16,$17,$18,$19,$20,$21,$22,$23,$24,$25,$26)";
			$result = pg_prepare($link, "forms", $InputInfo);
			
			$result = pg_execute($link, "forms", $InputInfo);
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