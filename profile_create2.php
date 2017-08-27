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
	include 'php_includes/db_connect.php';
	$my_connection = db_connect();	
?>

<html>
<head>
	<title>Create Profile</title>
</head>
<body>

	<?php
		//Capture values posted from profile_create.php
			$Content1=$_POST["content1"];
			$Content2=$_POST["content2"];
			$Content3=$_POST["content3"];
			$Content4=$_POST["content4"];
			$Content5=$_POST["content5"];
			$Content6=$_POST["content6"];
			$Content7=$_POST["content7"];
		
		//DEBUG
		//echo($Content1_New);
		
		//Build Query
		$query = "INSERT INTO PROFILE (AuthorID, Content1, Content2, Content3, Content4, Content5, Content6, Content7) 
					VALUES (".$_SESSION["AuthorID"].",'".$Content1."', '".$Content2."', '".$Content3."',
						'".$Content4."', '".$Content5."', '".$Content6."', '".$Content7."')";
	
		//Execute Query
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
			$query2="INSERT INTO PROFHIST VALUES (NULL, ".$_SESSION["ProfileID"].", '".date('l jS \of F Y h:i:s A')."', '".$event."')";
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