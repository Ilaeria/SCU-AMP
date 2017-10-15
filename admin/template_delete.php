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

 		<h1>Choose a template to delete:</h1>
		<ul id="templates_ul">
			<li><input type="checkbox" id="t1">&nbsp; Template 1</li>
			<li><input type="checkbox" id="t2">&nbsp; Template 2</li>
			<li><input type="checkbox" id="t3">&nbsp; Template 3</li>
		</ul>

			<input type="button" value="Delete Planning Template" onclick="window.location.href='templates.php'"><br />
			<br /><br /><br />												
				
	</main>
    <?php include '../html_includes/admin_footer.inc'; ?>
</div>
</body>
</html>


