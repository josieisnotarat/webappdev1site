<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Process Donation Submission
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
$decPledgePerHole = $_POST['decPledgePerHole'];
$intPaymentTypeID = $_POST['intPaymentTypeID'];

// set payment status
$intPaymentStatusID = ($intPaymentTypeID == 3) ? 1 : 2;

// insert sponsor
$sqlSponsor = "
INSERT INTO TSponsors (
    strFirstName, strLastName, strAddress, strCity,
    intStateID, strZipCode, strPhoneNumber, strEmail
) VALUES (
    '$strFirstName', '$strLastName', '$strAddress', '$strCity',
    $intStateID, '$strZipCode', '$strPhoneNumber', '$strEmail'
)";

if ($conn->query($sqlSponsor) === TRUE) {
    $intSponsorID = $conn->insert_id;
    echo "<p>Sponsor added successfully.</p>";
} else {
    echo "<p>Error adding sponsor: " . $conn->error . "</p>";
}

// get current event
$sqlEvent = "SELECT MAX(intEventID) AS intEventID FROM TEvents";
$resultEvent = $conn->query($sqlEvent);
$rowEvent = $resultEvent->fetch_assoc();
$intEventID = $rowEvent['intEventID'];

// get event-golfer ID
$sqlEGID = "
SELECT intEventGolferID 
FROM TEventGolfers 
WHERE intGolferID = $intGolferID AND intEventID = $intEventID
";
$resultEGID = $conn->query($sqlEGID);
$rowEGID = $resultEGID->fetch_assoc();
$intEventGolferID = $rowEGID['intEventGolferID'];

// insert donation
$sqlLink = "
INSERT INTO TEventGolferSponsors (
    intEventGolferID, intSponsorID, dtmDateOfPledge,
    decPledgePerHole, intPaymentTypeID, intPaymentStatusID
) VALUES (
    $intEventGolferID, $intSponsorID, NOW(),
    $decPledgePerHole, $intPaymentTypeID, $intPaymentStatusID
)";

if ($conn->query($sqlLink) === TRUE) {
    echo "<p>Donation recorded successfully.</p>";
} else {
    echo "<p>Error recording donation: " . $conn->error . "</p>";
}

$conn->close();
?>

<h2>Thank You for Your Donation</h2>
<p>Your support helps our golfers and the cause they're playing for.</p>

<p>Return to:</p>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="showgolfers.php">View Golfers</a></li>
</ul>

</body>
</html>
