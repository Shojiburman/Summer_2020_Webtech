<?php

	session_start();

	if(isset($_POST['submit'])){

		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($username) || empty($password) || empty($email)){
			echo "null submission";
		}else {
			$user = [
						'username'=>$username,
						'email'=>$email,
						'password'=>$password
					];

			$_SESSION['username'] 	= $username;
			$_SESSION['email'] 		= $email;
			$_SESSION['password'] 	= $password;
			$_SESSION['user'] 		= $user;


			header('location: login.php');
		}

	}else{
		echo "not found";
	}

?>