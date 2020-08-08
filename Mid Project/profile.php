<?php
    session_start();
    include 'session.php';
    $name = $_SESSION['name'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <style>
        input, textarea {
            margin: 10px;
            border-radius: 4px;
        }
    </style>
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
                            <form>
                                <img src="edit.svg" width="20px" style="display: block; margin: 5px auto; border: 1px solid #0aab8e; border-radius: 5px; padding: 5px">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e;  border-top: 1px solid #0aab8e; padding-bottom: 10px; padding-top: 10px"><?php echo strtoupper($_SESSION['name']); ?></p>
                            <p align="center" style="font-family: ROBOTO; border-bottom: 1px solid #0aab8e; padding-bottom: 10px"><?php echo ($_SESSION['email']); ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top: 50px">
                            <a href="" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">Change Password</a>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                <table>
                    <tr>
                        <td align="center">
                            <h3 style="font-family: Roboto; margin: 20px 10px 10px 10px;">EDIT PROFILE</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <input type="text" name="email" value="" placeholder="Name" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="" placeholder="Email" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="" placeholder="Work" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="" placeholder="Contact Number" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="" placeholder="Address" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="" placeholder="Birthdate" style="padding: 10px; width: 300px">
                                <textarea type="text" name="email" value="" placeholder="Bio" style="padding: 10px; width: 300px"></textarea>
                                <input type="submit" name="submit" value="SAVE" style="margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>