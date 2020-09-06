<?php 
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	//update user
	if(isset($_POST['edit'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$name 		= $_POST['name'];
		$number 	= $_POST['number'];
		$id 		= $_POST['id'];

		if(empty($username) || empty($password) || empty($name) || empty($number)){
			header('location: ../views/edit.php?id={$id}');
		}else{

			$user = [
				'username'=> $username,
				'pass'=> $password,
				'name'=> $name,
				'number'=> $number,
				'id'=> $id
			];

			$status = update($user);

			if($status){
				header('location: ../views/all_users.php?success=done');
			}else{
				header('location: ../views/edit.php?id={$id}');
			}
		}
	}

?>