<?php
	session_start();
	if($_SESSION['status'] == "Ok"){ 

?>
	
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

	<h1>Welcome home!</h1> <a href="logout.php"> Logout</a>
</body>
</html>


<?php
	}else{
		header('location: login.php');
	}
?>