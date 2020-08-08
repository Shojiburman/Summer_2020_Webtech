<?php
    session_start();
    include 'session.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logged in Dashboard</title>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>

    <table width="992" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height = "120px">
        	<td style="padding-left: 10px;">Welcome <b><?php echo ucwords($_SESSION['name']); ?></b></td>
        </tr>
    </table>
</body>

</html>
