<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
</head>
<body>
	<h1>Admin Panel:- <?=$_SESSION['username']?></h1> 
	<a href="../views/create.php">Create New User</a> |
	<a href="../views/all_users.php">User List</a> |
	<a href="../views/search.php">Search</a> |
	<a href="../php/logout.php">Logout</a> 
</body>
</html>