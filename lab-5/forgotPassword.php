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
    <title>Forgot Password</title>
</head>

<body>
    <table width="500px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <a href="publicHome.php">Home</a>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
            </td>
        </tr>
        <tr height="120px">
            <td colspan="2" align="center" style="padding: 40px 100px 40px 100px;">
                <form action="forgotPasswordCheck.php" method="post">
                    <fieldset style="width: 200px;">
                        <legend>FORGOT PASSWORD</legend>
                        <table>
                            <tr>
                                <td>Enter Email</td>
                                <td style="padding-bottom: 10px;"><input type="test" name="fEmail"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-top: 1px solid black; padding-top: 10px;">
                                    <input type="submit" name="submit" value="Submit">
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