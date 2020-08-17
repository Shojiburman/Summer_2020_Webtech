<?php
    session_start();
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    include 'php/session.php';

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['pass'])) {
            $pass = trim($_POST['pass']);
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }
        if (isset($_POST['npass'])) {
            $npass = trim($_POST['npass']);
            if ($npass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'New Password is required';
        }
        if (isset($_POST['cpass'])) {
            $cpass = trim($_POST['cpass']);
            if ($cpass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }

        $sql = "select * from users where email = '".$email."' AND pass = '".$pass."'";
        if (($result = $conn->query($sql)) !== FALSE){
            if($row = $result->fetch_assoc()){
            } else {
                $error = 'Invalid password';
            }
        }
        if (isset($passErr) || isset($error)) {} else {
            if(($npass == $cpass) && ($npass != $pass)){
                $sql = "UPDATE users SET pass = '".$cpass."'
                WHERE email = '".$_SESSION['email']."'";

                if ($conn->query($sql) === TRUE) {
                  $done = "Record updated successfully";
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                } 
            }
            else {
                $error = "New password and Confirm password don't match";
            }
        }
        $conn->close();
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
    <style>
        input, textarea {
            margin: 10px;
            border-radius: 4px;
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
                            <a href="profile.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">Edit Profile</a>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                <table>
                    <tr>
                        <td align="center">
                            <h3 style="font-family: Roboto; margin: 20px 10px 10px 10px; color: #0aab8e">CHANGE PASSWORD</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                                <input type="password" name="pass" value="" placeholder="Password" style="padding: 10px; width: 300px">
                                <input type="password" name="npass" value="" placeholder="New Password" style="padding: 10px; width: 300px">
                                <input type="password" name="cpass" value="" placeholder="Confirm Password" style="padding: 10px; width: 300px">
                                <input type="submit" name="submit" value="CHANGE" style="color: #0aab8e; margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">

                                <?php
                                    if (isset($passErr)) {
                                        echo "<span style='color: red; font-size: 14px; display: block;'>* " . $passErr . "</span>";
                                    }
                                ?>
                                <?php
                                    if (isset($error) && !isset($passErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $error . "</span>";
                                    }
                                ?>
                                <?php
                                    if (isset($done)) {
                                        echo "<br/><span style='color: green; font-size: 14px'>* " . $done . "</span>";
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