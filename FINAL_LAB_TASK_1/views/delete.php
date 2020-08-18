<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

	if (isset($_GET['id'])) {
		$userID = getByID($_GET['id']);
		if($userID['u_id'] == $_GET['id']){
			header('location: all_users.php/error=current_user');
		}else {
			deleteID($_GET['id']);
        	header('location: all_users.php');
		}
	}else{
		header('location: all_users.php');
	}

?>