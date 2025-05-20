<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Golfer Registration
-->

<html>
<head>
    <title>Register Golfer</title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Golfer Registration</h2>

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

// get dropdown options
$Genders = mysqli_query($conn, "SELECT intGenderID, strGender FROM TGenders");
$States = mysqli_query($conn, "SELECT intStateID, strState FROM TStates");
$ShirtSizes = mysqli_query($conn, "SELECT intShirtSizeID, strShirtSize FROM TShirtSizes");
?>

<form action="process_registergolfer.php" method="post">
    <table border="1" cellpadding="8">
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
                    while ($row = mysqli_fetch_assoc($States)) {
                        echo "<option value='{$row["intStateID"]}'>{$row["strState"]}</option>";
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
            <td>Shirt Size:</td>
            <td>
                <select name="intShirtSizeID" required>
                    <option value="">Select Shirt Size</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($ShirtSizes)) {
                        echo "<option value='{$row["intShirtSizeID"]}'>{$row["strShirtSize"]}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td>
                <select name="intGenderID" required>
                    <option value="">Select Gender</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($Genders)) {
                        echo "<option value='{$row["intGenderID"]}'>{$row["strGender"]}</option>";
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
                <button type="submit">Submit</button>
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
