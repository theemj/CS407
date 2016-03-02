<? 
//addQuestion.php
//Emily Johnson 
//CS407
//processes question POST data
//(which is one question and two answer choices)
//and puts in the database Question table

header("Location: home.html");

@session_start();
include("includeMe.php");
include("openDB.php");

//ADD METHOD THAT MAKES SURE THEY'RE SIGNED IN

openDB();
   
   $questionText = addslashes( $_POST['question'] );
   $answer1Text = addslashes ( $_POST['answer1']);
   $answer2Text = addslashes ( $_POST['answer2']);
   $userID = 1235;
   
   $query = "INSERT INTO Question SET "
		." questionText = '$questionText' "
		." ,answer1Text = '$answer1Text' "
		." ,answer2Text = '$answer2Text' "
		." ,userID = '$userID' "
		.";";
		
		$result = mysql_query($query);
		
		//noerrorquiet( $result ); 
		
		//echo'THINGS HAPPENED'; //TEST
		
		
		
		


?>