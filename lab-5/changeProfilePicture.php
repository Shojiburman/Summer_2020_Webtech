<?php
    session_start();
    include 'session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile Picture</title>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <p style="display: inline-block;">Logged in as <?php echo $_COOKIE['name']; ?></p>
                <a href="login.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="150px" style="padding: 0px 10px" align="top">
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
                <fieldset>
                    <legend>PROFILE PICTURE</legend>
                    <table>
                        <tr>
                            <td>
                                <form method="post" action="">
                                    <br />
                                    <table cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td colspan="4">
                                                <img width="80px" src="profile.png">
                                                <input type="file" name="pic"><br>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr />
                                    <input name="submit" type="submit" value="Submit">
                                </form>
                            </td>
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