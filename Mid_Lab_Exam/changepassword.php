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
                $passErr = 'Re-Password can not be empty';
            } else {
                if (isset($pass) && ($pass == $confPass)) {
                    $file = fopen('user.txt', 'r');
                    $data = fread($file, filesize('user.txt'));
                    $userData = explode("|",$data);
                    $i = 0;
                    foreach ($userData as $us) {
                        if(trim($us) == trim($_SESSION['login_user'])){
                            if(trim($userData[$i+1]) == $cpass){
                                $filedata = file_get_contents('user.txt');
                                $repP = trim($_SESSION['login_user']) . "|" . $cpass;
                                $repA = trim($_SESSION['login_user']) . "|" . $pass;
                                $strReplace = str_replace($repP, $repA, $filedata);
                                file_put_contents('user.txt', $strReplace);
                            }
                        }
                        $i++;
                    }
                    fclose($file);
                    $passSuc = 'Password updated successfully';
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
            <td colspan="2" align="right" style="padding-right: 10px">
                <p style="display: inline-block;">Logged in as <b><?php echo ucwords($_SESSION['login_user']); ?></b></p>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr>
            <td width="150px" style="padding: 0px 10px" align="top">
                <b>
                    <p style="border-bottom: 1px solid black; padding: 10px 0">Account</p>
                </b>
                <ul style="list-style-type: none;">
                    <li>
                        <?php if($_SESSION['uType'] == 'admin'){ ?>
                            <a href="dashboardAdmin.php" >Dashboard</a>
                        <?php ?>
                        <?php } else if($_SESSION['uType'] == "user"){ ?>
                            <a href="dashboard.php" >Dashboard</a>
                        <?php } ?> 
                    </li>
                    <li><a href="viewProfile.php">Veiw Profile</a></li>
                    <?php if($_SESSION['uType'] == 'admin'){ ?>
                        <li>
                            <a href="viewUsers.php">View Users</a>
                        </li>
                    <?php } ?>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
            <td align="left" style="padding: 10px">
                <fieldset>
                    <legend>Change Password</legend>
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
                                            <td>New password</td>
                                            <td>:</td>
                                            <td>
                                                <input name="pass" type="password">
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>Retype password</td>
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
                                    <input name="submit" type="submit" value="Change">
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