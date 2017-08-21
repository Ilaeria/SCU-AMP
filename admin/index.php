<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	// Connect to database
	include'../php_includes/db_connect.php';
	$my_connection = db_connect();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") 
	{
		//print("<h1>Debug! - login.php - Detected POST</h1>");
		//Store logon credentials in local variables
		$email = mysqli_real_escape_string($my_connection, $_POST['email']);
		$password = mysqli_real_escape_string($my_connection, $_POST['password']); 
		
		//print("DEBUG - ".$email);
		//print("<br />DEBUG - ".$password."<br />");
		//Check logon credentials (plus other data to populate session variables)	
		$query = "SELECT StaffID, FirstName, LastName
					FROM STAFF 
					WHERE Email = \"".$email."\" AND Passwrd = \"".$password."\"";
		$result = mysqli_query($my_connection,$query);
		if($result === false) 
		{
			// Handle failure - log the error, notify administrator, etc.
			print("<p style=\"color:#FFFFFF;\">Error querying Shine database</p>");
		} 
		else 
		{
			$count =mysqli_num_rows($result);
			//print("DEBUG - Count is ".$count);
			$row = mysqli_fetch_row($result);	
			// If result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				//set login to true
				$_SESSION["admin_logged_in"] = true;
				//set session variables
				$_SESSION["admin_email"] = $email;
				$_SESSION["StaffID"] = $row[0];			
				$_SESSION["StaffFirstName"] = $row[1];
				$_SESSION["StaffLastName"] = $row[2];
				
				//navigate to main
				header("location: main.php");

				}
			else {
			 $error = "Your Login Name or Password is invalid";
			 print("<div style=\"text-align: center;\"><font style=\"color:#FFFFFF; \">".$error."</font></div>");
			}
		} //end if-else	
	} // end if
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shine Admin</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/stylesAdmin.css" media="screen">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div id="wrapper">
	<header id="headerHome">
		<h1 class="headerlink" style="text-align: center"><a href="index.html">Shine Administrator</a></h1>
  	</header>

  
  	<main id="mainHome">
		<form name="login" id="login" method="post" action="index.php">
			<fieldset>
				<legend>
					<span class="formH2">Administrator Sign in</span>	
				</legend>
				
				Email<br /><input type="email" name="email" id="email" placeholder="Your Email *" size=60><br />
				Password<br />
				<input type="password" name="password" id="password" placeholder="Your password *" size=60><br />
				<input type="submit" value="Sign in"><br />
				<span style="font-size: small;"><a href="../resetPassword.html">Forgot your password?</a></span>
			</fieldset>
		</form><br /><br />		
	
	</main>
	<footer role="contentinfo">
		<a href="../contact.html" target="_blank">Contact</a> | <a href="../termsofuse.html" target="_blank">Terms of Use</a> | <a href="../privacy.html" target="_blank">Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>