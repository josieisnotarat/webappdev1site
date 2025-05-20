<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Process Add Event Submission
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

// get year from form
$dtmEventYear = $_POST['dtmEventYear'];

// insert event into database
$sql = "INSERT INTO TEvents (dtmEventYear) VALUES ('$dtmEventYear')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>New event for $dtmEventYear added successfully!</h2>";
    echo "<p><a href='admindashboard.php'>← Back to Dashboard</a></p>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>

</body>
</html>
