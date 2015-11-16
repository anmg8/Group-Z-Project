<!DOCTYPE html>
<html>
<head>
    <title>Create/Edit Account</title>
    <style>
    #header
    {
        color: black;
        text-align:center;
        font-size:60px;
        background-color:black;
    }
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
     #footer
        {
            color: black;
            text-align: center;
            font-size:15px;
            background-color:black;
        }
    hr {
       display: block;
       height:5px;
       border-top: 5px solid gold;
       }
    </style>
</head>
<body>
<div id="header">
<img src="images/MULogo.jpg" alt="logo"/>
<p style="color:gold">MU Security Information Release Request</p>
</div>
<hr>
<fieldset>
    <legend>Enter Account Information</legend>
       <label>FERPA Quiz Score</label> <input type="text" name="ferpa"> </p>
       <p>Academic Organization (Department) <select><option value="department"></option><option value="Animal Science">Animal Science</option><option value="Computer      Science">Computer Science</option><option value="Information Technology">Information Technology</option><option value="Underwater Arts">Underwater Arts</option></select></p>
    <p>Username (Full Legal Name) <input type="text" name="username"></p>
    <p>Pawprint <input type="text" name="pawprint"></p>
    <p>Employee ID <input type="text" name="employeeID"></p>
    <p>Department Title<input type="text" name="department_title"></p>
    <p>Campus Address <input type="text" name="address"></p>
    <p>Phone Number <input type="number" name="phone" max="10"></p>
    <p>Password <input type="text" name="password"></p>
    
    <div id=buttons>
        <button type="submit" value="submit">Submit</button>
        <button type="button" value="cancel">Cancel</button>
    </fieldset>
    </div>
    <hr></p>
    <div id="footer">
    <p style="color:gold">Websited created and managed by Team Z</p>
    </div></p>
    
</body>
</html>
