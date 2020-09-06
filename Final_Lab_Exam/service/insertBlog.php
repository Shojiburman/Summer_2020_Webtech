<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}

	$title = $_POST['title'];
	$blog = $_POST['blog'];
	$a_id = $_POST['a_id'];
	$row = getByUsename($a_id);
	$a_id = $row['id'];
	$data = 'not';

	$sql = "INSERT INTO blogs (title, blog, a_id) VALUES ('" . $title . "', '" . $blog . "', '" . $a_id . "');";
	if ($conn->query($sql) === TRUE) {
	  $data = "insert";
	} else {
	  $data = "not";
	}
	echo $data;
?>