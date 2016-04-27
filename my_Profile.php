<?php
   //Alicia Wood converted to php on 3/21/2016
   //edited by Maryam Ahmed
   session_start();

   $userID = $_SESSION['meadUserId'];
   $email = $_SESSION['email'];
   
   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY

<!DOCTYPE>
<html>
	<head>
		<!-- Midiate Web Application
		     My Profile Page
		     Author: Desiree Howell
		     Date: 2/3/2016
		-->
		
		<title>Midiate</title>

		<link href="midiate_General_Styles.css" rel="stylesheet" />				<!-- stylesheets -->
		<link href="my_Profile_Styles.css" rel="stylesheet" />
		<link href="my_Profile_Layout.css" rel="stylesheet" />

	</head>
		
	<body>
	  <div id="container">
		<header>
			<h1><a href=home.php><img src="MidiateLogo.png" alt="Midiate" /></a></h1>

			<form action="log_out.php">					<!-- Alicia; log out button to php file -->
				<input type="submit" class="logoff" value="Log Off">
			</form>
		</header>

		<nav>																<!-- navigation; horizontal -->
		   <ul>
			<li><a href="ask_It.php">Ask it</a></li>
			<li><a href="answer_It.php">Answer it</a></li>
			<li><a href="my_Arguments.php">My Arguments</a></li>
			<li class="active"><a href="my_Profile.php">My Profile</a></li>
		   </ul>
		</nav>	

		<section>															<!-- main bit on website -->
		   <ul>
		   	<li>Username: Example</li>
			<li>Email: Example@something.com</li>
			<li>Active arguments: 2</li>
			<li>Decided arguments: 15</li>
		   </ul>
		
		   <p id="change_Email"><a href="change_Email.html">Change Email</a></p>
		   <p id="change_Pass"><a href="change_Password.html">Change Password</a></p>
		</section>
		
		<div id="footer">
		  <footer>								<!-- Maryam; footer of webpage -->
			<p>
				&copy;2016 Midiate &nbsp;&bull;&nbsp;
				Property of Meredith College CS407 &nbsp;&bull;&nbsp;
				All Rights Reserved
			</p>
		  </footer>
		</div>
		
      </div>
	</body>

</html>

BLOCKBODY;

   }
   else						//if not signed in, then go straight to log-in page
      header("Location: midiate_signin.html");

?>