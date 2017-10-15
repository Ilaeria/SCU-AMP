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
		<div id="tag">[ <a href="index.html">Sign Out</a> ]</div>
		<h1 class="headerlink" style="text-align: left"><a href="main.html">Shine</a></h1>
  	</header>
    <nav role="navigation">
        <?php include('php_includes/navigation.php') ?>
    </nav>
  
  	<main role="main">
   	
 		<h1>Share Profile</h1>
 		
 		<form action="share2.php" method="post">
			<fieldset>
				<legend>Share profile via:</legend>
				<input type="submit" name="shine" id="shine" value="Shine">
				<input type="submit" name="email" id="email" value="Email">
				<input type="submit" name="pdf" id="pdf" value="PDF">
				<!--
				The below options will be implemented in a future iteration
				<input type="submit" name="facebook" id="facebook" value="Facebook" disabled="disabled">
				<input type="submit" name="twitter" id="twitter" value="Twitter" disabled="disabled">
				-->
				<a href="profile.php" class="ButtonStyleHREF">Cancel</a>	
				
			</fieldset>
		</form>
		<br /><br /><br /><br />
	</main>
	<footer role="contentinfo">
		<a href="contact.html" target="_blank">Contact</a> | <a href="termsofuse.html" target="_blank">Terms of Use</a> | <a href="privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>


