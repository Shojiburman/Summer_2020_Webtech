<?php
    session_start();
    include 'session.php';
    $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    <?php
        include 'adminNav.html';
    ?>

    <table align="center">
        <tr>
            <td width="300px" height="600px" style="background-color: #f3f5f7">
                <table align="center">
                    <tr>
                        <td>
                            <img src="profile.png" width="200px" style="border-radius: 50%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e;  border-top: 1px solid #0aab8e; padding-bottom: 10px; padding-top: 10px"><?php echo strtoupper($_SESSION['name']); ?></p>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e; padding-bottom: 10px"><?php echo ($_SESSION['email']); ?></p>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                
            </td>
        </tr>
    </table>
</body>

</html>