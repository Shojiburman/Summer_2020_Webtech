<!DOCTYPE html>
<html>

<head>
    <title>change password</title>
</head>

<body>
    <table width="500px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <p style="display: inline-block;">Logged in as Bob</p>
                <a href="login.html">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="150px" style="padding: 0px 10px" align="top">
                <strong>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account</p>
                </strong>
                <ul>
                    <li><a href="dashboard.html">Dashboard</a></li>
                    <li><a href="viewProfile.html">Veiw Profile</a></li>
                    <li><a href="editProfile.html">Edit Profile</a></li>
                    <li><a href="changeProfilePicture.html">Change Profile picture</a></li>
                    <li><a href="changePassword.html">Change Password</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <fieldset>
                    <legend>EDIT PROFILE</legend>
                    <table>
                        <tr>
                            <td>
                                <form method="post" action="">
                                    <table width="100%" cellpadding="1" cellspacing="0">
                                        <tr>
                                            <td>Current password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="uname" type="text">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="color: green">New password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="email" type="text">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="color: red">Retype password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="email" type="text">
                                            </td>
                                            <td></td>
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