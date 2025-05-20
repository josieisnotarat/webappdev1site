<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Toggle Payment Status
-->

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

// get ids
$intSponsorID = $_GET['intSponsorID'] ?? 0;
$intEventGolferID = $_GET['intEventGolferID'] ?? 0;


// update status in database

// get current status
$sql = "
SELECT intPaymentStatusID 
FROM TEventGolferSponsors 
WHERE intSponsorID = $intSponsorID AND intEventGolferID = $intEventGolferID
";

$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentStatus = $row['intPaymentStatusID'];

    // toggle
    $newStatus = ($currentStatus == 1) ? 2 : 1;

    // update status
    $updateSql = "
    UPDATE TEventGolferSponsors 
    SET intPaymentStatusID = $newStatus 
    WHERE intSponsorID = $intSponsorID AND intEventGolferID = $intEventGolferID
    ";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: viewdonors.php?intEventGolferID=$intEventGolferID");
        exit();
    } else {
        echo "Error updating status: " . $conn->error;
    }

} else {
    echo "Sponsor donation record not found.";
}


// close & redirect
$conn->close();
header("Location: viewdonors.php?intEventGolferID=$intEventGolferID");
exit();
?>
