<?php
    session_start(); 
    $uname = $pass = "";
    $remember = [];
    if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
        header("location:dashboard.php");
        die();
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['uname'])) {
            $uname = strtolower(trim($_POST['uname']));
            if ($uname == '') {
                $unameErr = 'User Name can not be empty';
            }
        } else {
            $unameErr = 'User Name is required';
        }

        if (isset($_POST['pass'])) {
            $pass = trim($_POST['pass']);
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }

        if (isset($_POST["remember"])) {
            $remember = $_POST['remember'];
        }

        if(isset($unameErr) || isset($passErr)){}
            else { 
            $file = fopen('user.txt', 'r');
            $data = fread($file, filesize('user.txt'));
            $userData = explode("|",$data);
            $i = 0;
            foreach ($userData as $us) {
                if(trim($us) == $uname){
                    if(trim($userData[$i+1]) == $pass){
                        if(trim($userData[$i+2]) == "user"){
                            $_SESSION['uType']  = "user";
                            $_SESSION['status']  = "Ok";
                            $_SESSION['login_user'] = $uname;
                            if(isset($remember) && in_array('yes', $remember)){
                                setcookie('remember', $uname, time() + (10 * 365 * 24 * 60 * 60));
                            } else {
                                setcookie('remember', "");
                            }
                            header('location: dashboard.php');
                        } else if(trim($userData[$i+2]) == 'admin'){
                            $_SESSION['uType']  = "admin";
                            $_SESSION['status']  = "Ok";
                            $_SESSION['login_user'] = $uname;
                            if(isset($remember) && in_array('yes', $remember)){
                                setcookie('remember', $uname, time() + (10 * 365 * 24 * 60 * 60));
                            } else {
                                setcookie('remember', "");
                            }
                            header('location: dashboardAdmin.php');
                        } else {
                            header('location: registration.php');
                        }
                    } else {
                        $passErr = 'Invalid password';
                    }
                }
                $i++;
            } $passErr = 'Invalid user/password';
            fclose($file);
        }                    
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <style>
        strong {
            color: red;
        }
    </style>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <a href="publicHome.php">Home</a>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
            </td>
        </tr>
        <tr height="120px">
            <td colspan="2" align="center" style="padding: 40px 100px 40px 100px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <fieldset style="width: 200px;">
                        <legend>Login</legend>
                        <table>
                            <tr>
                                <td>Username</td>
                                <td>: </td>
                                <td><input type="text" name="uname" value="<?php echo $uname;?>"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>: </td>
                                <td><input type="password" name="pass" value="<?php echo $pass;?>"></td>
                            </tr>
                            <tr>
                                <td colspan="3" style = "padding-top: 10px;">
                                    <input id="remember" type="checkbox" name="remember[]" value="yes" <?php if (isset($remember) && in_array('yes', $remember)) echo "checked"; ?>><label for="remember">Remember me</label> <br> <br>
                                    <input type="submit" name="submit" value="Submit">
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
                <br/>
                <?php 
                    if (isset($unameErr)) {
                        echo "<strong><span>" . $unameErr . "</span></strong><br/>";
                    }
                    if (isset($passErr)) {
                        echo "<strong><span>" . $passErr . "</span></strong><br/>";
                    }
                ?>
                <br/>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>