<?php
   session_start();

   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY

<!DOCTYPE html>

<html>

	<head>

		<!-- Midiate Web Application

		     My Arguments Page

		     Author: Desiree Howell modified by Maryam Ahmed - converted to php by Alicia Wood

		     Date: 2/3/2016

		-->

		
		<title>Midiate</title>


		<link href="midiate_General_Styles.css" rel="stylesheet" />


	</head>

		
	<body>

            <div id="container">

		<header>

			<h1><img src="MidiateLogo.png" alt="Midiate" /></h1>

			<button class="logoff">Log Off</button>

		</header>


		<nav>

		   <ul>

			<li><a href="ask_It.php">Ask it</a></li>

			<li><a href="answer_It.php">Answer it</a></li>

			<li class="active"><a href="my_Arguments.php>My Arguments</a></li>

			<li><a href="my_Profile.php">My Profile</a></li>

		   </ul>

		</nav>


		<h3>This page is under construction.</h3>
	

               <div id="footer">

	       <footer>

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