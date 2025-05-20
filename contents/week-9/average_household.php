<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Project 1
Date: 03/23/2025
-->

<?php
session_start();

// Does array exist?
if (!isset($_SESSION['strCounty'])) {
    $_SESSION['strCounty'] = array();
}
if (!isset($_SESSION['intIncome'])) {
    $_SESSION['intIncome'] = array();
}


// Declare Variablesss
$intHamiltonIncomeSum = 0;
$intButlerIncomeSum = 0;
$intBooneIncomeSum = 0;
$intKentonIncomeSum = 0;

$intHamiltonCount = 0;
$intButlerCount = 0;
$intBooneCount = 0;
$intKentonCount = 0;

$intOhioIncomeSum = 0;
$intKentuckyIncomeSum = 0;

$intTotalIncomeSum = 0;

$intOhioCount = 0;
$intKentuckyCount = 0;
$intTotalCount = 0;


// Loop through array to sum incomes and count households by county
for ($index = 0; $index < count($_SESSION['strCounty']); $index++) {
    $strCounty = $_SESSION['strCounty'][$index];
    $intIncome = $_SESSION['intIncome'][$index];    


    // Sum incomes and count households by county
    if ($strCounty == "Hamilton") {
        $intHamiltonIncomeSum += $intIncome;
        $intHamiltonCount++;            
    } elseif ($strCounty == "Butler") {
        $intButlerIncomeSum += $intIncome;
        $intButlerCount++;            
    }
	
    if ($strCounty == "Boone") {
        $intBooneIncomeSum += $intIncome;
        $intBooneCount++;            
    } elseif ($strCounty == "Kenton") {
        $intKentonIncomeSum += $intIncome;
        $intKentonCount++;            
    }
	

    // Sum incomes and count households by state
    if ($strCounty == "Hamilton" || $strCounty == "Butler") {
        $intOhioIncomeSum += $intIncome;
        $intOhioCount++; 
    } elseif ($strCounty == "Boone" || $strCounty == "Kenton") {
        $intKentuckyIncomeSum += $intIncome;
        $intKentuckyCount++; 
    }


    // Overall total income sum and count
    $intTotalIncomeSum += $intIncome;
    $intTotalCount++;
}


// Calculate averages by county, state, and overall
if ($intHamiltonCount > 0) {
    $intHamiltonAvgIncome = $intHamiltonIncomeSum / $intHamiltonCount;
} else {
    $intHamiltonAvgIncome = 0;
}

if ($intButlerCount > 0) {
    $intButlerAvgIncome = $intButlerIncomeSum / $intButlerCount;
} else {
    $intButlerAvgIncome = 0;
}

if ($intBooneCount > 0) {
    $intBooneAvgIncome = $intBooneIncomeSum / $intBooneCount;
} else {
    $intBooneAvgIncome = 0;
}

if ($intKentonCount > 0) {
    $intKentonAvgIncome = $intKentonIncomeSum / $intKentonCount;
} else {
    $intKentonAvgIncome = 0;
}

if ($intOhioCount > 0) {
    $intOhioAvgIncome = $intOhioIncomeSum / $intOhioCount;
} else {
    $intOhioAvgIncome = 0;
}

if ($intKentuckyCount > 0) {
    $intKentuckyAvgIncome = $intKentuckyIncomeSum / $intKentuckyCount;
} else {
    $intKentuckyAvgIncome = 0;
}

if ($intTotalCount > 0) {
    $intTotalAvgIncome = $intTotalIncomeSum / $intTotalCount;
} else {
    $intTotalAvgIncome = 0;
}
?>


<html>
<head>
    <meta charset="UTF-8">
    <title>Average Income Results</title>
</head>
<body>
    <h2>Average Income by State and County</h2>
    <h3>Total Overall Average Income: $<?= round($intTotalAvgIncome) ?></h3>

    <h3>Ohio Average Income: $<?= round($intOhioAvgIncome) ?></h3>
    <ul>
        <li>Hamilton: $<?= round($intHamiltonAvgIncome) ?></li>
        <li>Butler: $<?= round($intButlerAvgIncome) ?></li>
    </ul>

    <h3>Kentucky Average Income: $<?= round($intKentuckyAvgIncome) ?></h3>
    <ul>
        <li>Boone: $<?= round($intBooneAvgIncome) ?></li>
        <li>Kenton: $<?= round($intKentonAvgIncome) ?></li>
    </ul>
</body>
</html>

<br>
<a href="/WAPP1-WooldridgeJ/contents/week-9/index.html">HOME</a>
