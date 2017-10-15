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
    <?php include 'html_includes/guest_header.inc'; ?>

  	<main id="mainHome">
		<form name="join" id="join" method="post" action="join2.php">
			  <fieldset>
				  <legend><span class="formH2">Name</span></legend>			  
				  <label>Surname:</label><input type="text" name="surname" id="surname" size = "50" maxlength = "50" required />*<br />
				  <label>Other names:</label><input type="text" name="othername" id="othername" size = "50" maxlength = "60" required />*
			  </fieldset>
			  <br /><br />


			  <fieldset><legend><span class="formH2">Email and Password:</span></legend>
				  <div>
					  <label>Email:</label>
					  <input type="text" name="email" id="email" size = "50" maxlength = "100"
					  placeholder="This will be your username for Shine" required />*

				  </div>
			
				  <div id ="passwordrow">
						  <label>Password:</label>
						  <input type="password" name="userpass" id="userpass" size = "35" maxlength = "20" required 
						  placeholder = "Must contain at least 1 digit and 1 CAPS"/>*
				  </div>
				  <div id ="passwordrow">
					  <label>Verify password:</label>
					 	 <input type="password" name="verifypass" id="verifypass" size = "15" maxlength = "40" required />*
				  </div>                  
			  </fieldset><br /><br />                                                          

	  
			  <fieldset><legend><span class="formH2">Contact Details</span></legend>
				  	<div id ="phonerow">
						<label>Phone:</label>
					  	<input type="text" name="phonenum" id="phonenum" size = "45" maxlength = "13" 
					  		placeholder="Use DIGITS only - e.g. 0458123456, 0212345678" required />
					  	<span class = "requiredmarker" id = "phonemarker">*</span>                  
				  	</div>
				  	
			  </fieldset><br /><br />
			  
 
			  <fieldset id="formaddress">
				  <legend><span class="formH2">Address:</span></legend>
				  <div id ="streetrow">
						<label>Street address:</label>
						<input type="text" name="streetaddr" id="streetaddr" size = "50" maxlength = "50" 
							placeholder="Please enter house number and street address"  />
				  </div>
				  <div id ="cityrow">
						<label>City</label>
						<input type="text" name="city" id="city" size = "50" maxlength = "30" 
							placeholder = "Please enter city" />
				  </div>                     
				  <div id ="staterow">
						<label>State</label>
						<input type="text" name="state" id="state" size = "50" maxlength = "30" 
							placeholder = "Please enter state" />
				  </div>
				  <div id ="postcoderow">
						<label>Postcode:</label>
						<input type="text" name="postcode" id="postcode" size = "4" maxlength = "4"  />
						
					</div>
			  </fieldset>       
			  <p>* = Compulsory field</p>
			  <div id="formbuttons">
				  <input type="submit" name = "submit" id = "submit" value="Join Shine now"/>&nbsp;&nbsp;
				  <input type="reset" />
			  </div>
		  </form>
		
		<!-- Register event handlers -->
		<script type = "text/javascript" src = "scripts/register_form_events.js"></script>
	</main>
    <?php include 'html_includes/footer.inc'; ?>
</div>
</body>
</html>