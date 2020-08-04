<?php
	session_start();
	/*if(isset($_SESSION['status'])){
	}*/

	if($_SESSION['status'] == "Ok"){ 

		$user = $_SESSION['login_user']
?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<h1>Welcome <?php echo $user?> </h1> <a href="logout.php"> Logout</a>
</body>
</html>


<?php
	}else{
		header('location: login.html');
	}
?>