<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Donation Form
-->

<html>
<head>
	<title>Donate</title></head>
	<<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Donate</h2>

<?php
// database connection
$servername = "mc-itddb-12-e-1";
$username = "jmwooldridge";
$password = "0719681";
$dbname = "01WAPP1400WooldridgeJ";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed.");
}

// dropdown queries
$Golfer = mysqli_query($conn, "SELECT intGolferID, strFirstName, strLastName FROM TGolfers");
$States = mysqli_query($conn, "SELECT intStateID, strState FROM TStates");
$PaymentTypes = mysqli_query($conn, "SELECT intPaymentTypeID, strPaymentType FROM TPaymentTypes");
?>

<form action="process_donation.php" method="post">
    <table border="1" cellpadding="8">
        <tr>
            <td>Golfer:</td>
            <td>
                <select name="intGolferID" required>
                    <option value="">Select Golfer</option>
                    <?php
                    while ($golfer = mysqli_fetch_assoc($Golfer)) {
                        echo "<option value='{$golfer["intGolferID"]}'>{$golfer["strFirstName"]} {$golfer["strLastName"]}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>First Name:</td>
            <td><input type="text" name="strFirstName" required></td>
        </tr>
        <tr>
            <td>Last Name:</td>
            <td><input type="text" name="strLastName" required></td>
        </tr>
        <tr>
            <td>Address:</td>
            <td><input type="text" name="strAddress" required></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input type="text" name="strCity" required></td>
        </tr>
        <tr>
            <td>State:</td>
            <td>
                <select name="intStateID" required>
                    <option value="">Select State</option>
                    <?php
                    while ($state = mysqli_fetch_assoc($States)) {
                        echo "<option value='{$state["intStateID"]}'>{$state["strState"]}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Zip Code:</td>
            <td><input type="text" name="strZipCode" required minlength="5" maxlength="5" title="Enter a 5-digit ZIP code" placeholder="#####">

        </tr>
        <tr>
            <td>Phone Number:</td>
            <td><input type="text" name="strPhoneNumber" required minlength="10" maxlength="10" title="Enter a 10-digit Phone Numebr">
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" name="strEmail" required></td>
        </tr>
        <tr>
            <td>Pledge Per Hole:</td>
            <td><input type="number" step="0.01" name="decPledgePerHole" required></td>
        </tr>
        <tr>
            <td>Payment Type:</td>
            <td>
                <select name="intPaymentTypeID" required>
                    <option value="">Select Payment Type</option>
                    <?php
                    while ($paymenttype = mysqli_fetch_assoc($PaymentTypes)) {
                        echo "<option value='{$paymenttype["intPaymentTypeID"]}'>{$paymenttype["strPaymentType"]}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">* All Fields Required.</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit">Donate</button>
            </td>
        </tr>
    </table>
</form>

<p>Return to:</p>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="showgolfers.php">View Golfers</a></li>
</ul>

</body>
</html>
