<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Show All Golfers
-->

<html>
<head>
	<title> View Golfers </title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>


<h2>Registered Golfers</h2>

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

// query all golfers
$sql = "SELECT * FROM TGolfers";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo "<table border='1' cellpadding='6'>
            <tr>
                <th>Golfer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State ID</th>
                <th>Zip Code</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Shirt Size ID</th>
                <th>Gender ID</th>
                <th>Update</th>
                <th>Donate</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['intGolferID']}</td>
                <td>{$row['strFirstName']}</td>
                <td>{$row['strLastName']}</td>
                <td>{$row['strAddress']}</td>
                <td>{$row['strCity']}</td>
                <td>{$row['intStateID']}</td>
                <td>{$row['strZipCode']}</td>
                <td>{$row['strPhoneNumber']}</td>
                <td>{$row['strEmail']}</td>
                <td>{$row['intShirtSizeID']}</td>
                <td>{$row['intGenderID']}</td>
                <td><a href='updategolfer.php?intGolferID={$row['intGolferID']}'>Update</a></td>
                <td><a href='donate.php?intGolferID={$row['intGolferID']}'>Donate Now</a></td>
              </tr>";
    }

    echo "</table>";
    $result->free();
} else {
    echo "<p>No golfers found.</p>";
}

$conn->close();
?>

<p>Return to:</p>
<ul>
    <li><a href="index.php">Home</a></li>
</ul>

</body>
</html>
