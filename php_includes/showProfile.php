	<?php
		//Extract Profile Data
		$query="SELECT Content1, Content2, Content3, Content4, Content5, Content6, Content7, Content8
				FROM PROFILE WHERE ProfileID = ".$_SESSION["ProfileID"];
		$result = mysqli_query($my_connection, $query);
		$row = mysqli_fetch_row($result);
		if ($result===NULL){
				print("<p>Error connecting to Shine Database</p>");	
		}
		else {
			//Create session variables
			$_SESSION["Content1"]=$row[0];
			$_SESSION["Content2"]=$row[1];
			$_SESSION["Content3"]=$row[2];
			$_SESSION["Content4"]=$row[3];
			$_SESSION["Content5"]=$row[4];
			$_SESSION["Content6"]=$row[5];
			$_SESSION["Content7"]=$row[6];
			$_SESSION["Content8"]=$row[7];
			$_SESSION["ImagePath1"]="imgs/profiles/".$_SESSION["AuthorID"]."/profile.jpg";
	
		//Display Profile Page
		print("<div id=\"profileSection1\">");
			print("<figure>
				<img src=\"".$_SESSION['ImagePath1']."\" width=\"240\" height=\"240\" alt=\"Profile picture\">
					<figcaption>Profile picture</figcaption>
				</figure>");
			print("<font style=\"font-weight:bold;\">".$_SESSION["FirstName"]." ".$_SESSION["LastName"]."</font>");
			print("<p>DOB: ".$_SESSION["DOB"]."</p>");
			print("<p>Primary Carer: </p>");
			print("<p>Relationship with Primary Carer: </p>");
			print("<p>Primary Carer's Contact Number: </p>");
			//Should be contact no of Priary Carer - print("<p>Contact: ".$_SESSION["ContactNumber"]."</p>");
		print("</div>");
		
		print("<div id=\"profileAlert1\">");
			print("<p>Please read on to learn About Me. This information is accurate at the time you have received it and is a guide to helping me have the best day possible. </p>");

			print("<div class=\"simpleRow1\">");
				print("<p style=\"font-weight: bold;\">");
					print("General information</p>");
					print($_SESSION["Content1"]);
			print("</div>");

			print("<div class=\"simpleRow2\">");
				print("<p style=\"font-weight: bold;\">");
					print("My preferred activities, strengths, interests and motivators</p>");
					print($_SESSION["Content2"]);				
			print("</div>");						

			print("<div class=\"simpleRow1\">");
				print("<p style=\"font-weight: bold;\">");
					print("My disability</p>");
					print($_SESSION["Content3"]);				
			print("</div>");

			print("<div class=\"simpleRow2\">");
				print("<p style=\"font-weight: bold;\">");
					print("Dislikes and stressors</p>");
					print($_SESSION["Content4"]);				
			print("</div>");

			print("<div class=\"simpleRow1\">");
				print("<p style=\"font-weight: bold;\">");
					print("Communication</p>");
					print($_SESSION["Content5"]);				
			print("</div>");

			print("<div class=\"simpleRow2\">");
				print("<p style=\"font-weight: bold;\">");
					print("Medication and self care</p>");
					print($_SESSION["Content6"]);				
			print("</div>");				

			print("<div class=\"simpleRow1\">");
				print("<p style=\"font-weight: bold;\">");
					print("In addition to the above information...</p>");
					print($_SESSION["Content7"]);				
			print("</div>");

		print("</div>");
		}
	?>