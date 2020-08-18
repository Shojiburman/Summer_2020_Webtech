<?php 
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

	//update company
	if(isset($_POST['update'])){
		$name 			= $_POST['name'];
		$description 	= $_POST['description'];
		$industry 		= $_POST['industry'];
		$website 		= $_POST['website'];

		if(empty($name) || empty($description) || empty($industry) || empty($website)){
			header('location: ../views/updateCompany.php?error=null_value');
		}else{

			$company = [
				'cname'=> $name,
				'description'=> $description,
				'industry'=> $industry,
				'website'=> $website,
			];

			$status = updateCompany($company);
			
			$id = $_GET['id'];
			var_dump($id);

			if($status){
				header('location: ../views/updateCompany.php?success=done&id=' . $id);
			}else{
				header('location: ../views/updateCompany.php?error=db_error&id=' . $id);
			}
		}
	}

?>