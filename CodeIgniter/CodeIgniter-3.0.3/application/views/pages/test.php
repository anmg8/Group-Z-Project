

<?php
// define variables and set to empty values
$password = $username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $password = test_input($_POST["name"]);
   $username = test_input($_POST["email"]);

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>



<body>



<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   Name: <input type="text" name="name">
   <br><br>
   E-mail: <input type="text" name="email">
   <br><br>
   Website: <input type="text" name="website">
   <br><br>
   Comment: <textarea name="comment" rows="5" cols="40"></textarea>
   <br><br>
   Gender:
   <input type="radio" name="gender" value="female">Female
   <input type="radio" name="gender" value="male">Male
   <br><br>
   <input type="submit" name="submit" value="submit">
</form>



	<!--form action="action="<?php /*echo htmlspecialchars($_SERVER["PHP_SELF"]);*/ ?>" method="post">
	<fieldset>    
     <label class="field" for = "text">Faculty PawPrint <input type="text" name="PawPrint"/>
        <br></br>
    	<label class="field" for = "password">Faculty Password <input type="password" name="Password"/>
        <br></br>
    	<input class = "button" type = "submit" name= "submit" value = "submit" > 
        <br></br> 
		<input type="submit" name= "submit" value="submit" method="post">		
	    </fieldset>	
    	</form>
    	<div id="myDiv">
    		<p>Don't have an account? Click here <a href="create2"> to create an account</a></p>
    	</div>  
	</form-->
	

</body>

<?php
echo "<h2>Your Input:</h2>";
echo $password;
echo "<br>";
echo $username;
?>