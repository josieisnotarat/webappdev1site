	
	
	

	
	<!DOCTYPE html>
	<html>

	<head>
	<title>My Template</title>


	<!--
	Name: Josephine Wooldridge
	Class:  IT-117-400
	Abstract: Assignment 09
	Date: 02/24/2025






	Note to Prof: Despite scouring the provided resources for this week's subject, the inclusion of session variables with either selects or radio buttons 
	seems to make things fall apart on the php side of things and i'm unsure of how to fix it.



	-->


	</head>

	<body>
	Name: Josephine Wooldridge <br>
	Class:  IT-117-400 <br>
	Abstract: Assignment 09

	<hr>

	<h3>1) - First PHP Form</h3>
	
	<form action="process_player.php" method="post">
	<table border="1px solid black" bgcolor="powderblue" >
	  <tr>
			<td>Name: </td>
			<td><input type="text" name="txtName" value="<?php echo $_SESSION["txtName"] ;  ?>"></td>
	  </tr>
	  <tr>
			<td>Address: </td>
			<td><input type="text" name="txtAddress" value="<?php echo $_SESSION["txtAddress"] ;  ?>"></td>
	  </tr>
	  <tr>
			<td>City: </td>
			<td><input type="text" name="txtCity" value="<?php echo $_SESSION["txtCity"] ;  ?>"></td>
	  </tr>
	  <tr>
			<td>State: </td>
			<td>			
				<select>
					<option name="txtState" value="<?php echo $_SESSION["txtState"] === "Ohio";  ?>">Ohio</option>
					<option name="txtState" value="<?php echo $_SESSION["txtState"] === "Kentucky";  ?>">Kentucky</option>
					<option name="txtState" value="<?php echo $_SESSION["txtState"] === "Indiana";  ?>">Indiana</option>
					<option name="txtState" value="<?php echo $_SESSION["txtState"] === "Wisconsin";  ?>">Wisconsin</option>
				</select>
				
			</td>
		</tr>
	  <tr>
			<td>Zip: </td>
			<td><input type="number" name="txtZip" value="<?php echo $_SESSION["txtZip"] ;  ?>"></td>
	  </tr>
	  <tr>
			<td>Age: </td>
			<td><input type="number" name="txtAge" value="<?php echo $_SESSION["txtAge"] ;  ?>"></td>
	  </tr>
	  <tr>
			<td>Gender: </td>
			<td>
				<input type="radio" name="radGender" value="<?php echo $_SESSION["radGender"] === "Male";  ?>">Male<br>
				<input type="radio" name="radGender" value="<?php echo $_SESSION["radGender"] === "Female";  ?>">Female
			</td>
		</tr>
	  <tr>
			<td align="right" colspan="2" >* All Fields Required</td>
	  </tr>
	  <tr>
			<td align="center" colspan="2">
				<button>Submit</button> 
			</td>
	  </tr>
	</table>
	</form>



		
	 <p><a href="/WAPP1-WooldridgeJ/index.htm">Back to Homework  (for your grading convenience) </a></p>

	</body>
	</html>