<?php
   //Alicia Wood
   //edited by Maryam Ahmed
   //2/10/2016
   //midiate_reg_proc.php

   session_start();

   include("includeMe.php");							//include these files
   include("openDB.php");

   openDB();									//imported functions

   $email = $_POST['email'];
   $password1 = $_POST['password'];
   $password2 = $_POST['passwordCheck'];

   $userId = "234";								//change later!

   //Check to see if the email already exists in system (in other words, the email is already in use)
   $findEmail= "SELECT * FROM User WHERE email='$email';";
   $result = mysql_query( $findEmail );
if(noerrorquiet($result))
{
   if($result != null)
   {					 	 //if any records match the email, print notice to screen
      echo "<!DOCTYPE> <html> <body>";
      echo "This email address is already in use.\n";
      echo "Return to <a href=\"midiate_reg.php\">registration</a> and try again.";
      echo "</body> </html>";
   }
   else						//otherwise the email is free, continue to check passwords
   {
      if( $password1 != $password2)
      {				   		//if any passwords do not match each other, print notice to screen
         echo "<!DOCTYPE> <html> <body>";
         echo "Your passwords do not match.\n";
         echo "Return to <a href=\"midiate_reg.php\">registration</a> and try again.";
         echo "</body> </html>";
      }
      else						//passwords match and email is free, continue to register
      {
	//change this later so that after registration user gets an email to finish registration?
         $_SESSION['loggedIn'] = "yes";			//mark user as logged in
         $_SESSION['email'] = $email;
         $_SESSION['meadUserId'] = $userId;

		$addAccount = "INSERT INTO User SET userID='$userId',"
						. "email = '$email', "
						. "password = '$password1';";
		mysql_query( $addAccount );

         //header("Location: home.php");		//go to home page (where user can now do stuff)
      }
   }
}
?>

<!DOCTYPE>
<html>
   <body>
      <h1>Processing...</h1>
      <?php
	 echo "trying email: $email\n";
	 echo "\nand testing passwords: $password1 against $password2\n";
      ?>

 <?php
	 $q = "SELECT * FROM User WHERE email='$email';";				//place mySQL command inside variable

	 echo "\n\nabout to do $q <br>\n";

	 $result = mysql_query($q);				//send value of variable to database and get result

	 if(noerror($result))					//make sure no error in result
	 {
	    tabledump($result);					//print result in table format
	 }
      ?>
   </body>
</html>