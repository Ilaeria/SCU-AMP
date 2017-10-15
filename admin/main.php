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
	<title>Shine</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stylesAdmin.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="wrapper">

    <?php include '../html_includes/admin_header_nav.inc'; ?>
  
  	<main role="main">

 		<h1>Action Items</h1>
			<p>7/3/17 - Received report of profile abuse</p>
			<p>9/3/17 - Received request for account Deactivation</p>
			<p>9/3/17 - Received request for new admin account</p>
				
	</main>
    <?php include '../html_includes/admin_footer.inc'; ?>
</div>
</body>
</html>


