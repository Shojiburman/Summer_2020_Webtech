<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>About</title>
	<link rel="stylesheet" type="text/css" href="../css/body.css">
	<link rel="stylesheet" type="text/css" href="../css/about.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>
<body>
	<?php
		if(isset($_SESSION['id']) || isset($_COOKIE['remember'])){
			include 'adminNav.html';
		} else {
			include 'nav.html';
		}
	?>
	<p>This website is an online service marketplace. Here you can find home services and the service provider will be your neighbor. Make your life more convenient and hassle-free.</p>
</body>
</html>