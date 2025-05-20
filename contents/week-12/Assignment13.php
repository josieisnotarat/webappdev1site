<!--
Name: Josephine Wooldridge
Class:  IT-117-400
Abstract: Assignment 13 
Date: 04/14/2025
-->
	
	
	<html>

	<head>
	<title>My Template</title>


	</head>

	<body>
	Name: Josephine Wooldridge <br>
	Class:  IT-117-400 <br>
	Abstract: Assignment 13
 	
	
	
	<?php

	//Connect to MySQL
	$servername = "mc-itddb-12-e-1";
	$username = "jmwooldridge";
	$password = "0719681";
	$dbname = "01WAPP1400WooldridgeJ";

	//Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	//Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}



	$Genders = mysqli_query($conn, "SELECT intGenderID, strGender FROM TGenders");
	$States = mysqli_query($conn, "SELECT intStateID, strState FROM TStates");
	$ShirtSizes = mysqli_query($conn, "SELECT intShirtSizeID, strShirtSize FROM TShirtSizes");
	?>
	
		

		<hr>
		<h2>Golfer Registration</h2>
		<h3>1) - Golfers PHP Form</h3>

		<form action="Process_Golfer.php" method="post">
			<table border="1px solid black" style="color:blue;" bgcolor="powderblue">
				<tr>
					<td>First Name:</td>
					<td><input type="text" name="strFirstName" required></td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input type="text" name="strLastName" required></td>
				</tr>
				<tr>
					<td>Address:</td>
					<td><input type="text" name="strAddress" required></td>
				</tr>
				<tr>
					<td>City:</td>
					<td><input type="text" name="strCity" required></td>
				</tr>
				<tr>
					<td><label for="intStateID">State: </label></td>
					<td>
						<select name="intStateID" required>
							<option value="">Select State</option>
							<?php
							if (mysqli_num_rows($States) > 0) {
								while($row = mysqli_fetch_assoc($States)) {
									echo "<option value ='".$row["intStateID"]."'>" .$row["strState"]. "</option>";
								}
							} else {
								echo "0 results";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Zip Code:</td>
					<td><input type="text" name="strZipCode" required></td>
				</tr>
				<tr>
					<td>Phone Number:</td>
					<td><input type="text" name="strPhoneNumber" required></td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input type="email" name="strEmail" required></td>
				</tr>
				<tr>
					<td><label for="intShirtSizeID">Shirt Size: </label></td>
					<td>
						<select name="intShirtSizeID" required>
							<option value="">Select Shirt Size</option>
							<?php
							if (mysqli_num_rows($ShirtSizes) > 0) {
								while($row = mysqli_fetch_assoc($ShirtSizes)) {
									echo "<option value ='".$row["intShirtSizeID"]."'>" .$row["strShirtSize"]. "</option>";
								}
							} else {
								echo "0 results";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for="intGenderID">Gender: </label></td>
					<td>
						<select name="intGenderID" required>
							<option value="">Select Gender</option>
							<?php
							if (mysqli_num_rows($Genders) > 0) {
								while($row = mysqli_fetch_assoc($Genders)) {
									echo "<option value ='".$row["intGenderID"]."'>" .$row["strGender"]. "</option>";
								}
							} else {
								echo "0 results";
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="right" colspan="2">* All Fields Required.</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<button>Submit</button>
					</td>
				</tr>
			</table>
		</form>





	<p><a href="/WAPP1-WooldridgeJ/contents/week-12/index.php"> Back to Home </a></p><br>
	<p><a href="/WAPP1-WooldridgeJ/index.htm">Back to Homework  (for your grading convenience) </a></p>

	</body>
	</html>

