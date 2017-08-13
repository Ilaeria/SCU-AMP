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
	<header role="banner">
		<div id='tag'><p>[ <a href='../php_includes/logout.php'>Sign Out</a> ]</div>
		<h1 class="headerlink"><a href="main.php">Shine Administrator</a></h1>
  	</header>
  	<nav role="navigation">
   	<ul>
      	<li><a href="main.php">Action</a></li>   	
      	<li><a href="accounts.php">Accounts</a></li>
      	<li><a href="templates.html">Planning Templates</a></li>
      	<li><a href="database.html">Database</a></li>
		</ul>
  	</nav>
  
  	<main role="main">

 		<h1>Action Items</h1>
			<p>7/3/17 - Received report of profile abuse</p>
			<p>9/3/17 - Received request for account Deactivation</p>
			<p>9/3/17 - Received request for new admin account</p>
				
	</main>
	<footer role="contentinfo">
		<a href="../contact.html" target="_blank">Contact</a> | <a href="../termsofuse.html" target="_blank">Terms of Use</a> | <a href="../privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>


