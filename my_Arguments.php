<?php
	//Alicia Wood converted to php on 2/20/2016
   session_start();
   include("openDB.php");
   openDB();

   $userID = $_SESSION['meadUserId'];
   $email = $_SESSION['email'];

   if ($_SESSION['loggedIn'] == "yes")
   {
echo<<<BLOCKBODY

<!DOCTYPE>
<html>
	<head>
		<!-- Midiate Web Application
		     My Arguments Page
		     Author: Desiree Howell modified by Maryam Ahmed - converted to php by Alicia Wood
		     Date: 2/3/2016
		-->

		
		<title>Midiate</title>


		<link href="midiate_General_Styles.css" rel="stylesheet" />
        <link href="my_Arguments_Styles.css" rel="stylesheet" />
		<link href="my_Arguments_Layout.css" rel="stylesheet" />


	</head>

		
	<body>

     <div id="container">

		<header>

			<h1><a href=home.php><img src="MidiateLogo.png" alt="Midiate" /></a></h1>

			<form action="log_out.php">					<!-- Alicia; log out button to php file -->
				<input type="submit" class="logoff" value="Log Off">
			</form>
		</header>


		<nav>
		   <ul>
			  <li><a href="ask_It.php">Ask it</a></li>
			  <li><a href="answer_It.php">Answer it</a></li>
			  <li class="active"><a href="my_Arguments.php">My Arguments</a></li>
			  <li><a href="my_Profile.php">My Profile</a></li>
		   </ul>
		</nav>
BLOCKBODY;

		placeArguments();
	
echo<<<BLOCKBODY2
        <div id="footer">							<!-- Maryam; footer section of webpage -->
	       <footer>
			  <p>
			   &copy;2016 Midiate &nbsp;&bull;&nbsp;
			   Property of Meredith College CS407 &nbsp;&bull;&nbsp;
			   All Rights Reserved
		      </p>
	       </footer>

        </div>

     </div>					<!-- end of container div -->
	</body>


</html>

BLOCKBODY2;

   }
   else						//if not signed in, then go straight to log-in page
      header("Location: midiate_signin.html");

?>

<?php
function placeArguments()
{
	$query = "SELECT * FROM Question WHERE userID='$userID';";	//change to "this" user's id from session, not hardcode
	
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