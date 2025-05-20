<?php
session_start();
?>

<html>
<body>
<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 10
	Date: 03/03/2025


	-->

<?php

$txtMLBTeam1 = $_POST["txtMLBTeam1"];
$txtMLBTeam2 = $_POST["txtMLBTeam2"];
$txtMLBTeam3 = $_POST["txtMLBTeam3"];
$txtMLBTeam4 = $_POST["txtMLBTeam4"];
$txtMLBTeam5 = $_POST["txtMLBTeam5"];
$txtMLBTeam6 = $_POST["txtMLBTeam6"];
$txtMLBTeam7 = $_POST["txtMLBTeam7"];
$txtMLBTeam8 = $_POST["txtMLBTeam8"];
$txtMLBTeam9 = $_POST["txtMLBTeam9"];
$txtMLBTeam10 = $_POST["txtMLBTeam10"];

$arrMLBTeams = array($txtMLBTeam1, $txtMLBTeam2, $txtMLBTeam3, $txtMLBTeam4, $txtMLBTeam5, $txtMLBTeam6, $txtMLBTeam7, $txtMLBTeam8, $txtMLBTeam9, $txtMLBTeam10);

$intIndex = 0;
foreach ($arrMLBTeams as $strTeam) {
    $intIndex++; 
    echo "Baseball Team #$intIndex is $strTeam<br>";
}

?>

<br>
<a href="/WAPP1-WooldridgeJ/contents/week-7/Assignment10.html"> Modify Data </a></p><br>


</body>
</html> 