<!--
Name: Josephine Wooldridge
Class: IT-117-400
Abstract: Add New Golf Event
-->

<html>
<head>
    <title>Add New Event</title>
	<link rel="stylesheet" href="../../styles/golfstyle.css"> 
</head>
<body>

<h2>Add a New Event</h2>

<form action="process_addevent.php" method="post">
    <table border="1" cellpadding="8">
        <tr>
            <td>Event Year:</td>
            <td><input type="text" name="dtmEventYear" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="btnSubmit">Add Event</button>
            </td>
        </tr>
    </table>
</form>

<p><a href="admindashboard.php">← Back to Dashboard</a></p>

</body>
</html>
