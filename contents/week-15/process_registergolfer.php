<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Process Golfer Registration
-->

<html>
<head>
    <title>Thank You for Donating</title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
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

// get form input
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

// insert golfer
$sqlGolfer = "
INSERT INTO TGolfers (
    strFirstName, strLastName, strAddress, strCity,
    intStateID, strZipCode, strPhoneNumber, strEmail,
    intShirtSizeID, intGenderID
) VALUES (
    '$strFirstName', '$strLastName', '$strAddress', '$strCity',
    $intStateID, '$strZipCode', '$strPhoneNumber', '$strEmail',
    $intShirtSizeID, $intGenderID
)";

if ($conn->query($sqlGolfer) === TRUE) {
    $intGolferID = $conn->insert_id;
    echo "<h2>New golfer added successfully.</h2>";

    // get current event ID
    $sqlEvent = "SELECT MAX(intEventID) AS intEventID FROM TEvents";
    $resultEvent = $conn->query($sqlEvent);
    $rowEvent = $resultEvent->fetch_assoc();
    $intEventID = $rowEvent['intEventID'];

    // link golfer to event
    $sqlLink = "INSERT INTO TEventGolfers (intEventID, intGolferID) VALUES ($intEventID, $intGolferID)";
    if ($conn->query($sqlLink) === TRUE) {
        echo "<p>Golfer linked to event successfully.</p>";
    } else {
        echo "<p>Error linking golfer to event: " . $conn->error . "</p>";
    }

} else {
    echo "<p>Error inserting golfer: " . $conn->error . "</p>";
}

$conn->close();
?>

<p>Return to:</p>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="showgolfers.php">View Golfers</a></li>
</ul>

</body>
</html>
