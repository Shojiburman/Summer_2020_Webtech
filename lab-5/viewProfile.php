<?php
    session_start();
    include 'session.php';
    $name = $_COOKIE['name'];
    $email = $_COOKIE['email'];
    $gender = $_COOKIE['gender'];
    $date = $_COOKIE['dd'];
    $month = $_COOKIE['mm'];
    $year = $_COOKIE['yy'];
    $pic = 'profile.png';
    if (isset($_COOKIE['pic'])) {
        $pic = $_COOKIE['pic'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Veiw profile</title>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <p style="display: inline-block;">Logged in as <?php echo $name; ?> | </p>
                <a href="login.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="250px" style="padding: 0px 10px" align="top">
                <strong>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account</p>
                </strong>
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="viewProfile.php">Veiw Profile</a></li>
                    <li><a href="editProfile.php">Edit Profile</a></li>
                    <li><a href="changeProfilePicture.php">Change Profile picture</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <fieldset style="width: 720px;">
                    <legend>Profile</legend>
                    <table>
                        <tr>
                            <td style="width: 500px">
                                <p>Name : <?php echo $name; ?></p>
                                <p>Email : <?php echo $email; ?></p>
                                <p>Gender : <?php echo $gender; ?></p>
                            </td>
                            <td align="center">
                                <img width="100px" src="<?php echo $pic; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Date of Birth : <?php echo $date . '/' . $month . '/' . $year; ?></p>
                            </td>
                            <td align="center">
                                <a href="changeProfilePicture.php">change</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="editProfile.php">Edit Profile</a></td>
                        </tr>
                    </table>
                </fieldset>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>