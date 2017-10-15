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

        <?php include 'html_includes/header_nav.inc'; ?>
	  
		<main role="main">
			<?php
				//If Author has pressed Submit, show Profile`
				if(isset($_POST["submit"]))
				{
					//GetProfileID
					$_SESSION["ProfileID"]=$_POST["ProfileID"];
					include("php_includes/showProfile.php");
				}// end if
				else
				//If Author has NOT pressed Submit yet - prompt user to select a Profile to display
				{
					//Check how many Profiles Author has
					$query="SELECT AUTHOR.AuthorID, PROFILE.ProfileID, PROFILE.FirstName, PROFILE.LastName	
								FROM AUTHOR, PROFILE 
								WHERE AUTHOR.AuthorID=".$_SESSION["AuthorID"];
					$result = mysqli_query($my_connection,$query);
					if($result === false)
					{
						// Handle failure - log the error, notify administrator, etc.
						print("<p style=\"color:#FFFFFF;\">Error querying Shine database</p>");
					} 
					else 
					//Display Profile(s)
					{
						$numProfiles =mysqli_num_rows($result);
						switch($numProfiles)
						{	
							//If Author has 1 Profile => Show Profile
							case "1": 	$row=mysqli_fetch_row($result);
										$_SESSION["ProfileID"]=$row[1];
										include 'php_includes/showProfile.php';
										break;
										
							//If Author has no Profiles
							case "0": print("Please create a profile");
							
							//If Author has multiple Profiles
							default: 
								//Prompt for which profile to display
								print("<p>Select a Profile to view:</p>");
								//Fetch first row of Profiles
								$profileRow=mysqli_fetch_row($result);

								//Create self-targetting form / dropdown menu
								print("<form name='profiles' id='profiles' action='profile.php' method='post'>");
									print("<select name=\"ProfileID\">");
									for ($i=0; $i<$numProfiles; $i++)
									{
										//Element0=AuthorID; Element1=ProfileID; Element2=FirstName; Element3=LastName <= See order of elements in $query
										print("<option value='".$profileRow[1]."'>".$profileRow[2]."</option>");
										$profileRow=mysqli_fetch_row($result);
									}
									print("</select>");
									print("<br /><input type='submit' name='submit' value='Submit'>");
								print("</form>");
						} //end switch
					} // end else
				}//end else
			?>
		</main>
        <?php include 'html_includes/footer.inc'; ?>
	</div>
</body>
</html>