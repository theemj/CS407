<?php
   session_start();

   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY
<!DOCTYPE html>

<html>

	<head>

		<!-- Midiate Web Application

		     Enter Your Argument Page

		     Author: Desiree Howell - modified by Maryam Ahmed & Alicia Wood & converted to php by Alicia Wood (2/20/2016)	
		     Date: 2/3/2016

		-->

		
<title>Midiate</title>


		<link href="midiate_General_Styles.css" rel="stylesheet" />

		<link href="ask_It_Layout.css" rel="stylesheet" />

		<link href="ask_It_Styles.css" rel="stylesheet" />


	</head>


	<body>

            <div id="container">

		<header>

			<h1><img src="MidiateLogo.png" alt="Midiate" /></h1>

			<button class="logoff">Log Off</button>

		</header>


		<nav>

		   <ul>

			<li class="active"><a href="ask_It.php">Ask it</a></li>

			<li><a href="answer_It.php">Answer it</a></li>

			<li><a href="my_Arguments.php">My Arguments</a></li>

			<li><a href="my_Profile.php">My Profile</a></li>

		   </ul>

		</nav>


		<section>

			<form action="addQuestion.php" method="POST">	
			   <fieldset id="question">

				<label for="question">Question:</label>

				<input name="question" id="question"
 
					required="required" />

			   </fieldset>

			   <fieldset id="answers">

				<label for="answer1">Answer 1:</label>

				<input name="answer1" id="answer1" required="required" />


				<label for="answer2">Answer 2:</label>

				<input name="answer2" id="answer2" required="required" />

			   </fieldset>


			   <input type="submit" class="askit" id="askit" value="Ask it" />


			</form>
	
		</section>



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