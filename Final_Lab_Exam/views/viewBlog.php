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

	<button><a href="adminHome.php">Back</a></button>
	
	<h1>Blog list</h1>

	<?php 
		$id = getByUsename($_SESSION['username']); 
		$blog = getBlog($id['id']);
		for ($i=0; $i != count($blog); $i++) {  ?>
			<div style="border: 1px solid black; padding: 25px; margin: 20px 0;">
				<h3 style="border-bottom: 1px solid black; padding-bottom: 5px; width: max-content;"><?=$blog[$i]['title']?></h3>
				<p><?=$blog[$i]['blog']?></p>
			</div>
			<button><a href="editBlog.php?id=<?=$blog[$i]['b_id']?>">Edit</a></button>
			<button><a href="deleteBlog.php?id=<?=$blog[$i]['b_id']?>">Delete</a></button>
	<?php } ?>
</body>
</html>