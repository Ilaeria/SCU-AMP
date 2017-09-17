<!--
	Name: 				author.php
	Author: 			Stephen Manning
	Date: 				16/9/17
	Description: 		Allows user to search for Author by Author ID, Email or LastName;
						Displays results in table with hyperlinks to AuthorEditScreen (author2.php)
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
	<title>Shine - Authors</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stylesAdmin.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="wrapper">
	<header role="banner">
		<div id="tag">[ <a href="index.html">Sign Out</a> ]</div>
		<h1 class="headerlink"><a href="main.php">Shine Administrator</a></h1>
  	</header>
  	<nav role="navigation">
   	<ul>
      	<li><a href="main.php">Action</a></li>   	
      	<li><a href="author.php">Authors</a></li>
      	<li><a href="profiles.php">Profiles</a></li>		
      	<li><a href="templates.html">Planning Templates</a></li>
      	<li><a href="database.html">Database</a></li>
	</ul>
  	</nav>
  
  	<main role="main">
 		<h1>Author Administration</h1>
		<form method="post" action="author.php">
			<fieldset>
				<legend>Find an Author</legend>
				Search by: <br />
				AuthorID<input type="radio" name="criteria" value="searchAuthorByAuthorID" check="checked"><br />
				Email<input type="radio" name="criteria" value="searchAuthorByEmail"><br />
				Last Name<input type="radio" name="criteria" value="searchAuthorByLastName"><br />
				<input type="text" name="AuthorSearch">
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
				case "searchAuthorByAuthorID":  $query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
															AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
															FROM AUTHOR
															WHERE AUTHOR.AuthorID = ".$_POST["AuthorSearch"];	
												break;
												
				case "searchAuthorByEmail":	$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
															AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
															FROM AUTHOR
															WHERE AUTHOR.Email LIKE '%".$_POST["AuthorSearch"]."%'";
												break;

				case "searchAuthorByLastName":	$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
															AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
															FROM AUTHOR
															WHERE AUTHOR.LastName LIKE '%".$_POST["AuthorSearch"]."%'";	
												break;
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
				$num_rows=mysqli_num_rows($result);
				$row=mysqli_fetch_row($result);
				$num_fields=sizeof($row);
				
				//Display list of results with hyperlinks
				//DEBUG - print($num_rows);
				print("<table><tr><th>Email</th><th>Name</th></tr>");
				for($i=0;$i<$num_rows;$i++) 
				{
					$profileURL="author2.php?AuthorID=".$row[0];
					print("<tr><td><a href='".$profileURL."'>".$row[1]."</a></td><td><a href='".$profileURL."'>".$row[3]." ".$row[4]."</a></td></tr>");
					$row=mysqli_fetch_row($result);
				}//end for
				print("</table>");
			} // end else
		} // end if		
	?>
		
	</main>
	<footer role="contentinfo">
		<a href="../contact.html" target="_blank">Contact</a> | <a href="../termsofuse.html" target="_blank">Terms of Use</a> | <a href="../privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>