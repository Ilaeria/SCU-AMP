				//Create session variables
				$_SESSION[Content1]=$row[0];
				$_SESSION[Content2]=$row[1];
				$_SESSION[Content3]=$row[2];
				$_SESSION[Content4]=$row[3];
				$_SESSION[Content5]=$row[4];
				$_SESSION[Content6]=$row[5];
				$_SESSION[Content7]=$row[6];
				$_SESSION[ImagePath1]=imgs/profiles/.$_SESSION[AuthorID]./profile.jpg;
		
		
		
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
	<meta charset=utf-8>
	<link rel=stylesheet href=css/styles.css media=screen>
	<meta name=viewport content=width=device-width, initial-scale=1.0>
</head>
<body>

<div id=wrapper>
	<header role=banner>
		<div id=tag>[ <a href=index.html>Sign Out</a> ] </div>
		<h1 class=headerlink style=text-align: left><a href=main.php>Shine</a></h1>
  	</header>

	<nav role=navigation>
		<ul>
			<li><a href=profile.php>View Profile</a></li>
			<li><a href=edit.php>Edit Profile</a></li>
			<li><a href=share.html>Share Profile</a></li>
			<li><a href=settings.html>Settings</a></li>
			<li><a href=upgrade.html>Upgrade</a></li>
		</ul>
  	</nav>
  
  	<main role=main>
		<h1>Create a Profile</h1>
		<form method="post" action="profile_create2.php">
			<figure>
				<img src="imgs/profile.jpg" width="240" height="240" alt="Profile picture">
				<figcaption>Upload a profile image</figcaption>
			</figure>		

			<input type="submit" value="Save">
			<input type="reset">
			<a href="profile.php" class="ButtonStyleHREF">Cancel</a>

			<p>Primary Carer: </p>
			<p>Relationship with Primary Carer: </p>
			<p>Primary Carer's Contact Number: </p>
			
			<div id="profileAlert1">
				<p>Please read on to learn About Me. This information is accurate at the time you have received it and is a guide to helping me have the best day possible. </p>
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
			
			<input type=\submit\ value=\Save\>
			<input type=\reset\>
			<a href=\profile.php\ class=\ButtonStyleHREF\>Cancel</a>		
		</form>
	</main>
	<footer role=contentinfo>
		<a href=contact.html target=_blank>Contact</a> | <a href=termsofuse.html target=_blank>Terms of Use</a> | <a href=privacy.html target=_blank>Privacy Statement</a><br />Copyright &copy; 2017
	</footer>
</div>
</body>
</html>