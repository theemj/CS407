<?
//vote.php
//For tallying votes on the Midiate app's "answer_It.php" page
//Emily Johnson
//CS 407

header("Location: answer_It.php");

include("includeMe.php");
include("openDB.php");
openDB();

$userID =  $_SESSION['meadUserId'] ;
$postID=$_GET['postID'];
$answerChoice=$_GET['answerChoice'];


$query = "INSERT INTO Preference SET postID = '$postID', userID='$userID', answerNum='$answerChoice';";

$result = mysql_query($query);
?>