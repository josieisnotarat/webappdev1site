<!--
Name: Josephine Wooldridge
Class:  IT-117-400
Abstract: Assignment 13 
Date: 04/14/2025
-->

<html>
<body>
<?php

// Database connection info
$servername = "mc-itddb-12-e-1";
$username = "jmwooldridge";
$password = "0719681";
$dbname = "01WAPP1400WooldridgeJ";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br>";

// Display all golfers
$sql = "SELECT * FROM TGolfers";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Golfer ID</th>";
        echo "<th>First Name</th>";
        echo "<th>Last Name</th>";
        echo "<th>Address</th>";
        echo "<th>City</th>";
        echo "<th>State ID</th>";
        echo "<th>Zip Code</th>";
        echo "<th>Phone Number</th>";
        echo "<th>Email</th>";
        echo "<th>Shirt Size ID</th>";
        echo "<th>Gender ID</th>";
        echo "<th>Update</th>";
        echo "<th>Donate</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['intGolferID'] . "</td>";
            echo "<td>" . $row['strFirstName'] . "</td>";
            echo "<td>" . $row['strLastName'] . "</td>";
            echo "<td>" . $row['strAddress'] . "</td>";
            echo "<td>" . $row['strCity'] . "</td>";				
            echo "<td>" . $row['intStateID'] . "</td>";
            echo "<td>" . $row['strZipCode'] . "</td>";
            echo "<td>" . $row['strPhoneNumber'] . "</td>";
            echo "<td>" . $row['strEmail'] . "</td>";
            echo "<td>" . $row['intShirtSizeID'] . "</td>";
            echo "<td>" . $row['intGenderID'] . "</td>";
            echo "<td><a href='updateplayer.php?intGolferID=" . $row['intGolferID'] . "'>Update</a></td>";
            echo "<td><a href='donate.php?intGolferID=" . $row['intGolferID'] . "'>DONATE NOW</a></td>";
            echo "</tr>";
        }

        echo "</table>";
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: $sql. " . mysqli_error($conn);
}

$conn->close();
?>



<p><a href="/WAPP1-WooldridgeJ/contents/week-12/index.php"> Back to Home </a></p><br>

	<p><a href="/WAPP1-WooldridgeJ/index.htm">Back to Homework  (for your grading convenience) </a></p>

</body>
</html>
