<html>
<body>
<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 08
	Date: 02/24/2025


	Assignment Description (for quick reference)
	Using the project  completed in the weekly lectures as your guide, create the following project.   Note, we will continue to build on this project in the coming weeks.   When complete, post on your account on the ITD Server. 
	Create a html document will collect the following form data:
			Name
			Address
			City
			State
			Zip
			Age
			Gender
	Organize your html within a table and make it look good. 
	Use CSS to format and style your form. 
	Create a process_player.php script that will process the html form data and display the following information: 
			Name
			Address
			City
			Zip
	Group the player based on age and gender: 
			Age < 18 and Male - Male Junior
			Age < 55 and > 18 and Male - Male Professional
			Age > 55 and Male - Male Senior
			Age < 18 and Female - Female Junior
			Age < 55 and > 18 and Female - Female Professional
			Age > 55 and Female - Female Senior
	Post your solution by 2/24 at 11:59 PM


	-->


<?php

// Database connection info – update as needed
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

// Declare Variables
$strFirstName = $_POST['FirstName'];
$strLastName = $_POST['LastName'];
$strAddress = $_POST['Address'];
$strCity = $_POST['City'];
$intStateID = $_POST['StateID'];
$strZipCode = $_POST['ZipCode'];
$strPhoneNumber = $_POST['PhoneNumber'];
$strEmail = $_POST['Email'];
$intShirtSizeID = $_POST['ShirtSizeID'];
$intGenderID = $_POST['GenderID'];

// Prepare INSERT query
$sql = "INSERT INTO Golfers 
  (FirstName, LastName, Address, City, StateID, ZipCode, PhoneNumber, Email, ShirtSizeID, GenderID)
  VALUES (
  '$strFirstName',
  '$strLastName',
  '$strAddress',
  '$strCity',
  '$intStateID',
  '$strZipCode',
  '$strPhoneNumber',
  '$strEmail',
  '$intShirtSizeID',
  '$intGenderID'
	)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



//Display all custs
	$sql = "SELECT * FROM Golfers";
	if($result = mysqli_query($conn, $sql)){
		if(mysqli_num_rows($result) > 0){
			echo "<table border=1>";
				echo "<tr>";
				echo "<th>Golfer</th>";
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
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
				echo "<td>" . $row['GolferID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['Address'] . "</td>";
				echo "<td>" . $row['City'] . "</td>";				
				echo "<td>" . $row['StateID'] . "</td>";
				echo "<td>" . $row['ZipCode'] . "</td>";
				echo "<td>" . $row['PhoneNumber'] . "</td>";
				echo "<td>" . $row['Email'] . "</td>";
				echo "<td>" . $row['ShirtSizeID'] . "</td>";
				echo "<td>" . $row['GenderID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
		
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: $sql. " . mysqli_error($conn);
}



$conn->close();
?>




</body>
</html> 