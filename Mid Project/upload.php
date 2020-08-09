<?php

if(isset($_POST["submit"])) {
  $uploadMsg = '';
  $target_dir = "picture/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadMsgErr = "File is not an image.";
    $uploadOk = 0;
  }


  // Check if file already exists
  if (file_exists($target_file)) {
    $uploadMsgErr = "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    $uploadMsgErr = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadMsgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $pic = basename( $_FILES["fileToUpload"]["name"]);
      $sql = "UPDATE users SET picture = '".$pic."' WHERE u_id = '".$_SESSION['id']."'";
      if ($conn->query($sql) === TRUE) {
        $uploadMsgSuccess = "The file ". basename( $_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        $uploadMsgErr = '';
        header("location:changeProfilePic.php");
      }
    } else {
      $uploadMsgSuccess = '';
    }
  }
  $conn->close();
}
?>