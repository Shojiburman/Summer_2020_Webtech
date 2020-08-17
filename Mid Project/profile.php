<?php
    session_start();
    include 'php/session.php';

    $name = $email = $work = $pnumber = $address = $dob = $bio = "";
    if (isset($_POST['submit'])) {
        $name = strtolower(trim($_POST['name']));
        $email = strtolower(trim($_POST['email']));
        $work = strtolower(trim($_POST['work']));
        $pnumber = strtolower(trim($_POST['pnumber']));
        $address = strtolower(trim($_POST['address']));
        $dob = strtolower(trim($_POST['dob']));
        $bio = strtolower(trim($_POST['bio']));
    
        if (!$work == '') {
            if($work != $c_work){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET work = '$work' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }

        if (!$address == '') {
            if($address != $c_address){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET address = '$address' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }

        if (!$bio == '') {
            if($bio != $c_bio){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET bio = '$bio' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }

        if ($pnumber != '') {
            if($pnumber != $c_pnumber){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET pnumber = '$pnumber' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }

        if ($dob != '') {
            if($dob != $c_dob){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET dob = '$dob' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }

        if ($name != '') {
            if($name != $c_name){
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "UPDATE users SET name = '$name' WHERE u_id = '".$_SESSION['id']."'";

                if ($conn->query($sql) === TRUE) {
                  $error = "Record updated successfully";
                  header('location: profile.php');
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
        }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <style>
        input, textarea {
            margin: 10px;
            border-radius: 4px;
        }
        #profile {
            border: 2px solid #0aab8e !important;
        }
    </style>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>

    <table align="center">
        <tr>
            <td width="300px" height="600px" style="background-color: #f3f5f7">
                <table align="center">
                    <tr>
                        <td>
                            <div style="width: 200px; height: 200px;">
                                <img src="<?php echo $c_pic; ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                            </div>
                            <a href="changeProfilePic.php">
                                <img src="edit.svg" width="15px" style="display: block; margin: 7px auto; border: 1px solid #0aab8e; border-radius: 5px; padding: 7px">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e;  border-top: 1px solid #0aab8e; padding-bottom: 10px; padding-top: 10px"><?php echo strtoupper($c_name); ?></p>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e; padding-bottom: 10px"><?php echo ($c_email); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top: 50px">
                            <a href="changePass.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">Change Password</a>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                <table>
                    <tr>
                        <td align="center">
                            <h3 style="font-family: Roboto; margin: 20px 10px 10px 10px; color: #0aab8e">EDIT PROFILE</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                                <input type="text" name="name" value="<?php echo $c_name ?>" placeholder="Name" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="<?php echo $c_email ?>" placeholder="Email" style="padding: 10px; width: 300px">
                                <input type="text" name="work" value="<?php echo $c_work ?>" placeholder="Work" style="padding: 10px; width: 300px">
                                <input type="text" name="pnumber" value="<?php echo $c_pnumber ?>" placeholder="Contact Number" style="padding: 10px; width: 300px">
                                <input type="text" name="address" value="<?php echo $c_address ?>" placeholder="Address" style="padding: 10px; width: 300px">
                                <input type="date" name="dob" value="<?php echo $c_dob ?>" placeholder="Birthdate" style="padding: 10px; width: 300px">
                                <textarea type="text" name="bio" value="" placeholder="Bio" style="padding: 10px; width: 300px"><?php echo $c_bio ?></textarea>
                                <input type="submit" name="submit" value="SAVE" style="color: #0aab8e; margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">
                                <?php
                                    if (isset($error)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $error . "</span>";
                                    }
                                ?>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>