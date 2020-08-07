<?php
	if(isset($_SESSION['id']) || isset($_COOKIE['remember'])){
	    if (isset($_SESSION['id'])) {
	        $current_user =  trim($_SESSION['id']);
	    } elseif (isset($_COOKIE['remember'])) {
	        $current_user =  trim($_COOKIE['remember']);
	    }
	    if ($current_user == '') {
			session_destroy();
			setcookie('remember', "");
	        header("location:dashboard.php");
	        die();
	    }
	} else {
		session_destroy();
		setcookie('remember', "");
		print_r($_SESSION['id']);
	    header("location:login.php");
	    die();
	}
?>