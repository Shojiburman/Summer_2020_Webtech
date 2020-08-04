<?php
    session_start();
    include 'session.php';
    if (isset($_POST['submit'])) {
        if (isset($_POST['cpass'])) {
            $cpass = $_POST['cpass'];
            if ($cpass == '') {
                $passErr = 'Current Password can not be empty';
            }
        } else {
            $passErr = 'Current Password is required';
        }

        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
            if ($pass == '') {
                $passErr = 'New Password can not be empty';
            }
        } else {
            $passErr = 'New Password is required';
        }

        if (isset($_POST['confPass'])) {
            $confPass = $_POST['confPass'];
            if ($confPass == '') {
                $passErr = 'Confirm Password can not be empty';
            } else {
                if (isset($pass) && ($pass == $confPass)) {
                    if (isset($_COOKIE['pass']) && $_COOKIE['pass'] == $cpass) {
                        setcookie('pass', $pass, time() + (10 * 365 * 24 * 60 * 60));
                        $passSuc = 'Password updated successfully';
                    } else {
                        $passErr = 'Wrong credentials;';
                    }
                } else {
                    $passErr = 'Retype Password &  New Password must match';
                }
            }
        } else {
            $passErr = 'Retype Password is required';
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>change password</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        strong {
            color: red;
        }

        em {
            color: green;
        }
    </style>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <p style="display: inline-block;">Logged in as <?php echo $_COOKIE['name']; ?></p>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="150px" style="padding: 0px 10px" align="top">
                <b>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account</p>
                </b>
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
                                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                    <table width="100%" cellpadding="1" cellspacing="0">
                                        <tr>
                                            <td>Current password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="cpass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="color: green">New password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="pass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="color: red">Retype password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="confPass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <hr />
                                    <?php if (isset($passErr)) { echo '<strong>' . $passErr . '</strong><br/><br/>'; } ?>
                                    <?php if (isset($passSuc)) { echo '<em>' . $passSuc . '</em><br/><br/>'; } ?>
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