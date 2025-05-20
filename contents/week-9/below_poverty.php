<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Project 1
Date: 03/23/2025
-->

<?php

// I feel like this is far more verbose than it needs to be but hey, it works, so
session_start();

// Do arrays exist??
if (!isset($_SESSION['strCounty'])) {
    $_SESSION['strCounty'] = array();
}
if (!isset($_SESSION['intIncome'])) {
    $_SESSION['intIncome'] = array();
}
if (!isset($_SESSION['intHouseholdSize'])) {
    $_SESSION['intHouseholdSize'] = array();
}


// Variablessss
// Poverty counts
$intHamiltonPovertyCount = 0;
$intButlerPovertyCount = 0;
$intBoonePovertyCount = 0;
$intKentonPovertyCount = 0;
$intOhioPovertyCount = 0;
$intKentuckyPovertyCount = 0;
$intTotalPovertyCount = 0;

// Household num counts
$intHamiltonCount = 0;
$intButlerCount = 0;
$intBooneCount = 0;
$intKentonCount = 0;
$intOhioCount = 0;
$intKentuckyCount = 0;
$intTotalCount = 0;

// Poverty percentages
$intHamiltonPovertyPercentage = 0;
$intButlerPovertyPercentage = 0;
$intBoonePovertyPercentage = 0;
$intKentonPovertyPercentage = 0;
$intOhioPovertyPercentage = 0;
$intKentuckyPovertyPercentage = 0;
$intTotalPovertyPercentage = 0;


// Loop thru arrays to get data
for ($index = 0; $index < count($_SESSION['strCounty']); $index++) {
    
	
	//Grab data & set to temp variables
	$strCounty = $_SESSION['strCounty'][$index];
    $intIncome = $_SESSION['intIncome'][$index];
    $intHouseholdSize = $_SESSION['intHouseholdSize'][$index];


    // Num of households
    if ($strCounty == "Hamilton") {
        $intHamiltonCount++;
    } elseif ($strCounty == "Butler") {
        $intButlerCount++;
    } elseif ($strCounty == "Boone") {
        $intBooneCount++;
    } elseif ($strCounty == "Kenton") {
        $intKentonCount++;
    }


    // Check for poverty and add to poverty count
    if ($intHouseholdSize == 1 && $intIncome < 12000) {
        if ($strCounty == "Hamilton") {
            $intHamiltonPovertyCount++;
        } elseif ($strCounty == "Butler") {
            $intButlerPovertyCount++;
        } elseif ($strCounty == "Boone") {
            $intBoonePovertyCount++;
        } elseif ($strCounty == "Kenton") {
            $intKentonPovertyCount++;
        }
		
    } elseif ($intHouseholdSize == 2 && $intIncome < 18000) {
        if ($strCounty == "Hamilton") {
            $intHamiltonPovertyCount++;
        } elseif ($strCounty == "Butler") {
            $intButlerPovertyCount++;
        } elseif ($strCounty == "Boone") {
            $intBoonePovertyCount++;
        } elseif ($strCounty == "Kenton") {
            $intKentonPovertyCount++;
        }
		
    } elseif ($intHouseholdSize == 3 && $intIncome < 25000) {
        if ($strCounty == "Hamilton") {
            $intHamiltonPovertyCount++;
        } elseif ($strCounty == "Butler") {
            $intButlerPovertyCount++;
        } elseif ($strCounty == "Boone") {
            $intBoonePovertyCount++;
        } elseif ($strCounty == "Kenton") {
            $intKentonPovertyCount++;
        }
		
    } elseif ($intHouseholdSize == 4 && $intIncome < 30000) {
        if ($strCounty == "Hamilton") {
            $intHamiltonPovertyCount++;
        } elseif ($strCounty == "Butler") {
            $intButlerPovertyCount++;
        } elseif ($strCounty == "Boone") {
            $intBoonePovertyCount++;
        } elseif ($strCounty == "Kenton") {
            $intKentonPovertyCount++;
        }
		
    } elseif ($intHouseholdSize >= 5 && $intIncome < 40000) {
        if ($strCounty == "Hamilton") {
            $intHamiltonPovertyCount++;
        } elseif ($strCounty == "Butler") {
            $intButlerPovertyCount++;
        } elseif ($strCounty == "Boone") {
            $intBoonePovertyCount++;
        } elseif ($strCounty == "Kenton") {
            $intKentonPovertyCount++;
        }
    }
}


// Add counties for state and overall totals
$intOhioCount = $intHamiltonCount + $intButlerCount;
$intKentuckyCount = $intBooneCount + $intKentonCount;
$intTotalCount = $intOhioCount + $intKentuckyCount;


// Same thing for poverty totals; add counties for state and overall
$intOhioPovertyCount = $intHamiltonPovertyCount + $intButlerPovertyCount;
$intKentuckyPovertyCount = $intBoonePovertyCount + $intKentonPovertyCount;
$intTotalPovertyCount = $intOhioPovertyCount + $intKentuckyPovertyCount;


// Divide poverty by num of households for percent in poverty
if ($intHamiltonCount > 0) {
    $intHamiltonPovertyPercentage = ($intHamiltonPovertyCount / $intHamiltonCount) * 100;
}

if ($intButlerCount > 0) {
    $intButlerPovertyPercentage = ($intButlerPovertyCount / $intButlerCount) * 100;
}

if ($intBooneCount > 0) {
    $intBoonePovertyPercentage = ($intBoonePovertyCount / $intBooneCount) * 100;
}

if ($intKentonCount > 0) {
    $intKentonPovertyPercentage = ($intKentonPovertyCount / $intKentonCount) * 100;
}

if ($intOhioCount > 0) {
    $intOhioPovertyPercentage = ($intOhioPovertyCount / $intOhioCount) * 100;
}

if ($intKentuckyCount > 0) {
    $intKentuckyPovertyPercentage = ($intKentuckyPovertyCount / $intKentuckyCount) * 100;
}

if ($intTotalCount > 0) {
    $intTotalPovertyPercentage = ($intTotalPovertyCount / $intTotalCount) * 100;
}
?>



<html>
<head>
    <meta charset="UTF-8">
    <title>Poverty Percentage Results</title>
</head>
<body>
    <h2>Poverty Percentage by State and County</h2>
    <h3>Total Overall Percentage Below Poverty: <?php echo $intTotalPovertyPercentage; ?>%</h3>

    <h3>Ohio Percentage Below Poverty: <?php echo $intOhioPovertyPercentage; ?>%</h3>
    <ul>
        <li>Hamilton: <?php echo $intHamiltonPovertyPercentage; ?>%</li>
        <li>Butler: <?php echo $intButlerPovertyPercentage; ?>%</li>
    </ul>

    <h3>Kentucky Percentage Below Poverty: <?php echo $intKentuckyPovertyPercentage; ?>%</h3>
    <ul>
        <li>Boone: <?php echo $intBoonePovertyPercentage; ?>%</li>
        <li>Kenton: <?php echo $intKentonPovertyPercentage; ?>%</li>
    </ul>
	
</body>
</html>

<br>
<a href="/WAPP1-WooldridgeJ/contents/week-9/index.html">HOME</a>
