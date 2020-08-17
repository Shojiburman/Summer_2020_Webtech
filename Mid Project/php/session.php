<?php
	if(isset($_SESSION['id']) || isset($_COOKIE['remember'])){
	    if (isset($_SESSION['id'])) {
	        $current_user =  trim($_SESSION['id']);

	        $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
		    if ($conn->connect_error) {
		      die("Connection failed: " . $conn->connect_error);
		    }
	        $sql = "select * from users where u_id = '".$current_user."'";
            if (($result = $conn->query($sql)) !== FALSE){
                while($row = $result->fetch_assoc()){
			        $c_name =  $row['name'];
			        $c_email = $row['email'];
			        $c_work = $row['work'];
			        $c_pnumber = $row['pnumber'];
			        $c_address = $row['address'];
			        $c_dob = $row['dob'];
			        $c_bio = $row['bio'];
			        $c_pic = "picture/".$row['picture'];
			    }
			}
			$conn->close();

	    } elseif (isset($_COOKIE['remember'])) {
	        $current_user =  trim($_COOKIE['remember']);

	        $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
		    if ($conn->connect_error) {
		      die("Connection failed: " . $conn->connect_error);
		    }
	        $sql = "select * from users where u_id = '".$current_user."'";
            if (($result = $conn->query($sql)) !== FALSE){
                while($row = $result->fetch_assoc()){
			        $c_name =  $row['name'];
			        $c_email = $row['email'];
			        $c_work = $row['work'];
			        $c_pnumber = $row['pnumber'];
			        $c_address = $row['address'];
			        $c_dob = $row['dob'];
			        $c_bio = $row['bio'];
			        $c_pic = "picture/".$row['picture'];
			    }
			}
			$conn->close();
	    }
	    if ($current_user == '') {
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