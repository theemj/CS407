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

   $userId = "1";								//initialize userId to something other than null
   
   $getuserID = "SELECT MAX(userID) FROM User;";   
   $resultID = mysql_query($getuserID);						//get a table (last row of Question's table)
	   
   //if there is an existing userID(user) in the table, get next highest userID, otherwise, userId is 1
   if(noerror($resultID))
   {
	   $userId = makeMax($resultID);					//get the actual number to be added to this new post
   }
 
   //Check to see if the email already exists in system (in other words, the email is already in use)
	$findEmail= "SELECT * FROM User WHERE email='$email';";
	$resultingTable = mysql_query( $findEmail );
	
	if(isEmpty($resultingTable))				//email is not in use
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

			header("Location: home.php");		//go to home page (where user can now do stuff)
		}

	}
	else										//email exists!  inform user
	{
							 	 //if any records match the email, print notice to screen
		  echo "<!DOCTYPE> <html> <body>";
		  echo "This email address is already in use.\n";
		  echo "Return to <a href=\"midiate_reg.php\">registration</a> and try again.";
		  echo "</body> </html>";
	}
?>

<?php
	//This function will get a number from a query result (a table) and add one to create
	//the next postID value
	function makeMax($queryResult)
	{
	    if (@mysql_num_rows($queryResult)==0)
		{
			echo "<b>Query completed.  Empty result.</b><br>";
		}
		else
		{
			$nf = mysql_num_fields($queryResult);			//to be ignored (table headings)
			$nr = mysql_num_rows($queryResult);
			
            $row = mysql_fetch_array($queryResult);
			$newNum = $row[0] + 1;
			
			return $newNum;
		}
	}
?>