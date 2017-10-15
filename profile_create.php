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
<html lang=en>
<head>
	<title>Create a Profile</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/styles.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div id="wrapper">

        <?php include 'html_includes/header_nav.inc'; ?>
	  
		<main role="main">
			<h1>Create a Profile</h1>
				
			<form method="post" action="profile_create2.php">
				<input type="submit" value="Save">
				<input type="reset">
				<a href="profile.php" class="ButtonStyleHREF">Cancel</a>

				<figure>
					<img src="imgs/profile.jpg" width="240" height="240" alt="Profile picture" />
					<figcaption>Upload a profile image</figcaption>
				</figure>		

				First Name: <input type="text" name="fName"><br />
				Last Name: <input type="text" name="lName"><br />
				Primary Carer: <input type="text" name="primaryCarer"><br />
				Relationship with Primary Carer: <input type="text" name="relationship"><br />
				Primary Carer's Contact Number: <input type="text" name="carerContactNum"><br /><br />
				
				<div id="profileCreate">
					<div class="simpleRow1">
						<p style="font-weight: bold">General information</p>
						<textarea name="content1" rows="10"></textarea>	
					</div>

					<div class="simpleRow2">
						<p style="font-weight: bold;">My preferred activities, strengths, interests and motivators</p>
						<textarea name="content2" rows="10"></textarea>			
					</div>						

					<div class="simpleRow1">
						<p style="font-weight: bold;">My disability</p>
						<textarea name="content3" rows="10"></textarea>
					</div>

					<div class="simpleRow2">
						<p style="font-weight: bold;">Dislikes and stressors</p>
						<textarea name="content4" rows="10"></textarea>
					</div>

					<div class="simpleRow1">
						<p style="font-weight: bold;">Communication</p>
						<textarea name="content5" rows="10"></textarea>			
					</div>

					<div class="simpleRow2">
						<p style="font-weight: bold;">Medication and self care</p>
						<textarea name="content6" rows="10"></textarea>			
					</div>				

					<div class="simpleRow1">
						<p style="font-weight: bold;">In addition to the above information...</p>
						<textarea name="content7" rows="10" ></textarea>			
					</div>
				</div>
				
				<input type="submit" value="Save">
				<input type="reset">
				<a href="profile.php" class="ButtonStyleHREF">Cancel</a>		
			</form>
		</main>
        <?php include 'html_includes/footer.inc'; ?>
	</div>
</body>
</html>