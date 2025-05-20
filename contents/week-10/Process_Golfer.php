	<html>
	<body>
	
	
	<!--
		Name: Josephine Wooldridge
		Class:  IT-117-400
		Abstract: Assignment 12
		Date: 04/07/2025
		-->


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

	// Display all golfers
	$sql = "SELECT * FROM TGolfers";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table border=1>";
			echo "<tr>";
			echo "<th>Golfer</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Address</th>";
			echo "<th>City</th>";
			echo "<th>State ID</th>";
			echo "<th>Zip Code</th>";
			echo "<th>Phone Number</th>";
			echo "<th>Email</th>";
			echo "<th>Shirt Size ID</th>";
			echo "<th>Gender ID</th>";
			echo "</tr>";
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";
				echo "<td>" . $row['intGolferID'] . "</td>";
				echo "<td>" . $row['strFirstName'] . "</td>";
				echo "<td>" . $row['strLastName'] . "</td>";
				echo "<td>" . $row['strAddress'] . "</td>";
				echo "<td>" . $row['strCity'] . "</td>";				
				echo "<td>" . $row['intStateID'] . "</td>";
				echo "<td>" . $row['strZipCode'] . "</td>";
				echo "<td>" . $row['strPhoneNumber'] . "</td>";
				echo "<td>" . $row['strEmail'] . "</td>";
				echo "<td>" . $row['intShirtSizeID'] . "</td>";
				echo "<td>" . $row['intGenderID'] . "</td>";
				echo "</tr>";
			}
			echo "</table>";
			mysqli_free_result($result);
		} else {
			echo "No records matching your query were found.";
		}
	} else {
		echo "ERROR: $sql. " . mysqli_error($conn);
	}




	$conn->close();
	?>




	</body>
	</html> 