<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Welcome Home!<?=$_SESSION['username']?></h1> 
	<a href="../views/share.php">Add Blog</a> |
	<a href="../views/viewBlog.php">View Blog</a> |
	<a href="../php/logout.php">Logout</a> 
</body>
</html>