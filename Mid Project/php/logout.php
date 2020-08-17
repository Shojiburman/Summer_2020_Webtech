<?php
	session_start();
	session_destroy();
	setcookie('remember', "");
	header('location: login.php');

?>