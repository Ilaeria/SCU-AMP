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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shine</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="wrapper">
		<header role="banner">		
			<div id='tag'><p>[ <a href='php_includes/logout.php'>Sign Out</a> ]</div>
			<h1 class='headerlink' style='text-align: left'><a href='main.php'>Shine</a></h1>
		</header>
		<nav role="navigation">
			<ul>
				<li><a href="profile_create.php">Create Profile</a></li>
				<li><a href="profile.php">View Profiles</a></li>
				<li><a href="edit.php">Edit Profile</a></li>
				<li><a href="share.html">Share Profile</a></li>
				<li><a href="settings.html">Settings</a></li>
				<li><a href="upgrade.html">Upgrade</a></li>
			</ul>
		</nav>
	  
		<main role="main">
			<?php
				//echo '<pre>'; var_dump($_SESSION); echo '</pre>'; //DEBUG
				print("<h1>".$_SESSION["FirstName"]."'s Shine</h1>");
				print("<h2>Recent Profile Activity</h2>");
				print("<table>");
				if (!isset($_SESSION['ProfileID']))
				//If no Profile has been selected, prompt Author to select/create a Profile
				{
					print("<h3>Please create or select a Profile to see Profile History</h3>");
				}//end if
				else
				{
					//If a Profile has been selected, build and display Profile history
					$query = "SELECT EventDate, Event
								FROM PROFHIST
								WHERE ProfileID = ".$_SESSION["ProfileID"];
					//echo("DEBUG - PROFILE_ID - ".$_SESSION['ProfileID']."<br />");	
					$result = mysqli_query($my_connection, $query);
					if ($result===false)
						print("<p>Error Querying Shine Database</p>");
					else
					{
						$num_rows = mysqli_num_rows($result);		//Get number of rows
						$num_fields = mysqli_num_fields($result); 	//Get number of columns
						$this_row = mysqli_fetch_row($result);		//Get next row
						//echo("<br />DEBUG!! - \$num_rows - ".$num_rows);
						for ($i=0; $i<$num_rows; $i++) 
						{	//for each row
							print("<tr>");
							for ($j=0; $j<$num_fields; $j++)
							{ //for each column
								print("<td>");
								if ($j===$num_fields-1)		//last field in result
									print($this_row[$j]."<br />");
								else
									print($this_row[$j]." - ");
								print("</td>");
							}//end for
							print("</tr>");	
							$this_row = mysqli_fetch_row($result);		//Get next row
						}//end for
					} //end else	
				}//end else
			?>
		</main>
		<footer role="contentinfo">
			<a href="contact.html" target="_blank">Contact</a> | <a href="termsofuse.html" target="_blank">Terms of Use</a> | <a href="privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
		</footer>
	</div>
</body>
</html>


