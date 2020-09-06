<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}

	$title = $_POST['title'];
	$blog = $_POST['blog'];
	$b_id = $_POST['b_id'];
	$data = 'not';

	$sql = "UPDATE blogs set title ='$title', blog ='$blog' where b_id = '$b_id'";
	if ($conn->query($sql) === TRUE) {
	  $data = "insert";
	} else {
	  $data = "not";
	}
	echo $data;
?>