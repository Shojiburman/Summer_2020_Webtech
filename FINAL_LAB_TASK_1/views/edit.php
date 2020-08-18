<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$user = getByID($_GET['id']);	
	}else{
		header('location: all_users.php');
	}
	if(isset($_GET['success'])){
		echo "Update sucessful";
	}
	if(isset($_GET['error'])){
		echo "Something wrong";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
</head>
<body>

	<form action="../php/userController.php?id=<?=$id?>" method="post">
		<fieldset>
			<legend>Edit User</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" value="<?=$user['name']?>"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" value="<?=$user['pass']?>"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" value="<?=$user['email']?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="edit" value="Update"> 
						<a href="all_users.php">Back</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>