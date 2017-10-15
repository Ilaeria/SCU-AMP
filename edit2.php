<!--
	Name: 				edit2.php
	Author: 			Stephen Manning
	Date: 				10/9/17
	Description: 		Updates Profile data after Author after being invoked by Author pressing Save in editProfile.php

	Pre-requisites: 	Author has pressed Save in editProfile.php
	Post-requisites: 	1.Profile has been updated with edited data
						2. ProfileHistory has been updated
-->



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
	include 'db_connect.php';
	$my_connection = db_connect();	
?>

<html>
<head>
	<title>
	</title>
</head>
<body>

	<?php
		//Capture values posted from edit.php
			$Content1_New=$_POST["content1"];
			$Content2_New=$_POST["content2"];
			$Content3_New=$_POST["content3"];
			$Content4_New=$_POST["content4"];
			$Content5_New=$_POST["content5"];
			$Content6_New=$_POST["content6"];
			$Content7_New=$_POST["content7"];
		
		//DEBUG
		//echo($Content1_New);
		
		//Build SQL query
		$query = "UPDATE PROFILE
					SET Content1 = '".$Content1_New."', Content2 = '".$Content2_New."', Content3 = '".$Content3_New."',
						Content4 = '".$Content4_New."', Content5 = '".$Content5_New."', Content6 = '".$Content6_New."', Content7 = '".$Content7_New."'
					WHERE PROFILE.AuthorID = ".$_SESSION["AuthorID"];

		$result = mysqli_query($my_connection,$query);
		if($result === false) 
		{
			// Handle failure - log the error, notify administrator, etc.
			print("<p style=\"color:#666;\">Error querying Shine database</p>");
			print(mysqli_error($my_connection));
		} 
		else 
		{
			//update profile history
			$event="Updated profile";
			$query2="INSERT INTO PROFHIST VALUES (NULL, ".$_SESSION["ProfileID"].", '".date("l jS \of F Y h:i:s A")."', '".$event."')";
			$result=mysqli_query($my_connection, $query2);
			if ($result===false)
				print("<h1>Failed to update profile history - ".mysqli_connect_error()."</h1>");
			else
				print("<h1>Profie Updated</h1>");
		}			
			

		print("<a href=\"profile.php\" class=\"ButtonStyleHREF\">CONTINUE</a>");		
	?>
	
</body>
</html>