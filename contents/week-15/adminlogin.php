<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Admin Login Page
-->

<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Administration Login</h2>

<form action="process_adminlogin.php" method="post">
    <table border="1" cellpadding="8">
        <tr>
            <td>Username:</td>
            <td><input type="text" name="strUsername" required></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="strPassword" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="btnLogin">Login</button>
            </td>
        </tr>
    </table>
</form>

<p>Admin Logins:</p>
<ul>
    <li><strong>Username: </strong>bnields</li>
	<li><strong>Password: </strong>adminadmin</li>
</ul>


<p>Return to:</p>
<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="showgolfers.php">View Golfers</a></li>
</ul>

</body>
</html>
