<?php
	require_once('../php/session_header.php');
	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Company</title>
</head>
<body>

	<form action="../php/companyController.php" method="post">
		<fieldset>
			<legend>Create New Company</legend>
			<table>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="name"></td>
				</tr>
				<tr>
					<td>Profile Description</td>
					<td><input type="text" name="description"></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry"></td>
				</tr>
				<tr>
					<td>Company Website</td>
					<td><input type="text" name="website"></td>
				</tr>
				<tr>
					<td>Company logo</td>
					<td><input type="file" name="logo"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="create" value="Create"> 
						<button><a href="home.php" style="text-decoration: none; color: black;">Back</a></button>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>