<!DOCTYPE html>
<html>

<head>
    <title>Veiw profile</title>
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
            <td width="200px" style="padding: 0px 10px" align="top">
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
                <fieldset style="width: 280px;">
                    <legend>Profile</legend>
                    <table>
                        <tr>
                            <td style="width: 150px">
                                <p>Name : </p>
                                <p>Email : </p>
                                <p>Gender : </p>
                            </td>
                            <td align="center">
                                <img width="100px" src="profile.png">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <p>Date of Birth : </p>
                            </td>
                            <td align="center">
                                <a href="changeProfilePicture.html">change</a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="">Edit Profile</a></td>
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