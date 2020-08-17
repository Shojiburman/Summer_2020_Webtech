<?php
    session_start();
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    include 'php/session.php';
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    include 'upload.php';
?>



<!DOCTYPE html>
<html>

<head>
    <title>Change Password</title>
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
                        <div style="width: 200px; height: 200px; display: block; margin: 0 auto">
                                <img src="<?php echo $c_pic; ?>" style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
                        </div>
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
            <td width="600px" height="600px" style="background-color: #f3f5f7" align="center">
                <table>
                    <tr>
                        <td align="center">
                            <h3 style="font-family: Roboto; margin: 20px auto 10px auto; color: #0aab8e;">CHANGE PROFILE PICTURE</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
                                <input type="file" name="fileToUpload" value="" style="padding: 10px; display: block; margin: 0 auto; width: 171px">
                                <input type="submit" name="submit" value="CHANGE" style="color: #0aab8e; margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">
                                <?php
                                    if (isset($uploadMsgErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $uploadMsgErr . "</span>";
                                    }
                                    if (isset($uploadMsgSuccess)) {
                                        echo "<br/><span style='color: green; font-size: 14px'>* " . $uploadMsgSuccess . "</span>";
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