<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>About</title>
</head>
<body>
	<?php
		if(isset($_SESSION['name']) || isset($_COOKIE['remember'])){
			include 'adminNav.html';
		} else {
			include 'nav.html';
		}
	?>
	<p style="font-size: 1.12rem; font-family: Roboto; text-align: center; width: 900px; margin: 30px auto; border-top: 1px solid #0aab8e; padding-top: 10px">This website is an online service marketplace. Here you can find home services and the service provider will be your neighbor. Make your life more convenient and hassle-free.</p>
</body>
</html>