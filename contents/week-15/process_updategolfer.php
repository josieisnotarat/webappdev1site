<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Process Update Golfer Submission
-->

<html>
<body>

<?php
// database connection
$servername = "mc-itddb-12-e-1";
$username = "jmwooldridge";
$password = "0719681";
$dbname = "01WAPP1400WooldridgeJ";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed.");
}

// get form data
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

// update golfer in database
$sql = "
UPDATE TGolfers SET 
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
WHERE intGolferID = $intGolferID
";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Golfer record updated successfully.</h2>";
    echo "<p>Return to:</p>
          <ul>
              <li><a href='index.php'>Home</a></li>
              <li><a href='showgolfers.php'>View Golfers</a></li>
          </ul>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

</body>
</html>
