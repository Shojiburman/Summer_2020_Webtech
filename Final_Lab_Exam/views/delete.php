<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		deleteID($_GET['id']);
        header('location: all_users.php');
	}else{
		header('location: all_users.php');
	}

?>