  <style>
        #header
        {
            color: black;
            text-align: center;
            font-size:65px;
            background-color:black;
        }
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

	<div id="header"><img src="http://teamz.byethost7.com/images/MULogo.jpg" alt="logo" style="vertical-align:middle"/><p style="color:gold">MU Security Information Release Request System</p></div>
		<hr>
		<div id="hello">
			<p>Hello, <a href="account.php">name</a></p>
		</div>
		<form id="field" action="home.php" method="POST">
					<fieldset>    
							<legend>Select Application</legend>	
		<div id="linksWrapper">
			<a id="link" href="MyZou.html">MyZou</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">Conduct Coordinator</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">MU Connect</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">OrgSync</a><br>
			<a id="link" href="REQUEST_OPTIONS_PAGE">Instructor Course Evaluations (ICE)</a><br>
		</fieldset>
		</div>
		<hr>
		<div id="footer">
			<p style="color:gold">Website created and managed by Team Z</p>
			</div>