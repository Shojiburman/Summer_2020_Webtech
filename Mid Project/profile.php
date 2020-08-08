<?php
    session_start();
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    include 'session.php';
    $name = $_SESSION['name'];

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $name = $email = $work = $pnumber = $address = $dob = $bio = "";
    if (isset($_POST['submit'])) {
        $name = strtolower(trim($_POST['name']));
        $email = strtolower(trim($_POST['email']));
        $work = strtolower(trim($_POST['work']));
        $pnumber = strtolower(trim($_POST['pnumber']));
        $address = strtolower(trim($_POST['address']));
        $bio = strtolower(trim($_POST['bio']));

        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
            if (!$email == '') {
                if (substr_count($email, ' ') == 0) {
                    if (substr_count($email, '@') == 0) {
                        $emailErr = 'Email must have "@"';
                    } else if (substr_count($email, '@') == 1) {
                        if (strpos($email, '@') != 0) {
                            if (substr_count($email, '.') != 0) {
                                $atpos = strpos($email, '@');
                                $domainPart = substr($email, $atpos + 1);

                                $dotpos = strrpos($domainPart, '.');
                                $domainExt = substr($domainPart, $dotpos + 1);
                                $domainName = str_replace('.' . $domainExt, "", $domainPart);
                                if (strlen($domainName) > 0 && validateDomainName($domainName)) {
                                    if (strlen($domainExt) > 1 && validateDomainExt($domainExt)) {

                                    } else {
                                        $emailErr = 'Email must have more than 1 letter and letters only after last ".", should not start with number.';
                                    }
                                } else {
                                    $emailErr = 'Email can only have dot(.), dash(-), chracters and numbers between "@" and last "." with no adjacent "@" or "."';
                                }
                            } else {
                                $emailErr = 'Email must have "."';
                            }
                        } else {
                            $emailErr = 'Email can not start with "@"';
                        }                   
                    } else {
                        $emailErr = 'Email can not have multiple "@"';
                    } 
                } else {
                    $emailErr = 'Email can not have spaces';
                }
            }
        }
    $sql = "select email from users where email = '".$email."'";
    if (($result = $conn->query($sql)) !== FALSE)
    {
        while($row = $result->fetch_assoc())
        {
            $emailErr = "Email is taken";
        }
    }

        /*if (isset($emailErr)) {} else {
            $sql = "UPDATE users SET name = '$name', 
            email = '$email', 
            work = '$work', 
            pnumber = '$pnumber', 
            address = '$address', 
            bio = '$bio'
            WHERE email = '".$_SESSION['email']."'";

            if ($conn->query($sql) === TRUE) {
              $error = "Record updated successfully";
              header('location: profile.php');
            } else {
              $error = "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }*/
    }


    function validateName($string) {
        $array = str_split($string);
        foreach ($array as $value) {
            if ($value == '.' || $value == '-' || $value == ' ' || ctype_alpha($value)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }

    function validateDomainName($string) {
        foreach (explode(".", $string) as $part) {
            if ($part == '') {
                return false;
            }
        }
        $array = str_split($string);
        foreach ($array as $value) {
            if ($value == '-' || $value == '.' || is_numeric($value) || ctype_alpha($value)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }

    function validateDomainExt($string) {
        if (is_numeric($string[0])) {
            return false;
        }
        $array = str_split($string);
        foreach ($array as $value) {
            if (is_numeric($value) || ctype_alpha($value)) {
                continue;
            } else {
                return false;
            }
        }
        return true;
    }















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
                                <img src="edit.svg" width="15px" style="display: block; margin: 7px auto; border: 1px solid #0aab8e; border-radius: 5px; padding: 7px">
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
                            <a href="changePass.php" style="text-decoration: none; color: #0aab8e; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white;">Change Password</a>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="600px" height="600px" style="background-color: #f3f5f7">
                <table>
                    <tr>
                        <td align="center">
                            <h3 style="font-family: Roboto; margin: 20px 10px 10px 10px; color: #0aab8e">EDIT PROFILE</h3>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                                <input type="text" name="name" value="<?php echo $_SESSION['name'] ?>" placeholder="Name" style="padding: 10px; width: 300px">
                                <input type="text" name="email" value="<?php echo $_SESSION['email'] ?>" placeholder="Email" style="padding: 10px; width: 300px">
                                <input type="text" name="work" value="<?php echo $_SESSION['work'] ?>" placeholder="Work" style="padding: 10px; width: 300px">
                                <input type="text" name="pnumber" value="<?php echo $_SESSION['pnumber'] ?>" placeholder="Contact Number" style="padding: 10px; width: 300px">
                                <input type="text" name="address" value="<?php echo $_SESSION['address'] ?>" placeholder="Address" style="padding: 10px; width: 300px">
                                <input type="text" name="dob" value="" placeholder="Birthdate" style="padding: 10px; width: 300px">
                                <textarea type="text" name="bio" value="" placeholder="Bio" style="padding: 10px; width: 300px"></textarea>
                                <input type="submit" name="submit" value="SAVE" style="color: #0aab8e; margin: 20px auto; display: block; padding: 10px 30px; border: 1.5px solid #0aab8e; border-radius: 5px; background-color: white; cursor: pointer;">
                                <?php
                                    if (isset($error)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $error . "</span>";
                                    }
                                ?>
                            </form>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>