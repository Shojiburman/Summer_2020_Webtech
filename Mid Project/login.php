<?php
    session_start(); 

    $email = $pass = "";
    $remember = [];
    if(isset($_SESSION['name']) || isset($_COOKIE['remember'])){
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
                $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "select * from users where email = '".$email."' AND pass = '".$pass."'";
                if (($result = $conn->query($sql)) !== FALSE){
                    while($row = $result->fetch_assoc()){
                        $_SESSION['id'] = $row['u_id'];
                        if(isset($remember) && in_array('yes', $remember)){
                            setcookie('remember', $row['u_id'], time() + (10 * 365 * 24 * 60 * 60));
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
        #login {
            border: 2px solid #0aab8e !important;
        }
    </style>
</head>

<body>
 
    <?php
    include 'nav.html';
    ?>
    <table width="auto" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="120px">
            <td colspan="2" align="center" style="padding: 40px 100px 40px 100px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <h1 style="color: #0aab8e">Sign in to Protibeshi</h1>
                    <table>
                        <tr>
                            <td>
                                <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email" style="padding: 10px; width: 300px">
                                <?php
                                    if (isset($emailErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $emailErr . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pass" value="<?php echo $pass;?>" placeholder="Password" style="padding: 10px; width: 300px">
                                <?php
                                    if (isset($passErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $passErr . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style = "padding-top: 10px;">
                                <input id="remember" type="checkbox" name="remember[]" value="yes" <?php if (isset($remember) && in_array('yes', $remember)) echo "checked"; ?>><label for="remember">Remember me</label>
                                <input type="submit" name="submit" value="SIGN IN" style="margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">
                            </td>
                        </tr>
                    </table>
                </form>
                <?php 
                    if (isset($Err)) {
                        echo "<strong><span>" . $Err . "</span></strong><br/>";
                    }
                ?>
            </td>
        </tr>
    </table>
</body>

</html>