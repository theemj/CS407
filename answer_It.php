<?php
   session_start();

   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY
<!DOCTYPE>

<html>

	<head>

		<!-- Midiate Web Application

		     Answer It Page

		     Author: Maryam Ahmed - edited by Desiree Howell
 & converted to php by Alicia Wood (2/20/2016)
		     Date: 2/10/2016

		-->


		<title>Midiate</title>

		
<link href="midiate_General_Styles.css" rel="stylesheet" />

		<link href="answer_It_Styles.css" rel="stylesheet" />

		<link href="answer_It_Layout.css" rel="stylesheet" />

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

			<li class="active"><a href="answer_It.php">Answer it</a></li>

			<li><a href="my_Arguments.php">My Arguments</a></li>

			<li><a href="my_Profile.php">My Profile</a></li>

		   </ul>

		</nav>



		<table>

			<tbody>

				<tr>

					<td>Which Harry Potter character is smarter?</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 2</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman" 

							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"
	
							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 3</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 4</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 5</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 6</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 7</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>
	
						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"
	
							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 8</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 9</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

				<tr>

					<td>Question 10</td>

					<td>

						<div>

						    <input type="image" src="MidiateRedMan.png" name="redman"
 
							width="60" height="60" />

						</div>

						<div>
 
						    <input type="image" src="MidiateBlueMan.png" name="blueman"

							width="60" height="60" />

						</div>

					</td>

				</tr>

			</tbody>

		</table>



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