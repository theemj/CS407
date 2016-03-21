<?php
//addQuestion.php
//Emily Johnson modified by Alicia Wood
//CS407
//processes question POST data from ask_It.php
//(which is one question and two answer choices)
//and puts the data in the database Question table

session_start();

include("includeMe.php");				//php files to include
include("openDBbatman.php");

openDB();

   //$questionText = addslashes( $_POST['question']);
   //$answer1Text = addslashes( $_POST['answer1']);
   //$answer2Text = addslashes( $_POST['answer2']);
   $questionText = $_POST['question'];			//variables
   $answer1Text = $_POST['answer1'];
   $answer2Text = $_POST['answer2'];

   $userID = '1234';					//fill in faux numbers until algorithm is finished for auto count
   $postID = '01';

   $query = "INSERT INTO Question SET "
				. "questionText = '$questionText', "
				. "answer1Text = '$answer1Text', "
				. "answer2Text = '$answer2Text', "
				. "userID = '$userID', "
				. "postID = '$postID', "
				. "answer1Votes = '0', "		//set these as 'defaults'
				. "answer2Votes = '0';";

   if(noerror(mysql_query($query))
   {
      echo "it worked!";
      //header("Location: home.php");
   }
   else
   {
      echo "something's wrong";
      //header("Location: ask_It.php"); maybe?
   }
   //header("Location: home.php");
		
		//noerrorquiet( $result ); 

?>


<!DOCTYPE>
<html>
   <body>
      <h1>Processing...</h1>

      <?php
         echo "putting question ($questionText) and options ($answer1Text , $answer2Text) into table";
	 echo "query is: $query";
	 echo "<br>";

	//show all values of Question table
	 $q = "SELECT * FROM Question;";		//create a query for mysql
	 echo "about to do $q <br> \n";			//echo query

	 $result = mysql_query($q);			//send value of variable to database and get result

	 if(noerror($result)
	 {
	    tabledump($result);				//print results of mysql query in table format if no errors
	 }
      ?>
   </body>
</html>