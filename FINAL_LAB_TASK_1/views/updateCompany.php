<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$company = getCompanyByID($_GET['id']);	
	}else{
		header('location: allCompany.php');
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
	<title>Update Company</title>
</head>
<body>

	<form action="../php/companyController.php?id=<?=$id?>" method="post">
		<fieldset>
			<legend>Update Company</legend>
			<table>
				<tr>
					<td>Company Name</td>
					<td><input type="text" name="name" value = "<?php echo $company['company_name']; ?>"></td>
				</tr>
				<tr>
					<td>Profile Description</td>
					<td><input type="text" name="description" value = "<?php echo $company['profile_description']; ?>"></td>
				</tr>
				<tr>
					<td>Industry</td>
					<td><input type="text" name="industry" value = "<?php echo $company['industry']; ?>"></td>
				</tr>
				<tr>
					<td>Company Website</td>
					<td><input type="text" name="website" value = "<?php echo $company['company_website']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="update" value="Update"> 
						<button><a href="home.php" style="text-decoration: none; color: black;">Back</a></button>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
</body>
</html>