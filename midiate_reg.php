<?php
   session_start();

   if ($_SESSION['loggedIn'] != "yes")				//cannot be logged in before registration
   {
echo<<<BLOCKBODY
<!DOCTYPE>

<!-- Alicia Wood modified by Maryam and Desiree
     2/19/2016
     midiate_reg.php
-->

<html>
   <head>
      <title>Create New Account</title>

      <script src="error.js"></script>				<!-- JavaScripts -->

      <style>
	 body
	 {
            margin: 0px auto;					/*set margin; top/bottom left/right*/
	    text-align: center;
	 }
	
	 form
	 {
	    margin: 10px auto;					/*set all margins*/
	    padding: 20px;
	    width: 400px;
	    background-color: LightGray;			/*set background color to light gray*/

	    border: 5px solid blue;				/*set border; thick solid blue*/
	    border-radius: 20px;					/*border has curved corners*/
	    box-shadow:
	 }
      </style>

      <link href="midiate_General_Styles.css" rel="stylesheet" />	<!-- Desiree -->

   </head>
   <body>								<!-- body of the website/what visiters see -->

      <header>
			<h1><img src="MidiateLogo.png" alt="Midiate" /></h1>	<!-- Desiree -->
      </header>

      <form action="midiate_reg_proc.php" method="POST">			<!-- start of form -->
	 <label>						<!-- username field -->
	    Enter your email address:
	    <br>						<!-- line break -->
	    <input type="email" name="email" required="required">
	 </label>

         <br>							<!-- line breaks between input field sections -->
	 <br>

	 <label>						<!-- password field -->
	    Create a password:
	    <br>						<!-- line break -->
	    <input type="text" name="password" required="required">
	 </label>

	 <br>							<!-- line breaks between input field sections -->
	 <br>

	 <label>						<!-- check password field -->
	    Retype your password:
	    <br>						<!-- line break -->
	    <input type="text" name="passwordCheck" required="required">
	 </label>

	 <br>							<!-- line breaks between input field sections -->
	 <br>

	 <input type="submit" value="Register">			<!-- register button -->
      </form>						<!-- end of form -->
   </body>

   <footer>							<!-- Maryam's code -->
		<p>
			&copy;2016 Midiate &nbsp;&bull;&nbsp;
			Property of Meredith College CS407 &nbsp;&bull;&nbsp;
			All Rights Reserved
		</p>
   </footer>
</html>

BLOCKBODY;

   }
   else
      header("Location: home.php");

?>