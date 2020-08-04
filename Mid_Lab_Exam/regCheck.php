  
<?php
	session_start();

	if(isset($_POST['submit'])){


		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(empty($name) || empty($id) || empty($password) || empty($email)){
			echo "null submission";
		}else {

			$file = fopen('user.txt', 'a');
			fwrite($file, $name.'|'.$password.'|'."\r\n");
			fclose($file);

			header('location: login.html');
		}

	}else{
		header("location: login.html");
	}


?>