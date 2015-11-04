<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        #credentials {
            width: 210px;
            border: 1px solid black;
            padding: 10px;
        }
    </style>
</head>
    <body>
        <p style="font-weight:bold">Enter your login information</p><br>
        <div id= "credentials">
        <form method='POST' action="home.php">
            <label>Pawprint:</label>
            <input type="text" name="pawprint" required>
            <br>
            <br>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
            <button type="submit" value="submit">Login</button> 
        </form>
        <div>
            <p>Don't have an account? Click here to <a href="account.php">Create an Account</a></p>
        </div>
    </body>
</html>