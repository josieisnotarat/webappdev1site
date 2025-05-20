<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Admin Dashboard
-->

<html>
<head>
    <title>Admin Dashboard</title>
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

// get admin ID
$intAdminID = $_GET['intAdminID'] ?? 0;
$adminName = "";

// fetch admin name
$sql = "SELECT strFirstName, strLastName FROM tadmins WHERE intAdminID = $intAdminID";
$result = $conn->query($sql);

if ($result && $row = $result->fetch_assoc()) {
    $adminName = "{$row['strFirstName']} {$row['strLastName']}";
}

$conn->close();
?>

<h2>Admin Dashboard</h2>

<?php if ($adminName): ?>
    <p>Welcome, <?php echo $adminName; ?>. How is Josie's grade looking so far?</p>
<?php else: ?>
    <p>Welcome, Administrator. </p>
<?php endif; ?>

<ul>
    <li><a href="addevent.php">Add Event</a></li>
    <li><a href="manageeventgolfers.php">Manage Event Golfers</a></li>	
    <li><a href="index.php">Return to Home</a></li>
</ul>

</body>
</html>
