<?php
	//Alicia Wood- converted to php on 2/20/2016
	//edited by Maryam Ahmed
	//edited by Emily Johnson (nice display of questions in answerable format)
   session_start();
   include("openDB.php");
   openDB();

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
		    <li class="active"><a href="answer_It.php">Answer It</a></li>			<!-- this page is 'active'  -->
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
BLOCKBODY;

		printfive();
		
echo<<<BLOCKBODY2
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

BLOCKBODY2;

   }
   else
      header("Location: midiate_signin.html");

?>

<?php
//All functions:

 //This function parses and displays the five most recent entries from Question table.
 //(if only want to print five, need a counter for each question presented, otherwise, all records shown)
 //Emily Johnson
 function printfive()
 {
	//$query="SELECT questionText, answer1Text, answer2Text, postID FROM Question WHERE postID=14;";
	$query = "SELECT questionText, answer1Text, answer2Text, postID FROM Question " 
						. "ORDER BY postID DESC LIMIT 5 WHERE userID!='1234';";

	$result=mysql_query($query);
	$record = mysql_fetch_array($result);
	
	while ($record != false)					//while there is still a record to print...
	{
		$questionText = $record['questionText'];						//populate variables
		$answer1Text = $record['answer1Text'];
		$answer2Text = $record['answer2Text'];	
		$postID = $record['postID'];

		$normalQuestion = stripslashes($questionText);					//remove slashes from values
		$normalA1 = stripslashes($answer1Text);
		$normalA2 = stripslashes($answer2Text);
		
		if (hasVoted($userID, $postID)) //show results instead of letting user vote if already voted on this question
		{
			showResults($postID, $normalQuestion, $normalA1, $normalA2);		//pritn unvotable question
		}
		else 							//show question if user hasn't voted on this - question is votable
		{
			echo "	<td>$normalQuestion</td> ";
			
			echo<<<SUBBLOCK1
				<tr>
		
					<td>					
						<div onclick="location.href='vote.php?postID=$postID&answerChoice=1'">
							<input type="image" src="MidiateRedMan.png" name="redman" 
								width="60" height="60" />
							$normalA1 &nbsp &nbsp &nbsp
						</div>

						<div onclick="location.href='vote.php?postID=$postID&answerChoice=2'">							
							 $normalA2
							 <input type="image" src="MidiateBlueMan.png" name="blueman"
								width="60" height="60" />
						</div>
					</td>
				</tr>
SUBBLOCK1;
		}
	 
		$record=mysql_fetch_array($result);						//display
	}																			//end while loop
 } 
 
 //This function returns TRUE if the user has answered a question already, FALSE if they have not.
 //Emily Johnson
function hasVoted($userID, $postID)
{  
		$answerd = FALSE;					//initiate variable as false
		
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

//This function displays stats for each question that the user has already answered (after calculating them)
//in place of just showing the question and the two answer choices.
//Emily Johnson
function showResults($postID, $normalQuestion, $normalA1, $normalA2)
{ 
	$query1 = "SELECT COUNT(answerNum) FROM Preference WHERE postID='$postID' AND answerNum=1;";
	$votes1 = mysql_query($query1);										//get number of votes for answer 1
	
	$query2 = "SELECT COUNT(answerNum) FROM Preference WHERE postID='$postID' AND answerNum=2;";
	$votes2 = mysql_query($query2);										//get number of votes for answer 2
	
	$totalVotes = $votes1 + $votes2;									//get total number of votes
	
	$percent1 = ($votes1*100)/$totalVotes;					//calculate percentages of votes for each option
	$percent2 = ($votes2*100)/$totalVotes;
	
	//Echo question and answers unit to the table on the webpage
	echo"	<td>$normalQuestion</td> ";
	echo<<<SUBBLOCK2
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
SUBBLOCK2;
}

//This function prints a table of all questions this user hasn't made.
//Alicia Wood
function placeQuestions()
{
	$query = "SELECT * FROM Question WHERE userID!='1234';";	//change to "this" user's id from session, not hardcode
	
	$result = mysql_query($query);
	if($result==0)
	{
		echo "<b>Error " . mysql_errno() . ": " . mysql_error() . "</b>";
	}
	else if (@mysql_num_rows($result)==0)
	{
		echo "<b>No arguments.</b><br>";
	}
	else
	{
		$fieldNum = mysql_num_fields($result);		//columns - horizontal
		$rowNum = mysql_num_rows($result);			//rows - vertical
		
		echo "<table border='1' padding='5px'> <thead>";
		echo "<tr>";
		for($i=1; $i<$fieldNum-1; $i++ )			//show postID to answer2Votes; leave out userID and showNotShow fields
		{
			echo "<th>".mysql_field_name($result,$i)."</th>";
		}
		echo "</tr>";
		echo "<tbody>";
		for($i=0; $i<$rowNum; $i++ )
		{
			echo "<tr>";
			$row=mysql_fetch_array($result);
			for( $j=1; $j<$fieldNum-1; $j++ )		//show postID to answer2Votes; leave out userID and showNotShow fields
			{
				echo "<td>" . $row[$j] . "</td>";
			}
			echo "</tr>";
		}
		echo "</tbody></table>";
   }
}
?>