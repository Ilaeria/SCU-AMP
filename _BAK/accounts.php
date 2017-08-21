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

	//if admin_user has pressed submit in below form
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		if($_POST["criteria"]=="searchUserID")
		{
			$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
				AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
				FROM AUTHOR
				WHERE AUTHOR.AuthorID = ".$_POST["AccountSearch"];
		} // end if

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
			
			//display results
			print("<table><tr>");
			for ($i=0; $i<$num_rows; $i++) 
			{
				print("<tr>");
				for($j=0; $j<$num_fields; $j++)
				{	
					print("<td>");
					print($row[$j]);
					print("</td>");
				}
			}
			print("</tr>");
			$row=mysqli_fetch_row($result); // get next row
		} // end else
	}		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shine - Accounts</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stylesAdmin.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="wrapper">
	<header role="banner">
		<div id="tag">[ <a href="index.html">Sign Out</a> ]</div>
		<h1 class="headerlink"><a href="main.html">Shine Administrator</a></h1>
  	</header>
  	<nav role="navigation">
   	<ul>
      	<li><a href="main.php">Action</a></li>   	
      	<li><a href="accounts.php">Accounts</a></li>
      	<li><a href="profiles.php">Profiles</a></li>		
      	<li><a href="templates.html">Planning Templates</a></li>
      	<li><a href="database.html">Database</a></li>
	</ul>
  	</nav>
  
  	<main role="main">

 		<h1>Accounts</h1>
		<h2>Dashboard</h2>
		<p>Placeholder for account Dashboard - for forthcoming iteration</p>
		<form method="post" action="accounts.php">
			<fieldset>
				<legend>Find an Account</legend>
				Search by: <br />
				Account ID<input type="radio" name="criteria" value="searchUserID" check="checked"><br />
				Email<input type="radio" name="criteria" value="searchEmail"><br />
				Last Name<input type="radio" name="criteria" value="searchLastName"><br />
				<input type="text" id="AccountSearch" name="AccountSearch"><br />
				<input type="submit" value="Submit">
			</fieldset>
			<fieldset>
				<legend>Find a Profile</legend>
				Search by: <br />
				Author ID<input type="radio" name="searchAuthor" value="searchUserID" check="checked"><br />
				Author Email<input type="radio" name="searchAuthor" value="searchEmail"><br />
				Author Last Name<input type="radio" name="searchAuthor" value="searchLastName"><br />
				Profile ID<input type="radio" name="searchAuthor" value="searchLastName"><br />
				Profile Email<input type="radio" name="searchAuthor" value="searchLastName"><br />
				Profile Last Name<input type="radio" name="searchAuthor" value="searchLastName"><br />
			</fieldset>			
			<input type="submit" name="searchAccountAuthor" value="submit">
			<!--<input type="button" value="Suspend Account">&nbsp;<input type="button" value="Deactivate Account">-->
		</form>
				
	</main>
	<footer role="contentinfo">
		<a href="../contact.html" target="_blank">Contact</a> | <a href="../termsofuse.html" target="_blank">Terms of Use</a> | <a href="../privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>