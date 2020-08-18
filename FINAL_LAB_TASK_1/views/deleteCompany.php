<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');
	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

	if (isset($_GET['id'])) {
		deleteCompanyID($_GET['id']);
    	header('location: allCompany.php');
	}else{
		header('location: allCompany.php');
	}

?>