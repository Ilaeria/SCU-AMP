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
	<header id="headerHome">
		<h1 class="headerlink" style="text-align: center"><a href="index.php">Shine Administrator</a></h1>
  	</header>

  	<main id="mainHome">
        <form name="join" id="join" method="post" action="index.php">
            <fieldset>
                <legend><span class="formH2">Name</span></legend>
                <div>
                    <label for="surname">Surname:</label>
                    <input name="surname" id="surname" size="50" maxlength="25" pattern="[A-Za-z-'\s]+" placeholder="Please enter your surname" required aria-required="true" aria-describedby="surname-format">
                    <span id="surname-format" class="help">Required field. Letters, spaces, - or ' only. Max 25 characters.</span>
                </div>
                <div>
                    <label for="othername">Other names:</label>
                    <input name="othername" id="othername" size="50" maxlength="25" pattern="[A-Za-z-'\s]+" placeholder="Please enter your other names" required aria-required="true" aria-describedby="othername-format">
                    <span id="othername-format" class="help">Required field. Letters, spaces, - or ' only. Max 25 characters.</span>
                </div>
            </fieldset>

            <fieldset><legend><span class="formH2">Email and Password</span></legend>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" size="50" maxlength="100" placeholder="Please enter your email" required aria-required="true" aria-describedby="email-format">
                    <span id="email-format" class="help">Required field. Valid email address required. This will be your username for Shine.</span>
                </div>

                <div>
                    <label for="userpass">Password:</label>
                    <input type="password" name="userpass" id="userpass" size = "50" maxlength = "25" pattern="\S{6,25}" placeholder = "Please enter your password" required aria-required="true" aria-describedby="userpass-format">
                    <span id="othername-format" class="help">Required field. 6-25 characters.</span>
                </div>
                <div>
                    <label for="verifypass">Verify password:</label>
                    <input type="password" name="verifypass" id="verifypass" size = "50" maxlength = "25" pattern="\S{6,25}" placeholder="Please ensure passwords match" required aria-required="true" aria-describedby="verifypass-format">
                    <span id="verifypass-format" class="help">Required field. 6-25 characters. Must match the previous field.</span>
                </div>
            </fieldset>

            <fieldset><legend><span class="formH2">Contact Details</span></legend>
                <div>
                    <label for="phonenum">Phone:</label>
                    <input name="phonenum" id="phonenum" size = "50" maxlength = "25" placeholder="Use numbers only - e.g. 0400123456, 0212345678" required aria-required="true" aria-describedby="phonenum-format">
                    <span id="phonenum-format" class="help">Required field. Numbers only.</span>
                </div>
            </fieldset>

            <fieldset>
                <legend><span class="formH2">Address</span></legend>
                <div>
                    <label for="streetaddr">Street address:</label>
                    <input name="streetaddr" id="streetaddr" size="50" maxlength="25" placeholder="Please enter house number and street address" aria-describedby="streetaddr-format">
                    <span id="streetaddr-format" class="help">Street number and name. Max 25 characters.</span>
                </div>
                <div>
                    <label for="city">City:</label>
                    <input name="city" id="city" size="50" maxlength="25" placeholder="Please enter city" aria-describedby="city-format">
                    <span id="city-format" class="help">City. Max 25 characters.</span>
                </div>
                <div>
                    <label for="state">State:</label>
                    <input name="state" id="state" size="50" maxlength="25" placeholder="Please enter state" aria-describedby="state-format">
                    <span id="state-format" class="help">State. Max 25 characters.</span>
                </div>
                <div>
                    <label for="postcode">Postcode:</label>
                    <input name="postcode" id="postcode" size = "4" maxlength = "4" pattern="[0-9]{4}" aria-describedby="postcode-format">
                    <span id="postcode-format" class="help">Postcode. 4 digits only.</span>
                </div>
            </fieldset>
            <div style="text-align: left">
                <input type="submit" name="submit" id="submit" value="Join Shine Now" style="margin-left: 10px">
                <input type="reset" name="reset" id="reset" Value="Reset" style="margin-left: 10px">
            </div>
        </form>
	</main>
    <?php include '../html_includes/admin_footer.inc'; ?>
</div>
</body>
</html>


