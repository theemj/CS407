<?php
	//Log_out.php
	//Alicia Wood
	//4/6/2016
	//This file will set the session variable loggedIn to no, and shift user to the login page.
	
	session_start();
	
	$_SESSION['loggedIn'] = "no";				//change session variable
	
	header("Location: midiate_signin.html");	//head to signin page of website
	
?>