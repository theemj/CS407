<?

/* Midiate Web Application
		     Answer It Page
		     Author: Maryam Ahmed - edited by Desiree Howell - php'd and SQL'd by Emily Johnson
		     Date: 2/10/2016
*/

include ("includeMe.php");
include("openDB.php");

openDB();

//$query="SELECT questionText, answer1Text, answer2Text, postID FROM Question WHERE postID=14;";

$query = "SELECT questionText, answer1Text, answer2Text, postID FROM Question ORDER BY postID DESC LIMIT 5;";

$result=mysql_query($query);

  
	
 
  
  //parses and displays five most recent entries from Question table
 function printfive($result)
 {
	 $record = mysql_fetch_array($result);
	 while ($record != false)
	 {
		$questionText = $record['questionText'];
		$answer1Text = $record['answer1Text'];
		$answer2Text = $record['answer2Text'];	
		$postID = $record['postID'];

		$normalQuestion = stripslashes($questionText);
		$normalA1 = stripslashes($answer1Text);
		$normalA2 = stripslashes($answer2Text);
echo"	<td>$normalQuestion</td> ";
echo<<<BLOCK2
			<tr>
	
				<td>					
						<div onclick="location.href='vote.php?postID=$postID&answerChoice=answer1Votes'">
						    <input type="image" src="MidiateRedMan.png" name="redman" 
							width="60" height="60" /> $normalA1 &nbsp &nbsp &nbsp
						</div>

						<div onclick="location.href='vote.php?postID=$postID&answerChoice=answer2Votes'"> 
						
						 $normalA2 <input type="image" src="MidiateBlueMan.png" name="blueman"
							width="60" height="60" />
						</div>
					</td>
				</tr>
				
BLOCK2;
	 
	 $record=mysql_fetch_array($result);
	 }
 } 
   
   

echo<<<BLOCK1
<html>
	<head>
		

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
			<li><a href="ask_It.html">Ask it</a></li>
			<li class="active"><a href="answer_It.html">Answer it</a></li>
			<li><a href="my_Arguments.html">My Arguments</a></li>
			<li><a href="my_Profile.html">My Profile</a></li>
		   </ul>
		</nav>

		<table>
			<tbody>
BLOCK1;
				printfive($result);
echo<<<BLOCK4
	
		</tbody>
		</table>

		<br><br>
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
BLOCK4;


							


?>

