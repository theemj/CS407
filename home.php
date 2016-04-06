<?php
   //converted to php by ALicia Wood (2/20/2016)
   session_start();

   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY

<!DOCTYPE>
<html>

	<head>

		<!-- Midiate Web Application

		     Home Page

		     Author: Emily Johnson - edited by Desiree Howell & Maryam Ahmed
		     Date: 2/10/2016

		-->

	
		<title>Midiate</title>

		<link href="midiate_General_Styles.css" rel="stylesheet" />

	</head>


	<body>

	  <div id="container">

        <header>

			<h1><img src="MidiateLogo.png" alt="Midiate" /></h1>

			<form action="log_out.php">					<!-- Alicia; log out button to php file -->
				<input type="submit" class="logoff" value="Log Off">
			</form>

		</header>


		<nav>

		   <ul>

			<li><a href="ask_It.php">Ask it</a></li>

			<li><a href="answer_It.php">Answer it</a></li>
	
			<li><a href="my_Arguments.php">My Arguments</a></li>

			<li><a href="my_Profile.php">My Profile</a></li>

		   </ul>

		</nav>


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
   else
      header("Location: midiate_signin.html");

?>