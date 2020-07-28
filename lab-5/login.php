<?php
    session_start(); 

    if(isset($_SESSION['login_user'])){
        header("location:dashboard.php");
        die();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <table width="500px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <a href="publicHome.html">Home</a>
                <a href="registration.html">Registration</a>
                <a href="login.html">Login</a>
            </td>
        </tr>
        <tr height="120px">
            <td colspan="2" align="center" style="padding: 40px 100px 40px 100px;">
                <form action="logCheck.php" method="post">
                    <fieldset style="width: 200px;">
                        <legend>Login</legend>
                        <table>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td style="padding-bottom: 10px;"><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top: 1px solid black; padding-top: 10px;">
                                    <input type="checkbox" name="remember" value=""><label>Remember me</label> <br> <br>
                                    <input type="submit" name="submit" value="Submit">
                                    <a href="forgotPassword.html">Forgot Password?</a>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </form>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>