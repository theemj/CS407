<?php
	//Alicia Wood- converted to php on 2/20/2016
	//edited by Maryam Ahmed
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

		placeQuestions();
		
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

?><?php
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