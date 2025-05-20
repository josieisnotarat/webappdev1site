<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: View Donors for a Golfer
-->

<html>
<head>
	<title>View Donors</title>
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

// get golfer ID
$intEventGolferID = $_GET['intEventGolferID'] ?? 0;

// if no ID, stop & report to user
if (!$intEventGolferID) {
    die("Missing Event Golfer ID.");
}

// get golfer name for heading
$sqlGolfer = "
SELECT TG.strFirstName, TG.strLastName
FROM TEventGolfers TE
JOIN TGolfers TG ON TE.intGolferID = TG.intGolferID
WHERE TE.intEventGolferID = $intEventGolferID
";

$resultGolfer = $conn->query($sqlGolfer);
if ($resultGolfer && $rowGolfer = $resultGolfer->fetch_assoc()) {
    $golferName = "{$rowGolfer['strFirstName']} {$rowGolfer['strLastName']}";
} else {
    $golferName = "Unknown Golfer";
}

echo "<h2>Donors for $golferName</h2>";

// query all donors for this event golfer
$sql = "
SELECT 
    S.intSponsorID,
    S.strFirstName,
    S.strLastName,
    EGS.decPledgePerHole,
    PT.strPaymentType,
    PS.strPaymentStatus,
    EGS.intPaymentStatusID
FROM TEventGolferSponsors EGS
JOIN TSponsors S ON EGS.intSponsorID = S.intSponsorID
JOIN TPaymentTypes PT ON EGS.intPaymentTypeID = PT.intPaymentTypeID
JOIN TPaymentStatuses PS ON EGS.intPaymentStatusID = PS.intPaymentStatusID
WHERE EGS.intEventGolferID = $intEventGolferID
ORDER BY S.strLastName, S.strFirstName
";

$result = $conn->query($sql);

// handle query failure
if (!$result) {
    die("Query error: " . $conn->error);
}

// display donor info table
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8' bgcolor='#eef'>
            <tr>
                <th>Donor Name</th>
                <th>Pledge Per Hole</th>
                <th>Payment Type</th>
                <th>Payment Status</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        $sponsorID = $row['intSponsorID'];
        $toggleLink = "togglepaymentstatus.php?intSponsorID=$sponsorID&intEventGolferID=$intEventGolferID";

        echo "<tr>
                <td>{$row['strFirstName']} {$row['strLastName']}</td>
                <td>$" . number_format($row['decPledgePerHole'] ?? 0, 2) . "</td>
                <td>{$row['strPaymentType']}</td>
                <td><a href='$toggleLink'>{$row['strPaymentStatus']}</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No donors found for this golfer.</p>";
}

$conn->close();
?>

<p><a href='manageeventgolfers.php'>Back to Event Golfers</a></p>
<p><a href='statistics.php'>Back to Statistics</a></p>

</body>
</html>
