<?php
	// Start session if not already started, to allow access to session variables
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	// Prompt user to log-in if not already logged-in
	if(!isset($_SESSION['admin_logged_in']))
	{ 
		header("Location: index.php");
	}
	
	// Connect to database
	include '../php_includes/db_connect.php';
	$my_connection = db_connect();

	
	//if admin_user has pressed submit in accounts.php form 
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		switch($_POST["criteria"])
		{
			case "searchAuthorByAuthorID":  $query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
														AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
														FROM AUTHOR
														WHERE AUTHOR.AuthorID = ".$_POST["AccountSearch"];
											break;
											
			case "searchAuthorByEmail":	$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
														AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
														FROM AUTHOR
														WHERE AUTHOR.Email = ".$_POST["AccountSearch"];
											break;

			case "searchAuthorByLastName":	$query = "SELECT AUTHOR.AuthorID, AUTHOR.Email, AUTHOR.IsActive, AUTHOR.FirstName, AUTHOR.LastName, AUTHOR.DOB, 
														AUTHOR.Street1, AUTHOR.Street2, AUTHOR.City, AUTHOR.StateAU, AUTHOR.Country, AUTHOR.ContactNumber
														FROM AUTHOR
														WHERE AUTHOR.LastName = ".$_POST["AccountSearch"];
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
	} // end if		
?>
