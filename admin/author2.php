<!--
	Name: 				author2.php
	Author: 			Stephen Manning
	Date: 				16/9/17
	Description: 		Displays fields for selected Author in HTML form (so data can be edited).
	Pre-requisites: 	author2.php has been invoked by clicking hyperlink from author.php
	Post-requisites: 	Author fields have been extracted from DB and printed to screen in a HTML form for review/editing 
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
	if (isset($_GET["AuthorID"]))
	{
		$_SESSION["AuthorID"]=$_GET["AuthorID"];
		$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
															AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
															FROM AUTHOR
															WHERE AUTHOR.AuthorID = ".$_SESSION["AuthorID"];
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
			$_SESSION["AuthorID"]		= $row[0];
			$_SESSION["Email"]			= $row[1];
			$_SESSION["IsActive"]		= $row[2];
			$_SESSION["FirstName"]		= $row[3];
			$_SESSION["LastName"]		= $row[4];
			$_SESSION["DOB"]			= $row[5];
			$_SESSION["Street1"]		= $row[6];
			$_SESSION["Street2"]		= $row[7];
			$_SESSION["City"]			= $row[8];
			$_SESSION["StateAU"]		= $row[9];
			$_SESSION["Country"]		= $row[10];
			$_SESSION["ContactNumber"]	= $row[11];

			//Display results in HTML Form
			print("<h2>Edit Author Information</h2>");
			print("<hr><form method='post' action='author3.php'>");		
			//print("DEBUG - ".$_SESSION["Email"]."<br />");
			print("<input type='hidden' name='AuthorID' value='".$_SESSION["AuthorID"]."'><br />");
			print("Email: <input type='text' name='Email' value='".$_SESSION["Email"]."'><br />");
			print("Active: <input type='text' name='IsActive' value='".$_SESSION["IsActive"]."'><br />");
			print("FirstName: <input type='text' name='FirstName' value='".$_SESSION["FirstName"]."'><br />");
			print("LastName: <input type='text' name='LastName' value='".$_SESSION["LastName"]."'><br />");
			print("DOB: <input type='text' name='DOB' value='".$_SESSION["DOB"]."'><br />");
			print("Street1: <input type='text' name='Street1' value='".$_SESSION["Street1"]."'><br />");
			print("Street2: <input type='text' name='Street2' value='".$_SESSION["Street2"]."'><br />");
			print("City: <input type='text' name='City' value='".$_SESSION["City"]."'><br />");
			print("StateAU: <input type='text' name='StateAU' value='".$_SESSION["StateAU"]."'><br />");
			print("Country: <input type='text' name='Country' value='".$_SESSION["Country"]."'><br />");
			print("ContactNumber: <input type='text' name='ContactNumber' value='".$_SESSION["ContactNumber"]."'><br />");
			print("<input type='submit' name='Submit2' value='Save'>");	
			print("<input type='submit' name='Cancel' value='Cancel'>");	

			print("</form>");
		}//end else
	}//end if
?>