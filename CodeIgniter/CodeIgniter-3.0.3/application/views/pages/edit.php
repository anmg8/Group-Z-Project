<!--PROBLEM: click button sends to create2 (needs to be edit), update changes to DB -->
<style>
#field
    {
        text-align:center;
    }
    fieldset 
    {
        width: 700px;
        margin:auto;
        text-align:center;
    }
    legend {
        text-align:center;
        width:200px;
        font-weight:bold;
    }
    input[type="text"]{
        border: 3px solid black;
    }
    select {
        border: 3px solid black;
    }
    input[type=number]{
        border: 3px solid black;
    }
	input[type=password]{
		border: 3px solid black;
	}
    button{
	display:inline-block;
	font-weight:bold;
	border: 3px solid black;
        
		}
    label {
        display: inline-block;
        width:auto;
        text-align: left;
        }
     input {width: 650px;}
     select {width: 650px;}
</style>
<body>
    
<?php 
	//session_start();
	$error = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/edit";
	$success = "http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home";
	
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
    
    $auto_dept = $auto_username = $auto_pawprint = $auto_empl_id = $auto_dept_title = $auto_address = $auto_phone = "";
    
    if(!isset($_SESSION['logged_in_user'])) {
        header('Location: http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/login');
    }
    
    //else if a user is logged in, do the following
    else {
        $sql = 'SELECT * FROM person WHERE b7_16806033_testdb.person.pawprint ="' . $_SESSION['logged_in_user'] . '"';
        $result = mysql_query($sql, $link);
        $line = mysql_fetch_array($result, MYSQL_ASSOC);
        
        $auto_dept = $line['academic_organization'];
        $auto_username = $line['full_name'];
        $auto_dept_title = $line['department_title'];
        $auto_address = $line['campus_address'];
        $auto_phone = $line['campus_phone'];
    }
?>
    
		<form action="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/edit" method="post">
			<fieldset>
				<legend>Enter Account Information</legend>
				<p>Academic Organization <input type="text" name="dept" value="<?php echo ($auto_dept) ?>" required></p>
				<p>Username (Full Legal Name) <input type="text" name="username" value="<?php echo ($auto_username) ?>" required></p>
				<p>Department Title<input type="text" name="department_title" value="<?php echo ($auto_dept_title) ?>" required></p>
				<p>Campus Address <input type="text" name="address" value="<?php echo ($auto_address) ?>" required></p>
				<p>Phone Number <input type="number" name="phone" maxlength="10" value="<?php echo ($auto_phone) ?>" required></p>
						
			<div id=buttons>
					<button type="submit" class="button" name="submit" value="submit">Edit</button>
					<!--button type="submit" class="button" name="cancel" value="cancel">Cancel</button-->
					<a href="http://teamz.byethost7.com/CodeIgniter/CodeIgniter-3.0.3/index.php/pages/view/home">Back Home</a>
				</div>
				
			</fieldset>
		</form>
		
		
		
</body>



<?php
    //session_start();
    if(isset($_POST['submit'])) {
        $dept 			= $_POST['dept'];
        $username 		= $_POST['username'];
        $dept_title		= $_POST['department_title'];
        $address		= $_POST['address'];
        $phone			= $_POST['phone'];

        if($username == '' || $dept == '' || $dept_title == '' ||$address == '' || $phone == '') {
                $_SESSION['error'] = 'Invalid input';
                header('Location: ' . $error);
        }
        else {
            $sql = 'UPDATE b7_16806033_testdb.person SET academic_organization = "' . $dept . '", full_name = "' . $username . '", department_title = "' . $dept_title . '", campus_address = "' . $address . '", campus_phone = "' . $phone . '" WHERE b7_16806033_testdb.person.pawprint="' . $_SESSION['logged_in_user'] . '"';

             $result = mysql_query($sql, $link);
             if(! $result ) {
                $_SESSION['error'] = 'Update failed. ' . mysql_error();
                header('Location: ' . $error);
             }

             else {
                header('Location: ' . $success);
             }
        }
    }
		
?>