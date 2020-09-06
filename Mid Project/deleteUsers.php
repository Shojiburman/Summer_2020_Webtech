<?php
	if (isset($_GET['id'])) {
        $user = $_GET['id'];   
    }else{
        header('location: usersList.php');
    }
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM users WHERE u_id = '".$user."'";
    if (($result = $conn->query($sql)) !== FALSE){
	}
	$conn->close();
	header('location: usersList.php');
?>