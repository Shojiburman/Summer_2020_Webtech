<?php
    session_start(); 

    if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
        header("location:dashboard.php");
        die();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Public Home</title>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height = "50px">
            <td colspan="2" align="right"><a href="#">Home</a>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
            </td>
        </tr>
        <tr height = "120px">
        	<td colspan="2">Welcome to xCompany</td>
        </tr>
        <tr height = "30px">
        	<td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>