<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Manage Event Golfers
-->

<html>
<head>
    <title>Manage Event Golfers</title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Manage Golfers by Event</h2>

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

// get selected event or default to latest
if (isset($_POST['intEventID'])) {
    $intEventID = $_POST['intEventID'];
} else {
    $eventResult = $conn->query("SELECT MAX(intEventID) AS intEventID FROM TEvents");
    $eventRow = $eventResult->fetch_assoc();
    $intEventID = $eventRow['intEventID'];
}

// get list of all events for dropdown
$events = $conn->query("SELECT intEventID, dtmEventYear FROM TEvents");
?>

<!-- event selection form -->
<form method="post" action="manageeventgolfers.php">
    <label for="intEventID">Select Event:</label>
    <select name="intEventID" required>
        <?php
        while ($row = $events->fetch_assoc()) {
            $selected = ($row['intEventID'] == $intEventID) ? 'selected' : '';
            echo "<option value='{$row['intEventID']}' $selected>{$row['dtmEventYear']}</option>";
        }
        ?>
    </select>
    <button type="submit">View Golfers</button>
</form>

<br>

<?php
// query golfers and pledge info for selected event
$sql = "
SELECT 
    EG.intEventGolferID,
    G.strFirstName,
    G.strLastName,
    SUM(S.decPledgePerHole) AS totalPledged,
    (
        SELECT SUM(decPledgePerHole)
        FROM TEventGolferSponsors
        WHERE intEventGolferID = EG.intEventGolferID AND intPaymentStatusID = 1
    ) AS totalPaid
FROM TEventGolfers EG
JOIN TGolfers G ON EG.intGolferID = G.intGolferID
LEFT JOIN TEventGolferSponsors S ON EG.intEventGolferID = S.intEventGolferID
WHERE EG.intEventID = $intEventID
GROUP BY EG.intEventGolferID, G.strFirstName, G.strLastName
ORDER BY G.strLastName
";

$result = $conn->query($sql);

// display table of golfers
if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>
            <tr>
                <th>Golfer</th>
                <th>Total Pledged</th>
                <th>Total Paid</th>
                <th>Donors</th>
            </tr>";

    $eventTotalPledged = 0;
    $eventTotalPaid = 0;

    while ($row = $result->fetch_assoc()) {
        $eventTotalPledged += $row['totalPledged'];
        $eventTotalPaid += $row['totalPaid'];

        echo "<tr>
                <td>{$row['strFirstName']} {$row['strLastName']}</td>
                <td>$" . number_format($row['totalPledged'] ?? 0, 2) . "</td>
                <td>$" . number_format($row['totalPaid'] ?? 0, 2) . "</td>
                <td><a href='viewdonors.php?intEventGolferID={$row['intEventGolferID']}'>View Donors</a></td>
              </tr>";
    }

    echo "<tr style='font-weight: bold;'>
            <td>Event Total</td>
            <td>$" . number_format($eventTotalPledged, 2) . "</td>
            <td>$" . number_format($eventTotalPaid, 2) . "</td>
            <td></td>
          </tr>";

    echo "</table>";
} else {
    echo "<p>No golfers found for this event.</p>";
}

$conn->close();
?>

<br>
<p><a href="admindashboard.php">← Back to Dashboard</a></p>

</body>
</html>
