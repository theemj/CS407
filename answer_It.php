<?php

/* Midiate Web Application
		     Answer It Page
		     Author: Maryam Ahmed - edited by Desiree Howell - php'd and SQL'd by Emily Johnson
		     Date: 2/10/2016
*/
session_start();
	
include ("includeMe.php");
include("openDB.php");

openDB();  //$query="SELECT questionText, answer1Text, answer2Text, postID FROM Question WHERE postID=14;";


  //This function parses and displays all entries from Question table that are not this user's.
 function printfive($result)
 {
	 $query = "SELECT questionText, answer1Text, answer2Text, postID FROM Question ORDER BY postID DESC;";

	 $result=mysql_query($query);
	 
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
		
		if (hasVoted($userID, $postID)) //show results instead of letting user vote if already voted
		{
			showResults($postID, $normalQuestion, $normalA1, $normalA2);
		}
		else //show votable question if user hasn't voted on this
		{
			echo"	<td>$normalQuestion</td> ";
			echo<<<BLOCK2
				<tr>
		
					<td>					
							<div onclick="location.href='vote.php?postID=$postID&answerChoice=1'">
								<input type="image" src="MidiateRedMan.png" name="redman" 
								width="60" height="60" /> $normalA1 &nbsp &nbsp &nbsp
							</div>

							<div onclick="location.href='vote.php?postID=$postID&answerChoice=2'"> 
							
							 $normalA2 <input type="image" src="MidiateBlueMan.png" name="blueman"
								width="60" height="60" />
							</div>
						</td>
					</tr>
BLOCK2;
		}
	 
	 $record=mysql_fetch_array($result);
	}
 } 

//This function returns TRUE if user has answered question already, FALSE if they have not.
function hasVoted($userID, $postID) 
{  
		$answerd = FALSE;
		$query = "SELECT answerNum FROM Preference WHERE userID='$userID' AND postID='$postID';";
		$result = mysql_query($query);
		$record = mysql_fetch_array($result);
		if ($record != false)
		{
			$answerd = TRUE;
			//$record=mysql_fetch_array($result);
		}
		return $answerd;	
}

//This function shows stats for each question that the user has already answered (after calculating them).
function showResults($postID, $normalQuestion, $normalA1, $normalA2)
{ 
	$query1 = "SELECT COUNT(answerNum) FROM Preference WHERE postID='$postID' AND answerNum=1;";
	$query2 = "SELECT COUNT(answerNum) FROM Preference WHERE postID='$postID' AND answerNum=2;";
	$votes1 = mysql_query($query1);
	$votes2 = mysql_query($query2);
	$totalVotes = $votes1 + $votes2;
	
	$percent1 = ($votes1*100)/$totalVotes;
	$percent2 = ($votes2*100)/$totalVotes;
	
	echo"	<td>$normalQuestion</td> ";
	echo<<<BLOCK2
				<tr>
		
					<td>					
							<div>
								<input type="image" src="MidiateRedMan.png" name="redman" 
								width="60" height="60" /> $normalA1 &nbsp $percent1 % &nbsp &nbsp &nbsp &nbsp
							</div>

							<div> 
							
							 $normalA2 &nbsp $percent2 % <input type="image" src="MidiateBlueMan.png" name="blueman"
								width="60" height="60" />
							</div>
						</td>
					</tr>
					
BLOCK2;
}



if ($_SESSION['loggedIn'] == "yes")
{
echo<<<BLOCK1
<!DOCTYPE>
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
			<li><a href="ask_It.php">Ask it</a></li>
			<li class="active"><a href="answer_It.php">Answer it</a></li>
			<li><a href="my_Arguments.php">My Arguments</a></li>
			<li><a href="my_Profile.php">My Profile</a></li>
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
}
else
{
	header("Location: midiate_signin.html");
}

?>