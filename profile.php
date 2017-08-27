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
		<div id="tag">[ <a href="index.html">Sign Out</a> ] </div>
		<h1 class="headerlink" style="text-align: left"><a href="main.php">Shine</a></h1>
  	</header>

	<nav role="navigation">
		<ul>
			<li><a href="profile.php">View Profile</a></li>
			<li><a href="edit.php">Edit Profile</a></li>
			<li><a href="share.html">Share Profile</a></li>
			<li><a href="settings.html">Settings</a></li>
			<li><a href="upgrade.html">Upgrade</a></li>
		</ul>
  	</nav>
  
  	<main role="main">
		<?php
			/*Application logic is as follows
			Check how many profiles author has
			IF one profile
				show profile
			ELSE IF multiple profiles
				PROMPT(select a profile)
			ELSE IF NO profiles
				PROMPT (Create a profile)
			*/

			//Check how many Profiles Author has
			$query="SELECT AUTHOR.AuthorID, PROFILE.ProfileID
						FROM AUTHOR, PROFILE 
						WHERE AUTHOR.AuthorID=".$_SESSION["AuthorID"];
			$result = mysqli_query($my_connection,$query);
			if($result === false)
			{
				// Handle failure - log the error, notify administrator, etc.
				print("<p style=\"color:#FFFFFF;\">Error querying Shine database</p>");
			} 
			else 
			{
				$numProfiles =mysqli_num_rows($result);
				$row = mysqli_fetch_row($result);
				// If result matched $myusername and $mypassword, table row must be 1 row
				if($numProfiles == 1) 
				{
					//Show profile
					include 'php_includes/showProfile.php';
				}
				else if ($numProfiles > 1)					
				{
					//Prompt which profile to display
					
					print("<p>Select a profile</p>");
					//Fetch first row of Profiles
					$profileRow=mysqli_fetch_row($result);
					
					//Create dropdown menu
					print("<select name=\"profileList\">");
					for ($i=0; $i<$numProfiles; $i++)
					{
						print("<option value=\"".$profileRow[1]."\"> ".$profileRow[1]."</option>");
						$profileRow=mysqli_fetch_row($result);
					}
					print("</select>");
				}
				else
				{
					//No profiles - prompt Author to create one
				}					
			} // end else
		?>
				
			

	</main>
	<footer role="contentinfo">
		<a href="contact.html" target="_blank">Contact</a> | <a href="termsofuse.html" target="_blank">Terms of Use</a> | <a href="privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>