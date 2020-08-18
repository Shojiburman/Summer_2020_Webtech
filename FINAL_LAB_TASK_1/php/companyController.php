<?php 
	session_start();
	require_once('../php/session_header.php');
	require_once('../service/userService.php');


	//add company
	if(isset($_POST['create'])){
		$name 			= $_POST['name'];
		$description 	= $_POST['description'];
		$industry 		= $_POST['industry'];
		$website 		= $_POST['website'];

		if(empty($name) || empty($description) || empty($industry) || empty($website)){
			header('location: ../views/addCompany.php?error=null_value');
		}else{

			$company = [
				'cname'=> $name,
				'description'=> $description,
				'industry'=> $industry,
				'website'=> $website,
			];

			$status = insertCompany($company);

			if($status){
				header('location: ../views/allCompany.php?success=done');
			}else{
				header('location: ../views/addCompany.php?error=db_error');
			}
		}
	}

	//update user
	if(isset($_POST['edit'])){

		$username 	= $_POST['username'];
		$password 	= $_POST['password'];
		$email 		= $_POST['email'];
		$id 		= $_POST['id'];

		if(empty($username) || empty($password) || empty($email)){
			header('location: ../views/edit.php?id={$id}');
		}else{

			$user = [
				'username'=> $username,
				'password'=> $password,
				'email'=> $email,
				'id'=> $id
			];

			$status = update($user);

			if($status){
				header('location: ../views/all_users.php?success=done');
			}else{
				header('location: ../views/edit.php?id={$id}');
			}
		}
	}

?>