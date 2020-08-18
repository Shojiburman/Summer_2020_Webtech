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

	<table border="1">
		<tr>
			<td>ID</td>
			<td>company_name</td>
			<td>profile_description	</td>
			<td>industry</td>
			<td>company_website</td>
			<td>use_account_id	</td>
		</tr>

		<?php  
			$company = getAllCompany();
			for ($i=0; $i != count($company); $i++) {  ?>
		<tr>
			<td><?=$company[$i]['id']?></td>
			<td><?=$company[$i]['name']?></td>
			<td><?=$company[$i]['description']?></td>
			<td><?=$company[$i]['industry']?></td>
			<td><?=$company[$i]['website']?></td>
			<td><?=$company[$i]['use_account_id']?></td>
			<td>
				<a href="edit.php?id=<?=$users[$i]['id']?>">Edit</a> |
				<a href="delete.php?id=<?=$users[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>