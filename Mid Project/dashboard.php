<?php
    session_start();
    include 'php/session.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Logged in Dashboard</title>
    <style>
        #dashboard {
            border: 2px solid #0aab8e !important;
        }
    </style>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>
    <table width="992" border="0" cellpadding="0" cellspacing="0" align="center" width="200px" height="300px" style="background-color: #f3f5f7">
        <tr height = "120px">
        	<td style="padding-left: 10px; text-align: center;"><h1>Welcome <b style="color: #0aab8e"><?php echo strtoupper($c_name); ?></b></h1></td>
        </tr>
    </table>
</body>

</html>