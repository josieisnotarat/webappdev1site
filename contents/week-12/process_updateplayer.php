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
$intGolferID = $_POST['intGolferID'];
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

// Prepare UPDATE query
$sql = "UPDATE TGolfers SET 
  strFirstName = '$strFirstName',
  strLastName = '$strLastName',
  strAddress = '$strAddress',
  strCity = '$strCity',
  intStateID = '$intStateID',
  strZipCode = '$strZipCode',
  strPhoneNumber = '$strPhoneNumber',
  strEmail = '$strEmail',
  intShirtSizeID = '$intShirtSizeID',
  intGenderID = '$intGenderID'
  WHERE intGolferID = $intGolferID";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully<br>";
  echo "<a href='showgolfers.php'>Return to Golfer List</a>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</body>
</html>
