<?php
	require_once('../db/db.php');
	require_once('userService.php');
	$conn = dbConnection();
	if(!$conn){
		echo "DB connection error";
	}
	$email = $_POST['email'];
	
	if($email != ""){
		$data = 'ok';
		$sql= "select * from users where email = '" . $email . "'";
		if (($result = $conn->query($sql)) !== FALSE){
            while($row = $result->fetch_assoc()){
				$data = 'not';
			}
		}
	} else {
		$data = 'empty';
	}
	echo $data;
?>