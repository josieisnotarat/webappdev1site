

<!--
Name: Josephine Wooldridge
Class:  IT-117-400
Abstract: Project 1
Date: 03/23/2025


-->

<?php
session_start();


// Declare session arrays if they dont exist
if (!isset($_SESSION['strCounty'])) {
    $_SESSION['strCounty'] = array();
}
if (!isset($_SESSION['intHouseholdSize'])) {
    $_SESSION['intHouseholdSize'] = array();
}
if (!isset($_SESSION['intIncome'])) {
    $_SESSION['intIncome'] = array();
}


// Set variables with form data
$strSurveyDate = $_POST['dtmSurveyDate'];
$strCountyState = $_POST['txtCountyState'];
$intHouseholdSize = intval($_POST['txtHouseholdSize']);
$intYearlyIncome = intval($_POST['txtYearlyIncome']);


// String manipulation to get county
$position = strpos($strCountyState, ", ");
$strCounty = substr($strCountyState, 0, $position);


// Add data to arrays
$_SESSION['strCounty'][] = $strCounty;
$_SESSION['intHouseholdSize'][] = $intHouseholdSize;
$_SESSION['intIncome'][] = $intYearlyIncome;


// Redirect
header('Location: /WAPP1-WooldridgeJ/contents/week-9/index.html');

?>


<html>
<body>

<br>
<a href="/WAPP1-WooldridgeJ/contents/week-9/index.html"> Back to Survey </a></p><br>

</body>
</html>