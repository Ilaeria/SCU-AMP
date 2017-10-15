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
        <?php include 'html_includes/footer.inc'; ?>
	</div>
</body>
</html>


