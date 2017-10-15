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
 		<h1>Settings</h1><br />
		<form method="post" action="main.html">
			<fieldset>
				<legend><span class="formH2">Colour</span></legend>
				<input type="radio" name="colour" id="standard" value="standard">Standard</input>
				<input type="radio" name="colour" id="large" value="large">High Contrast</input>	
			</fieldset><br /><br />
				
			<fieldset>
				<legend><span class="formH2">Font</span></legend>
				<input type="radio" name="font" id="standard" value="standard">Standard</input>
				<input type="radio" name="font" id="large" value="large">Large</input>	
			</fieldset><br /><br />

			<fieldset>
				<legend><span class="formH2">Sound</span></legend>
				<input type="radio" name="sound" id="standard" value="standard">On</input>
				<input type="radio" name="sound" id="large" value="large">Off</input>	
			</fieldset><br /><br />
			<input type="submit" value="Save" id="save">
			<input type="submit" value="Cancel" id="cancel">
		</form>
		
	</main>
    <?php include 'html_includes/footer.inc'; ?>
</div>
</body>
</html>


