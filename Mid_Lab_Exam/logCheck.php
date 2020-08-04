<?php
	session_start();

	if(isset($_POST['submit'])){

		$name 		= $_POST['name'];
		$password 	= $_POST['password'];
		
		$_SESSION['login_user'] = $name;

		if(empty($name) || empty($password)){
			echo "null submission";

		} else{
			$file = fopen('user.txt', 'r');
			$data = fread($file, filesize('user.txt'));
			//$user = explode('|', $data);

				$userData = explode("|",$data);

				$i = 0;
				foreach ($userData as $us) {
				 	if(trim($us) == $name){
				 		if(trim($userData[$i+1]) == $password){
							$_SESSION['status']  = "Ok";
							header('location: home.php');
						}
				}else{
					echo "Invalid username/password";
				}
				$i++;
				} 
				/*if(trim($userData[0]) == $name && trim($userData[1]) == $password){
					$_SESSION['status']  = "Ok";
					header('location: home.php');
				}else{
					echo "Invalid username/password";
				}*/


			/*while(!feof($data)){
				$line = fgets($data);
				$user = explode('|', $line);

				if(trim($user[0]) == $name && trim($user[1]) == $password){
					$_SESSION['status']  = "Ok";
					header('location: home.php');
				}else{
					echo "Invalid username/password";
				}
			}*/

			fclose($file);
		}

	}else{
		header("location: login.html");
	}


?>