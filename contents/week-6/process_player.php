<?php
session_start();
?>

<html>
<body>
<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 09
	Date: 02/24/2025

	
	Post your solution by 2/24 at 11:59 PM


	-->


<?php

$_SESSION["txtName"] =  $_POST["txtName"];
$_SESSION["txtAddress"] =  $_POST["txtAddress"];
$_SESSION["txtState"] = $_POST["txtState"];
$_SESSION["txtCity"] =  $_POST["txtCity"];
$_SESSION["txtZip"] =  $_POST["txtZip"];
$_SESSION["intAge"] = $_POST["txtAge"];
$_SESSION["txtGender"] = $_POST["radGender"];

$_SESSION["txtPlayerGroup"] = "";


If ($_SESSION["txtGender"] === "Male") {
    If ($_SESSION["intAge"] > 55) {
		$_SESSION["txtPlayerGroup"] = "Male Senior";
    } elseIf ($_SESSION["intAge"] > 18) {
        $_SESSION["txtPlayerGroup"] = "Male Professional";
    } else {
        $_SESSION["txtPlayerGroup"] = "Male Junior";
    }
} elseIf ($_SESSION["txtGender"] === "Female") {
    If ($_SESSION["intAge"] > 55) {
        $_SESSION["txtPlayerGroup"] = "Female Senior";
    } elseIf ($_SESSION["intAge"] > 18) {
        $_SESSION["txtPlayerGroup"] = "Female Professional";
    } else {
        $_SESSION["txtPlayerGroup"] = "Female Junior";
    }
}
?>


Name: <?php echo $_SESSION["txtName"];?><br>
Address: <?php echo $_SESSION["txtAddress"];?><br>
City: <?php echo $_SESSION["txtCity"];?><br>
Zip: <?php echo $_SESSION["txtZip"];?><br>
Player Group: <?php echo $_SESSION["txtPlayerGroup"];?><br>


<br>
<a href="/WAPP1-WooldridgeJ/contents/week-6/Assignment9.php"> Modify Data </a></p><br>


</body>
</html> 