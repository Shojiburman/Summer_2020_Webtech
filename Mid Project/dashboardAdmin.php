<?php
    session_start();
    include 'session.php';
    if($_SESSION['uType'] == "admin"){

?>

<!DOCTYPE html>
<html>

<head>
    <title>Logged in Dashboard</title>
</head>

<body>
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height = "50px">
            <td colspan="2" align="right" style="padding-right: 10px">
                <p style="display: inline-block;">Logged in as <b><?php echo ucwords($_SESSION['login_user']); ?></b></p>
                <a href="logout.php">Logout</a>
            </td>
        </tr>
        <tr height = "120px">
            <td width="250px" style="padding: 0px 10px">
                <strong><p style="border-bottom: 1px solid black; padding: 10px 0">Account</p></strong>
                <ul style="list-style-type: none;">
                    <li><a href="viewProfile.php">Veiw Profile</a></li>
                    <li><a href="changePassword.php">Change Password</a></li>
                    <li><a href="viewUsers.php">View Users</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </td>
        	<td style="padding-left: 10px">Welcome <b><?php echo ucwords($_SESSION['login_user']); ?></b></td>
        </tr>
        <tr height = "30px">
        	<td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>

<?php

}else if($_SESSION['uType'] == 'user'){
    header('location:dashboard.php');
}
?>