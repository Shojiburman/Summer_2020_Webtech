<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}

	$uname = $_POST['uname'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$number = $_POST['number'];
	$data = 'not';

	$sql = "INSERT INTO users (name, `number`, username, pass) VALUES ('" . $name . "', '" . $number . "', '" . $uname . "', '" . $pass . "');";
	if ($conn->query($sql) === TRUE) {
	  $data = "insert";
	} else {
	  $data = "not";
	}
	echo $data;
?>