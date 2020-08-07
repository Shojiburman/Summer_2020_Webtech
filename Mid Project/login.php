<?php
    session_start(); 
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    $email = $pass = "";
    $remember = [];
    if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
        header("location:dashboard.php");
        die();
    }

    if (isset($_POST['submit'])) {
        if (isset($_POST['email'])) {
            $email = strtolower(trim($_POST['email']));
            if ($email == '') {
                $emailErr = 'Email can not be empty';
            }
        } else {
            $emailErr = 'Email is required';
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

        if(isset($emailErr) || isset($passErr)){}
            else { 
                $sql = "select * from users where email = '".$email."' AND pass = '".$pass."'";
                if (($result = $conn->query($sql)) !== FALSE){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['status']  = "Ok";
                        $_SESSION['id'] = $row['u_id'];
                        $_SESSION['name'] = $row['name'];
                        if(isset($remember) && in_array('yes', $remember)){
                            setcookie('remember', $email, time() + (10 * 365 * 24 * 60 * 60));
                        } else {
                            setcookie('remember', "");
                        }
                        header('location: dashboard.php');
                    } 
                    $passErr = 'Invalid user/password';
                } 
            $conn->close();
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
                                <td>Email</td>
                                <td>: </td>
                                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
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
                    if (isset($emailErr)) {
                        echo "<strong><span>" . $emailErr . "</span></strong><br/>";
                    }
                    if (isset($passErr)) {
                        echo "<strong><span>" . $passErr . "</span></strong><br/>";
                    }
                    if (isset($Err)) {
                        echo "<strong><span>" . $Err . "</span></strong><br/>";
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