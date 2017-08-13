<?php
   // start session to allow access to session variables
   session_start(); 
   // check who was logged in - a normal user, or an admin user, and if the latter was true, set a flag
   if (isset ($_SESSION["admin_logged_in"]))
		$admin_logged_in=TRUE;
	//Destroy session and all session variables
	session_destroy();
	if ($admin_logged_in)
	{	
		header("Location: ../admin/index.php");
		$admin_logged_in=FALSE;
	}
	else
		header("Location: ../login.php");
?>