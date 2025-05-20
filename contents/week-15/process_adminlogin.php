<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Process Admin Login
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

// get login form input
$strUsername = $_POST['strUsername'];
$strPassword = $_POST['strPassword'];

// check admin credentials
$sql = "SELECT * FROM tadmins 
        WHERE strUsername = '$strUsername' 
        AND strPassword = '$strPassword'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
	$intAdminID = $row['intAdminID'];
	header("Location: admindashboard.php?intAdminID=$intAdminID");
	exit();
} else {
    echo "<h2>Invalid login. Try again.</h2>";
    echo "<p><a href='adminlogin.php'>← Back to Login</a></p>";
}

$conn->close();
?>

</body>
</html>
