<?php
	require_once('../db/db.php');

	function getByID($id){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT * from users where u_id={$id}";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getByUsername($name){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "SELECT u_id from users where name = '".$name."'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}

	function getAllUser(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}


	function validate($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from users where name = '{$user['username']}' and pass = '{$user['password']}'";
		$result = mysqli_query($conn, $sql);
		$user = mysqli_fetch_assoc($result);

		if(count($user) > 0 ){
			return true;
		}else{
			return false;
		}
	}


	function insert($user){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "INSERT into users (name, email, pass) values('".$user['username']."', '".$user['email']."', '".$user['password']."')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}


	function update($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "UPDATE users set name = '{$user['username']}', pass = '{$user['password']}', email = '{$user['email']}' where u_id = {$user['id']}";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}
	function deleteID($user){
		$conn = dbConnection();
		if(!$conn){
			echo "DB connection error";
		}

		$sql = "DELETE FROM users WHERE u_id = '".$user."'";

		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function insertCompany($company){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}
		$id = getByUsername($_SESSION['username']);

		$sql = "INSERT into company (company_name, profile_description, industry, company_website, user_account_id) values('".$company['cname']."', '".$company['description']."', '".$company['industry']."', '".$company['website']."', '".$id['u_id']."')";
		if(mysqli_query($conn, $sql)){
			return true;
		}else{
			return false;
		}
	}

	function getAllCompany(){
		$conn = dbConnection();

		if(!$conn){
			echo "DB connection error";
		}

		$sql = "select * from company";
		$result = mysqli_query($conn, $sql);
		$users = [];

		while($row = mysqli_fetch_assoc($result)){
			array_push($users, $row);
		}

		return $users;
	}




?>