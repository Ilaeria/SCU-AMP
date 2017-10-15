<?php
	// Connect to database
	include'php_includes/db_connect.php';
	$my_connection = db_connect();
	
	//If the access method was POST (rather than http) process the form
	if(isset($_POST['submit']))
	{
	   
	   print "<h2>Status</h2>";
	   include_once 'php_includes/validateUser.php';
	   if(ValidateUserForm($_POST, $my_connection)) 
	   { // all entered data good
		  include_once 'php_includes/createUser.php';
		  $queryResult = createUser($_POST, $my_connection); // add time to this    
		  //See if the creation worked.
		  if($queryResult['succeeded'])
		  {
			 //Success message
			 print("<a href=\"profile.php\" class=\"ButtonStyleHREF\">Congratulations - You're ready to Shine!</a>");
		  }
	   } 
	}
	else
		  header("Location: profile_create.php");                  
 ?> 