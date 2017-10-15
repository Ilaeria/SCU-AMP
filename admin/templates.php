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

 		<h1>Templates</h1>
			<input type="button" value="Create Planning Template" onclick="window.location.href='template_create.php'">&nbsp;
			<input type="button" value="Edit Planning Template" onclick="window.location.href='template_edit.php'">&nbsp;
			<input type="button" value="Delete Planning Template" onclick="window.location.href='template_delete.php'"><br />
			<br /><br /><br />												
				
	</main>
    <?php include '../html_includes/admin_footer.inc'; ?>
</div>
</body>
</html>


