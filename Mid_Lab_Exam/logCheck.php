<?php
	session_start();

	if(isset($_POST['submit'])){

		$uname 		= $_POST['name'];
		$password 	= $_POST['password'];

		if(empty($uname) || empty($password)){
			echo "null submission";

		}else{
			
			$file = fopen('user.txt', 'r');
			$data = fread($file, filesize('user.txt'));
			$user = explode('|', $data);



			if(trim($user[0]) == $uname && trim($user[1]) == $password){
				$_SESSION['status']  = "Ok";
				header('location: home.php');
			}else{
				echo "Invalid username/password";
			}
		}

	}else{
		header("location: login.html");
	}


?>