<?php
	//Alicia Wood- converted to php on 2/20/2016
   session_start();

   if($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY

<!DOCTYPE>
<html>
	<head>
	   <!-- Midiate Web Application
	        Answer It Page
		Author: Maryam Ahmed - edited by Desiree Howell & Alicia Wood
		Date: 2/10/2016
	   -->

	   <title>Midiate: Answer It</title>
		
	   <link href="midiate_General_Styles.css" rel="stylesheet" />			<!-- stylesheets -->
	   <link href="answer_It_Styles.css" rel="stylesheet" />
	   <link href="answer_It_Layout.css" rel="stylesheet" />
	</head>

	<body>
	   <div id="container">								<!-- start of 'container' section -->
	      <header>										<!-- header of webpage -->
		 <h1><img src="MidiateLogo.png" alt="Midiate" /></h1>
		 <button type="button" class="logoff">Log Off</button>	<!-- *modified by AW -->
	      </header>

	      <nav>										<!-- navigation; unordered list -->
		 <ul>
		    <li><a href="ask_It.php">Ask It</a></li>
		    <li class="active"><a href="answer_It.php">Answer It</a></li>			<!-- this page is 'active'  ->
		    <li><a href="my_Arguments.php">My Arguments</a></li>
		    <li><a href="my_Profile.php">My Profile</a></li>
		 </ul>
	      </nav>

	      <table>										<!-- table of questions from php -->
		 <tbody>
		    <tr>										<!-- each row is a question -->
		       <td>
			 This is the question.
			 <br>
	 		 <input type="image" src="MidateRedMan.png" name="redman" class="redman" width="60" height="60" />
			 <label for="redman">Answer1 Text</label>

			 <label for="blueman">Answer2 Text</label>
			 <input type="image" src="MidiateBlueMan.png" name="blueman" class="blueman" width="60" height="60" />
		       </td>
		    </tr>
		 </tbody>
	      </table>										<!-- end table -->

	      <div id="footer">									<!-- footer section -->
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