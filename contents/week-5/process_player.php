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
$txtName =  $_POST["txtName"];
$txtAddress =  $_POST["txtAddress"];
$txtState = $_POST["txtState"];
$txtCity =  $_POST["txtCity"];
$txtZip =  $_POST["txtZip"];
$intAge = $_POST["txtAge"];
$txtGender = $_POST["radGender"];

$txtPlayerGroup = "";


If ($txtGender === "Male") {
    If ($intAge > 55) {
		$txtPlayerGroup = "Male Senior";
    } elseIf ($intAge > 18) {
        $txtPlayerGroup = "Male Professional";
    } else {
        $txtPlayerGroup = "Male Junior";
    }
} elseIf ($txtGender === "Female") {
    If ($intAge > 55) {
        $txtPlayerGroup = "Female Senior";
    } elseIf ($intAge > 18) {
        $txtPlayerGroup = "Female Professional";
    } else {
        $txtPlayerGroup = "Female Junior";
    }
}
?>


Name: <?php echo $txtName;?><br>
Address: <?php echo $txtAddress;?><br>
City: <?php echo $txtCity;?><br>
Zip: <?php echo $txtZip;?><br>
Player Group: <?php echo $txtPlayerGroup;?><br>


</body>
</html> 