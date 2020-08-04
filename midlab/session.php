<?php
	if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
	    if (isset($_SESSION['login_user'])) {
	        $current_user =  trim($_SESSION['login_user']);
	    } elseif (isset($_COOKIE['remember'])) {
	        $current_user =  trim($_COOKIE['remember']);
	    }
	    if (!isset($_COOKIE['uname'])) {
	    	session_destroy();
	    	setcookie('remember', "");
	        header("location:login.php");
	        die();
	    }
	    if ($current_user == '' || $current_user != $_COOKIE['uname']) {
			session_destroy();
			setcookie('remember', "");
	        header("location:login.php");
	        die();
	    }
	} else {
		session_destroy();
		setcookie('remember', "");
	    header("location:login.php");
	    die();
	}
?>