
<!--
Name: Josephine Wooldridge
Class:  IT-117-400
Abstract: Assignment 13 
Date: 04/14/2025
-->



<html>

<head>
	<title>Update Golfer</title>

	<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 13
	Date: 04/14/2025
	-->
</head>

<body>
	Name: Josephine Wooldridge <br>
	Class:  IT-117-400 <br>
	Abstract: Assignment 13
	<hr>
	<h2>Update Golfer</h2>
	

	<?php
	$servername = "mc-itddb-12-e-1";
	$username = "jmwooldridge";
	$password = "0719681";
	$dbname = "01WAPP1400WooldridgeJ";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$intGolferID = $_GET['intGolferID'];	
	$result = mysqli_query($conn, "SELECT * FROM TGolfers WHERE intGolferID = $intGolferID");
	$row = mysqli_fetch_assoc($result);

	$Genders = mysqli_query($conn, "SELECT intGenderID, strGender FROM TGenders");
	$States = mysqli_query($conn, "SELECT intStateID, strState FROM TStates");
	$ShirtSizes = mysqli_query($conn, "SELECT intShirtSizeID, strShirtSize FROM TShirtSizes");
	?>

	<form action="process_updateplayer.php" method="post">
		<input type="hidden" name="intGolferID" value="<?php echo $row['intGolferID']; ?>">
		<table border="1px solid black" style="color:blue;" bgcolor="powderblue">
			<tr>
				<td>First Name:</td>
				<td><input type="text" name="strFirstName" value="<?php echo $row['strFirstName']; ?>" required></td>
			</tr>
			<tr>
				<td>Last Name:</td>
				<td><input type="text" name="strLastName" value="<?php echo $row['strLastName']; ?>" required></td>
			</tr>
			<tr>
				<td>Address:</td>
				<td><input type="text" name="strAddress" value="<?php echo $row['strAddress']; ?>" required></td>
			</tr>
			<tr>
				<td>City:</td>
				<td><input type="text" name="strCity" value="<?php echo $row['strCity']; ?>" required></td>
			</tr>
			<tr>
				<td>State:</td>
				<td>
					<select name="intStateID" required>
						<option value="">Select State</option>
						<?php
						while ($state = mysqli_fetch_assoc($States)) {
							$selected = ($state["intStateID"] == $row["intStateID"]) ? "selected" : "";
							echo "<option value='{$state["intStateID"]}' $selected>{$state["strState"]}</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Zip Code:</td>
				<td><input type="text" name="strZipCode" value="<?php echo $row['strZipCode']; ?>" required></td>
			</tr>
			<tr>
				<td>Phone Number:</td>
				<td><input type="text" name="strPhoneNumber" value="<?php echo $row['strPhoneNumber']; ?>" required></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="email" name="strEmail" value="<?php echo $row['strEmail']; ?>" required></td>
			</tr>
			<tr>
				<td>Shirt Size:</td>
				<td>
					<select name="intShirtSizeID" required>
						<option value="">Select Shirt Size</option>
						<?php
						while ($shirt = mysqli_fetch_assoc($ShirtSizes)) {
							$selected = ($shirt["intShirtSizeID"] == $row["intShirtSizeID"]) ? "selected" : "";
							echo "<option value='{$shirt["intShirtSizeID"]}' $selected>{$shirt["strShirtSize"]}</option>";
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td>
					<select name="intGenderID" required>
						<option value="">Select Gender</option>
						<?php
						while ($gender = mysqli_fetch_assoc($Genders)) {
							$selected = ($gender["intGenderID"] == $row["intGenderID"]) ? "selected" : "";
							echo "<option value='{$gender["intGenderID"]}' $selected>{$gender["strGender"]}</option>";
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
					<button type="submit">Update Golfer</button>
				</td>
			</tr>
		</table>
	</form>

	<p><a href="showgolfers.php">Back to Golfer List</a></p>
	<p><a href="/WAPP1-WooldridgeJ/contents/week-12/index.php"> Back to Home </a></p><br>	
	<p><a href="/WAPP1-WooldridgeJ/index.htm">Back to Homework  (for your grading convenience) </a></p>


</body>
</html>
