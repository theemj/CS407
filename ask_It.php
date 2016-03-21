<?php
	//Alicia Wood converted to php on 2/20/2016
   session_start();

   if($_SESSION['loggedIn'] =="yes")
   {
      echo<<<BLOCKBODY

<!DOCTYPE>
<html>
	<head>
	   <!-- Midiate Web Application
		Enter Your Argument Page
		Author: Desiree Howell - modified by Maryam Ahmed & Alicia Wood
		Date: 2/3/2016
	   -->

	   <title>Midiate: Ask It<title>

	   <link href="midiate_General_Styles.css" rel="stylesheet" />				<!-- stylesheets -->
	   <link href="ask_It_Layout.css" rel="stylesheet" />
	   <link href="ask_It_Styles.css" rel="stylesheet" />
	</head>

	<body>										<!-- body of webpage -->
	   <div id="container">								<!-- container section -->
	      <header>
		 <h1><img src="MidiateLogo.png" alt="Midiate" /></h1>

		 <button type="button" class="logoff">Log Off</button>
	      </header>

	      <nav>									<!-- navigation; unordered list -->
		 <ul>
		    <li class="active"><a href="ask_It.php">Ask It</a></li>			<!-- this page -->
		    <li><a href="answer_It.php">Answer It</a></li>
		    <li><a href="my_Arguments.php">My Arguments</a></li>
		    <li><a href="my_Profile.php">My Profile</a></li>
		 </ul>
	      </nav>

	      <section>
		 <form action="addQuestion.php"method="POST">					<!-- form to add a question -->
		    <fieldset id="questionField">							<!-- question -->
		       <label for="question">Question: </label>
		       <input type="text" name="question" id="question" required="required" />
		    </fieldset>

		    <br>

		    <fieldset id="answersField">							<!-- answers -->
		       <label for="answer1">Answer 1: </label>
		       <input type="text" name="answer1" id="answer1" required="required" />

		       <br>

		       <label for="answer2">Answer 2: </label>
		       <input type="text" name="answer2" id="answer2" required="required" />
		    </fieldset>

		    <br>

		    <input type="submit" class="askit" id="askit" value="Ask It" />

		    <br>
	         </form>										<!-- end form -->
	      </section>

	      <div id="footer">									<!-- footer section; Maryam -->
	         <footer>
		    <p>
		       &copy;2016 Midiate &nbsp;&bull;&nbsp;
		       Property of Meredith College CS407 &nbsp;&bull;&nbsp;
		       All Rights Reserved
		    </p>
		 </footer>
	      </div>										<!-- end footer section -->
	   </div>										<!-- end container section -->
	</body>
</html>

    
BLOCKBODY;

   }
   else
      header("Location: midiate_signin.html");

?>