<?php
	session_start();
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}
	/*$uname = "shojib";
	$pass = "12345678";*/

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];

	$data = 'not';
	$sql= "SELECT * FROM users WHERE username = '$uname' AND pass = '$pass'";
	if (($result = $conn->query($sql)) !== FALSE){
        while($row = $result->fetch_assoc()){
        	$admin = $row['admin'];
        	if($admin == '0'){
        		$data = 'author';
        	}
        	else if ($admin == '1'){
        		$data = 'admin';
        	}
			$_SESSION['username'] = $row['username'];
		}
	}
	echo $data;
?>