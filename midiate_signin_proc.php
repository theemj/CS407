<?php
   //Alicia Wood, edited by Maryam Ahmed
   //2/10/2016
   //midiate_signin_proc.php

   session_start();
   
   include("includeMe.php");				//files included in this file
   include("openDB.php");

   openDB();						//open external functions

   $email = $_POST['email'];			//variables
   $password = $_POST['password'];

   $findPassword = "SELECT password FROM User WHERE email='$email';";

   $resultingTable = mysql_query($findPassword);
   if(noerror($resultingTable))
   {
      $theRow = mysql_fetch_array($resultingTable);		//get the row (the password will be on the row)
      $thePassword = $theRow['password'];			//get the password from the row

      if($password != $thePassword)			//if wrong password for that user
      {
        header("Location: midiate_signin.html");			//go back to login page
      }
      else						//if correct password for that user
      {
         $_SESSION['loggedIn'] = "yes";				//mark user as logged in
         $_SESSION['email'] = $email;
         header("Location: home.php");		//go to profile page of user
      }
   }
   else
   {
      header("Location: midiate_signin.html");			//go back to login page
   }
?>
   
<!DOCTYPE>
<html>
   <body>
      <h1>Processing...</h1>
      <?php
	 echo "trying email: $email and checking this password: $password against this actual password: $thePassword";
	 echo "the query is: $findPassword <br />";
      ?>

 <?php
	 $q = "SELECT password FROM User WHERE email='$email';";				//place mySQL command inside variable

	 echo "about to do $q <br>\n";

	 $result = mysql_query($q);				//send value of variable to database and get result

	 if(noerror($result))					//make sure no error in result
	 {
	    tabledump($result);					//print result in table format
	 }
      ?>
   </body>
</html>