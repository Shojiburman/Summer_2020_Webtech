<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	$data = 'not';
	$sql= "SELECT * FROM users WHERE email = '" . $email . "' AND pass = '". $pass ."'";
	if (($result = $conn->query($sql)) !== FALSE){
        while($row = $result->fetch_assoc()){
			$data = 'ok';
		}
	}
	echo $data;
?>