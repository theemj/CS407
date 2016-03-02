<?
//vote.php
//For tallying votes on the Midiate app's "answer_It.php" page
//Emily Johnson
//CS 407

header("Location: home.html");

include("includeMe.php");
include("openDB.php");
openDB();

$postID=$_GET['postID'];
$answerChoice=$_GET['answerChoice'];


$query = "UPDATE Question SET $answerChoice = $answerChoice + 1 WHERE postID=$postID";

$result = mysql_query($query);
?>