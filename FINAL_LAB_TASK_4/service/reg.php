<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}
	$email = $_POST['email'];;

	$sql= "select * from users where email = {$email}";

	$result = mysqli_query($conn, $sql);
	$data = 'ok';

	if (($result = $conn->query($sql)) !== FALSE){
        while($row = $result->fetch_assoc()){
			$data = 'not';
		}
	}
	echo $data;
?>