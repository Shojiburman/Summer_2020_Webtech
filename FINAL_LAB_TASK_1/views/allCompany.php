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
	
	<h3>Company list</h3>

	<table border="1" cellspacing="0" cellpadding="0">
		<tr>
			<td>ID</td>
			<td>company_name</td>
			<td>profile_description	</td>
			<td>industry</td>
			<td>company_website</td>
			<td>use_account_id</td>
			<td>ACTION</td>
		</tr>

		<?php  
			$company = getAllCompany();
			for ($i=0; $i != count($company); $i++) {  ?>
		<tr>
			<td><?=$company[$i]['id']?></td>
			<td><?=$company[$i]['company_name']?></td>
			<td><?=$company[$i]['profile_description']?></td>
			<td><?=$company[$i]['industry']?></td>
			<td><?=$company[$i]['company_website']?></td>
			<td><?=$company[$i]['user_account_id']?></td>
			<td>
				<a href="updateCompany.php?id=<?=$company[$i]['id']?>">Edit</a> |
				<a href="deleteCompany.php?id=<?=$company[$i]['id']?>">Delete</a> 
			</td>
		</tr>

		<?php } ?>
		
	</table>
</body>
</html>