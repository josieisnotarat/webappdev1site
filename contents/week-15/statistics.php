<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Golfer Statistics Page
-->

<html>
<head>
    <title>Golfer Statistics</title>
    <link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Golfer Statistics</h2>

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

// get current event
$eventResult = $conn->query("SELECT MAX(intEventID) AS intEventID FROM TEvents");
$eventRow = $eventResult->fetch_assoc();
$intEventID = $eventRow['intEventID'];

// total pledged
$sqlTotal = "
SELECT SUM(decPledgePerHole) AS totalPledged
FROM TEventGolferSponsors S
JOIN TEventGolfers EG ON S.intEventGolferID = EG.intEventGolferID
WHERE EG.intEventID = $intEventID
";
$total = $conn->query($sqlTotal)->fetch_assoc()['totalPledged'] ?? 0;

// total donations
$sqlCount = "
SELECT COUNT(*) AS donationCount
FROM TEventGolferSponsors S
JOIN TEventGolfers EG ON S.intEventGolferID = EG.intEventGolferID
WHERE EG.intEventID = $intEventID
";
$donationCount = $conn->query($sqlCount)->fetch_assoc()['donationCount'] ?? 0;

// average donation
$avgDonation = $donationCount > 0 ? $total / $donationCount : 0;

// display summary
echo "<ul>
    <li><strong>Total Pledged:</strong> $" . number_format($total, 2) . "</li>
    <li><strong>Total Donations:</strong> $donationCount</li>
    <li><strong>Average Donation:</strong> $" . number_format($avgDonation, 2) . "</li>
</ul>";

// table of golfers
$sqlGolfers = "
SELECT 
    EG.intEventGolferID,
    G.strFirstName,
    G.strLastName,
    SUM(S.decPledgePerHole) AS totalPledged
FROM TEventGolferSponsors S
JOIN TEventGolfers EG ON S.intEventGolferID = EG.intEventGolferID
JOIN TGolfers G ON EG.intGolferID = G.intGolferID
WHERE EG.intEventID = $intEventID
GROUP BY EG.intEventGolferID
ORDER BY totalPledged DESC
";
$result = $conn->query($sqlGolfers);

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>
            <tr>
                <th>Golfer</th>
                <th>Total Pledged</th>
                <th>Donors</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['strFirstName']} {$row['strLastName']}</td>
                <td>$" . number_format($row['totalPledged'], 2) . "</td>
                <td><a href='donors.php?intEventGolferID={$row['intEventGolferID']}'>View Donors</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No golfer data found for this event.</p>";
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
