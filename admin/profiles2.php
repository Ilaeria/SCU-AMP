<!--
	Name: 				profiles2.php
	Author: 			Stephen Manning
	Date: 				17/9/17
	Description: 		Displays fields for selected Author in HTML form (so data can be edited).
	Pre-requisites: 	profiles2.php has been invoked by clicking hyperlink from profiles.php
	Post-requisites: 	Profile fields have been extracted from DB and printed to screen in a HTML form for review/editing 
-->
<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	if(!isset($_SESSION['admin_logged_in']))
	{ //if login in session is not set
		header("Location: index.php");
	}
	
	// Connect to database
	include '../php_includes/db_connect.php';
	$my_connection = db_connect();
?>
		
<?php
	if (isset($_GET["ProfileID"]))
	{
		$_SESSION["ProfileID"]=$_GET["ProfileID"];
		$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName, PROFILE.DOB,
					PROFILE.ProfileLevel, PROFILE.IsHidden, PROFILE.IsSuspended, PROFILE.IsDeleted
					FROM AUTHOR, PROFILE
					WHERE PROFILE.ProfileID = ".$_SESSION['ProfileID']."
					AND PROFILE.AuthorID = AUTHOR.AuthorID";
		$result = mysqli_query($my_connection, $query);
		if($result === false) 
		{
			// Handle failure - log the error, notify administrator, etc.
			print("<p style=\"color:#FFFFFF;\">Error querying Shine database</p>");
		} 
		else
		{
			$num_rows=mysqli_num_rows($result);
			$row=mysqli_fetch_row($result);
			$_SESSION["AuthorID"]			= $row[1];
			$_SESSION["AuthorEmail"]		= $row[2];
			$_SESSION["AuthorFirstName"]	= $row[3];
			$_SESSION["AuthorLastName"]		= $row[4];
			$_SESSION["ProfileFirstName"]	= $row[5];
			$_SESSION["ProfileLastName"]	= $row[6];
			$_SESSION["ProfileDOB"]			= $row[7];
			$_SESSION["ProfileLevel"]		= $row[8];
			$_SESSION["ProfileIsHidden"]	= $row[9];
			$_SESSION["ProfileIsSuspended"]	= $row[10];
			$_SESSION["ProfileIsDeleted"]	= $row[11];

			//Display results in HTML Form
			print("<h2>Edit Profile Information</h2>");
			print("<hr><form method='post' action='profiles3.php'>");		
				//print("DEBUG - ".$_SESSION["Email"]."<br />");
				print("Author ID: <input name='AuthorID' value='".$_SESSION["AuthorID"]."' readonly><br />");
				print("Author Email: <input type='text' name='Email' value='".$_SESSION["AuthorEmail"]."' readonly><br />");
				print("Author First Name: <input type='text' name='AuthorFirstName' value='".$_SESSION["AuthorFirstName"]."' readonly><br />");
				print("Author Last Name: <input type='text' name='AuthorLastName' value='".$_SESSION["AuthorLastName"]."' readonly><br />");
				print("Profile First Name: <input type='text' name='ProfileFirstName' value='".$_SESSION["ProfileFirstName"]."'><br />");
				print("Profile Last Name: <input type='text' name='ProfileLastName' value='".$_SESSION["ProfileLastName"]."'><br />");
				print("Profile DOB: <input type='text' name='ProfileDOB' value='".$_SESSION["ProfileDOB"]."'><br />");
				print("Profile Level: <input type='text' name='ProfileLevel' value='".$_SESSION["ProfileLevel"]."'><br />");
				print("Profile IsHidden: <input type='text' name='ProfileIsHidden' value='".$_SESSION["ProfileIsHidden"]."'><br />");
				print("Profile First Name: <input type='text' name='ProfileIsSuspended' value='".$_SESSION["ProfileIsSuspended"]."'><br />");
				print("Profile First Name: <input type='text' name='ProfileIsDeleted' value='".$_SESSION["ProfileIsDeleted"]."'><br />");

				print("<input type='submit' name='Submit2' value='Save'>");	
				print("<input type='submit' name='Cancel' value='Cancel'>");	
			print("</form>");
		}//end else
	}//end if
?>