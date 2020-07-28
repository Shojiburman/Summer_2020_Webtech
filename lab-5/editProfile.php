<!DOCTYPE html>
<html>

<head>
    <title>Edit profile</title>
</head>

<body>
    <table width="500px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <p style="display: inline-block;">Logged in as Bob</p>
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
                    <legend>EDIT PROFILE</legend>
                    <table>
                        <tr>
                            <td>
                                <form method="post" action="">
                                    <br />
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td><input name="uname" type="text"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>
                                                <input name="email" type="text">
                                                <abbr title="hint: sample@example.com"><b>i</b></abbr>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr />
                                            </td>
                                        </tr> 
                                        <tr>
                                            <td colspan="3">
                                                <fieldset>
                                                    <legend>Gender</legend>
                                                    <input name="gender" type="radio">Male
                                                    <input name="gender" type="radio">Female
                                                    <input name="gender" type="radio">Other
                                                </fieldset>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <hr />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <fieldset>
                                                    <legend>Date of Birth</legend>
                                                    <input type="text" size="2" />/
                                                    <input type="text" size="2" />/
                                                    <input type="text" size="4" />
                                                    <font size="2"><i>(dd/mm/yyyy)</i></font>
                                                </fieldset>
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