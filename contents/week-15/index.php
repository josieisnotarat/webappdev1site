<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Golf Registration Home Page
-->

<html>
<head>
    <title>Golf Registration Home</title>
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

// get latest event
$eventResult = $conn->query("SELECT MAX(intEventID) AS intEventID FROM TEvents");
$eventRow = $eventResult->fetch_assoc();
$intEventID = $eventRow['intEventID'];

// total raised
$sqlTotal = "
SELECT SUM(decPledgePerHole) AS totalRaised
FROM TEventGolferSponsors
JOIN TEventGolfers USING (intEventGolferID)
WHERE intEventID = $intEventID
";
$resultTotal = $conn->query($sqlTotal);
$totalRaised = $resultTotal->fetch_assoc()['totalRaised'] ?? 0;

// top golfer
$sqlTop = "
SELECT G.strFirstName, G.strLastName, SUM(S.decPledgePerHole) AS total
FROM TEventGolferSponsors S
JOIN TEventGolfers EG ON S.intEventGolferID = EG.intEventGolferID
JOIN TGolfers G ON EG.intGolferID = G.intGolferID
WHERE EG.intEventID = $intEventID
GROUP BY G.intGolferID
ORDER BY total DESC
LIMIT 1
";
$resultTop = $conn->query($sqlTop);
$rowTop = $resultTop->fetch_assoc();
$topGolfer = $rowTop ? "{$rowTop['strFirstName']} {$rowTop['strLastName']} \${$rowTop['total']}" : "N/A";

// golfer count
$sqlCount = "SELECT COUNT(*) AS golferCount FROM TEventGolfers WHERE intEventID = $intEventID";
$resultCount = $conn->query($sqlCount);
$golferCount = $resultCount->fetch_assoc()['golferCount'] ?? 0;

// most recent donor
$sqlDonor = "
SELECT S.strFirstName, S.strLastName
FROM TEventGolferSponsors EG
JOIN TSponsors S ON EG.intSponsorID = S.intSponsorID
JOIN TEventGolfers EVG ON EG.intEventGolferID = EVG.intEventGolferID
WHERE EVG.intEventID = $intEventID
ORDER BY EG.dtmDateOfPledge DESC
LIMIT 1
";
$resultDonor = $conn->query($sqlDonor);
$rowDonor = $resultDonor->fetch_assoc();
$recentDonor = $rowDonor ? "{$rowDonor['strFirstName']} {$rowDonor['strLastName']}" : "N/A";

$conn->close();
?>

<h3 class="retro-title">Golfathon!</h3>
<ul>
    <li><strong>Total Raised:</strong> $<?php echo number_format($totalRaised, 2); ?></li>
    <li><strong>Top Golfer:</strong> <?php echo $topGolfer; ?></li>
    <li><strong>Total Golfers:</strong> <?php echo $golferCount; ?></li>
    <li><strong>Most Recent Donor:</strong> <?php echo $recentDonor; ?></li>
</ul>

<ul>
    <li><a href="registergolfer.php">Register Golfer</a></li>
    <li><a href="showgolfers.php">View Golfers</a></li>
    <li><a href="donate.php">Donate Now</a></li>
	<li><a href="statistics.php">Statistics</a></li>
    <li><a href="adminlogin.php">Admin Login</a></li>
</ul>

<p><a href="/WAPP1-WooldridgeJ/index.htm">Back to Homework (for your grading convenience)</a></p>

</body>
</html>
