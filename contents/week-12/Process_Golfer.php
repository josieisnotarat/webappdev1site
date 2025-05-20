	<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 13 
	Date: 04/14/2025
	-->
	
	<html>
	<body>
	

	<?php
	

	// Database connection info
	$servername = "mc-itddb-12-e-1";
	$username = "jmwooldridge";
	$password = "0719681";
	$dbname = "01WAPP1400WooldridgeJ";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully<br>";

	// Declare Variables
	$strFirstName = $_POST['strFirstName'];
	$strLastName = $_POST['strLastName'];
	$strAddress = $_POST['strAddress'];
	$strCity = $_POST['strCity'];
	$intStateID = $_POST['intStateID'];
	$strZipCode = $_POST['strZipCode'];
	$strPhoneNumber = $_POST['strPhoneNumber'];
	$strEmail = $_POST['strEmail'];
	$intShirtSizeID = $_POST['intShirtSizeID'];
	$intGenderID = $_POST['intGenderID'];

	// Prepare INSERT query
	$sql = "INSERT INTO TGolfers 
	  (strFirstName, strLastName, strAddress, strCity, intStateID, strZipCode, strPhoneNumber, strEmail, intShirtSizeID, intGenderID)
	  VALUES (
	  '$strFirstName',
	  '$strLastName',
	  '$strAddress',
	  '$strCity',
	  '$intStateID',
	  '$strZipCode',
	  '$strPhoneNumber',
	  '$strEmail',
	  '$intShirtSizeID',
	  '$intGenderID')";

	if ($conn->query($sql) === TRUE) {
	  echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	
	$conn->close();
	?>



	</body>
	</html> 