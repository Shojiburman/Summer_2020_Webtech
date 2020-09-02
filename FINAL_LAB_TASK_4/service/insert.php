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
	$data = 'not'

	$sql = "INSERT INTO users (name, email, pass)VALUES ('".$name."', '" . $email . "', '".$pass."');";
	if (mysqli_query($conn, $sql)) {
	  $data = "insert";
	} else {
	  $data = "not insert";
	}
	echo $data;
?>