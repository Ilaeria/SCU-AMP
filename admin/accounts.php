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
		if($_POST["criteria"]=="all")
		{
			//show all accounts
			$query = "SELECT";
		} // end if		
	} // end if
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
		<h2>Find an account</h2>
			<input type="button" value="Suspend Account">&nbsp;<input type="button" value="Deactivate Account">
			<br /><br /><br /><br />												
				
	</main>
	<footer role="contentinfo">
		<a href="../contact.html" target="_blank">Contact</a> | <a href="../termsofuse.html" target="_blank">Terms of Use</a> | <a href="../privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>


