<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>User List</title>
</head>
<body>

	<a href="home.php">Back</a> |
	<a href="../php/logout.php">Logout</a> 
	
	<h3>User list</h3>

	<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td>ID</td>
			<td>Username</td>
			<td>Password</td>
			<td>Email</td>
			<td>Type</td>
			<td>Action</td>
		</tr>

		<?php  
			$users = getAllUser();
			for ($i=0; $i != count($users); $i++) {  ?>
		<tr>
			<td><?=$users[$i]['u_id']?></td>
			<td><?=$users[$i]['name']?></td>
			<td><?=$users[$i]['pass']?></td>
			<td><?=$users[$i]['email']?></td>
			<td><?=$users[$i]['admin']?></td>
			<td>
				<a href="edit.php?id=<?=$users[$i]['u_id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['u_id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>