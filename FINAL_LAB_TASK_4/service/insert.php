<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}

	$email = $_POST['email'];
	$name = $_POST['name'];
	$pass = $_POST['pass'];
	$data = 'not';

	$sql = "INSERT INTO users (name, email, pass) VALUES ('" . $name . "', '" . $email . "', '" . $pass . "');";
	if ($conn->query($sql) === TRUE) {
	  $data = "insert";
	} else {
	  $data = "not";
	}
	echo $data;
?>