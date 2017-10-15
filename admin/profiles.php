<!--
	Name: 				profiles.php
	Author: 			Stephen Manning
	Date: 				17/9/17
	Description: 		Allows user to search for Profile by Profile ID, Profile Name, Author ID, Author Name or Author Email;
						Displays results in table with hyperlinks to ProfileEditScreen (profiles2.php)
	Pre-requisites: 	NA
	Post-requisites: 	Table of Author(s) has been outputted to screen; each entry has hyperlink to AuthorEditScreen for that Author
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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shine - Profile Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stylesAdmin.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="wrapper">
    <?php include '../html_includes/admin_header_nav.inc'; ?>
  
  	<main role="main">
 		<h1>Profile Administration</h1>
		<form method="post" action="profiles.php">
			<fieldset>
				<legend>Find a Profile</legend>
				Search by: <br />
				Profile Last Name<input type="radio" name="criteria" value="searchProfileByProfileName" check="checked"><br />
				Profile ID<input type="radio" name="criteria" value="searchProfileByProfileID" ><br />
				Author Email<input type="radio" name="criteria" value="searchProfileByAuthorEmail"><br />
				Author Last Name<input type="radio" name="criteria" value="searchProfileByAuthorName"><br />
				Author ID<input type="radio" name="criteria" value="searchProfileByAuthorID"><br />
				<input type="text" name="ProfileSearch">
			</fieldset>

			<input type="submit" name="submit" value="Submit">
			<!--<input type="button" value="Suspend Account">&nbsp;<input type="button" value="Deactivate Account">-->
		</form>
	
	<?php
		//if admin_user has pressed Submit1 button in accounts.php form 
		if(isset($_POST['submit']))
		{
			switch($_POST["criteria"])
			{
				case "searchProfileByProfileName"  	: 	$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName
															FROM AUTHOR, PROFILE
															WHERE PROFILE.LastName LIKE '%".$_POST['ProfileSearch']."%'
															AND PROFILE.AuthorID = AUTHOR.AuthorID";
														break;
														
				case "searchProfileByProfileID":  		$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName
															FROM AUTHOR, PROFILE
															WHERE PROFILE.ProfileID = ".$_POST["ProfileSearch"]."
															AND PROFILE.AuthorID = AUTHOR.AuthorID";
														break;
												
				case "searchProfileByAuthorEmail":		$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName
															FROM AUTHOR, PROFILE
															WHERE AUTHOR.Email LIKE '%".$_POST['ProfileSearch']."%'
															AND PROFILE.AuthorID = AUTHOR.AuthorID";
														break;

				case "searchProfileByAuthorName":		$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName
															FROM AUTHOR, PROFILE
															WHERE AUTHOR.LastName LIKE '%".$_POST['ProfileSearch']."%'
															AND PROFILE.AuthorID = AUTHOR.AuthorID";
														break;	
																
				case "searchProfileByAuthorID":			$query = "SELECT PROFILE.ProfileID, PROFILE.AuthorID, AUTHOR.Email, AUTHOR.FirstName, AUTHOR.LastName, PROFILE.FirstName, PROFILE.LastName
															FROM AUTHOR, PROFILE
															WHERE AUTHOR.AuthorID = ".$_POST['ProfileSearch']."
															AND PROFILE.AuthorID = AUTHOR.AuthorID";
														break;
														
				default: 								$query = "";										
			} // end switch
			
			//execute query
			$result=mysqli_query($my_connection, $query);
			if($result === false) 
			{
				// Handle failure - log the error, notify administrator, etc.
				print("<p style=\"color:#FFFFFF;\">Error querying Shine database</p>");
			} 
			else
			{
				//print("DEBUG - Query has just executed: ".$query."<br />");
				$num_rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);
				$num_fields=sizeof($row);

				//Display list of results with hyperlinks - else tell user no results found
				if ($num_rows==0)
					print("No results found");
				else
				{					
					print("<table><tr><th>Author Email</th><th>Author Name</th><th>Profile Name</th></tr>");
					for($i=0;$i<$num_rows;$i++) 
					{
						$profileURL="profiles2.php?ProfileID=".$row[0];
						print("<tr><td><a href='".$profileURL."'>".$row[2]."</a></td><td><a href='".$profileURL."'>".$row[3]." ".$row[4]."</a></td>
							<td><a href='".$profileURL."'>".$row[5]." ".$row[6]."</td></tr>");
						$row=mysqli_fetch_row($result);
					}//end for
					print("</table>");
				}//end else	
			} // end else
		} // end if		
	?>
		
	</main>
    <?php include '../html_includes/admin_footer.inc'; ?>
</div>
</body>
</html>