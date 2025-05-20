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



// Initialize variables
$intHamiltonCount = 0;
$intButlerCount = 0;
$intBooneCount = 0;
$intKentonCount = 0;

$intOhioTotal = 0;
$intKentuckyTotal = 0;

$intTotalTotal = 0;



// Loop through array to count households by county
for ($index = 0; $index < count($_SESSION['strCounty']); $index++) {
    $strCounty = $_SESSION['strCounty'][$index];    
  
    if ($strCounty == "Hamilton") {
        $intHamiltonCount++;            
    } elseif ($strCounty == "Butler") {
        $intButlerCount++;            
    }
        
    
    if ($strCounty == "Boone") {
        $intBooneCount++;            
    } elseif ($strCounty == "Kenton") {
        $intKentonCount++;            
    }
    
}

// Add counts together for state and overall totals
$intOhioTotal = $intHamiltonCount + $intButlerCount;
$intKentuckyTotal = $intBooneCount + $intKentonCount;
$intTotalTotal = $intOhioTotal + $intKentuckyTotal;
?>



<html>
<head>
    <meta charset="UTF-8">
    <title>Totals Survey Results</title>
</head>
<body>
    <h2>Totals by State and County</h2>
	<h3>Total Overall: <?= $intTotalTotal; ?></h3>

    <h3>Ohio: <?= $intOhioTotal; ?></h3>
    <ul>
        <li>Hamilton: <?= $intHamiltonCount; ?></li>
        <li>Butler: <?= $intButlerCount; ?></li>
    </ul>

    <h3>Kentucky: <?= $intKentuckyTotal; ?></h3>
    <ul>
        <li>Boone: <?= $intBooneCount; ?></li>
        <li>Kenton: <?= $intKentonCount; ?></li>
    </ul>

    
</body>
</html>

<br>
<a href="/WAPP1-WooldridgeJ/contents/week-9/index.html">HOME</a>
