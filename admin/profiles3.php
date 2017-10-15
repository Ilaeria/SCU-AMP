<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

	if(!isset($_SESSION['login']))
	{ //if login in session is not set
		header("Location: login.php");
	}
	
	// Connect to database
	include '../php_includes/db_connect.php';
	$my_connection = db_connect();	
?>

<html>
<head>
	<title>
	</title>
</head>
<body>
	<?php
		if(ISSET($_POST['Submit2']))
		{
			//Extract data
			$ProfileFirstNameNew 	= $_SESSION["ProfileFirstName"];
			$ProfileLastNameNew		= $_SESSION["ProfileLastName"];
			$ProfileDOBNew			= $_SESSION["ProfileDOB"];
			$ProfileLevelNew		= $_SESSION["ProfileLevel"];
			$ProfileIsHiddenNew		= $_SESSION["ProfileIsHidden"];
			$ProfileIsSuspendedNew	= $_SESSION["ProfileIsSuspended"];
			$ProfileIsDeletedNew	= $_SESSION["ProfileIsDeleted"];
			
			//Build SQL query
			$query = "UPDATE PROFILE
						SET FirstName = '".$ProfileFirstNameNew."', LastName = '".$ProfileLastNameNew."', DOB = '".$ProfileDOBNew."', ProfileLevel=".$ProfileLevelNew.",
						isHidden = ".$ProfileIsHiddenNew.", isSuspended = ".$ProfileIsSuspendedNew.", isDeleted = ".$ProfileIsDeletedNew."
						WHERE PROFILE.ProfileID = ".$_SESSION["ProfileID"];
			$result = mysqli_query($my_connection,$query);
			if($result === false) 
			{
				// Handle failure - log the error, notify administrator, etc.
				print("<p style=\"color:#666;\">Error querying Shine database</p>");
				print(mysqli_error($my_connection));
			} 
			else 
			{
				//update Profile History
				$event="Updated profile";
				/*
				$query2="INSERT INTO PROFHIST VALUES (NULL, ".$_SESSION["AuthorID"].", '".date('l jS \of F Y h:i:s A')."', '".$event."')";
				$result=mysqli_query($my_connection, $query2);
				if ($result===false)
					print("<h1>Failed to update profile history - ".mysqli_connect_error()."</h1>");
				else*/
					print("<h1>Profie Updated</h1>");
				
			}			

			print("<a href=\"author.php\" class=\"ButtonStyleHREF\">CONTINUE</a>");					
		} // end if
		else if (ISSET($_POST['Cancel']))
		{
			//print("Are you sure? <br />");
			//print("<input type='button' name='yes' id='yes' value='yes'><input type='button' name='no' id='no' value='no'>");
			header ("location: author.php");
		} // end else	
	?>
</body>
</html>