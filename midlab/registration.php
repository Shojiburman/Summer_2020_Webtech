<?php
    session_start(); 

    if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
        header("location:dashboard.php");
        die();
    }

    $id = $uname = $email = $uType = "";
    if (isset($_POST['submit'])) {
        if (isset($_POST['id'])) {
            $id = trim($_POST['id']);
            if (!$id == '') {
                if(is_numeric($id)){

                } else {
                    $idErr = 'ID can not be chracters';
                }
            } else {
                $idErr = 'ID can not be empty';
            }
        } else {
            $idErr = 'ID is required';
        }

        if (isset($_POST['uname'])) {
            $uname = strtolower(trim($_POST['uname']));
            if ($uname == '') {
                $unameErr = 'User Name can not be empty';
            } else { 
            $file = fopen('user.txt', 'r');
            $data = fread($file, filesize('user.txt'));
            $userData = explode("|",$data);
            foreach ($userData as $us) {
                if(trim($us) == $uname){
                    $unameErr = 'User Name is taken';
                }
            }
            fclose($file);
        }
        } else {
            $unameErr = 'User Name is required';
        }

        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }

        if (isset($_POST['confPass'])) {
            $confPass = $_POST['confPass'];
            if ($confPass == '') {
                $passErr = 'Confirm Password can not be empty';
            } else {
                if (isset($pass) && ($pass == $confPass)) {} else {
                    $passErr = 'Confirm Password & password must match';
                }
            }
        } else {
            $passErr = 'Confirm Password is required';
        }

        if (isset($_POST['uType'])) {
            $uType = $_POST['uType'];
            if ($confPass == '') {
                $utypeErr = 'User Type can not be empty';
            }
        } else {
            $utypeErr = 'User Type is required';
        }

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
                                    if (strlen($domainExt) > 1 && validateDomainExt($domainExt)) {} else {
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
            } else {
                $emailErr = 'Email can not be empty';
            }
        } else {
            $emailErr = 'Email is required';
        }

        if (isset($idErr) || isset($unameErr) || isset($emailErr) || isset($passErr) || (isset($utypeErr))) {} else {
            /*setcookie('id', $id, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('email', $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('uname', $uname, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('pass', $pass, time() + (10 * 365 * 24 * 60 * 60));*/

            $file = fopen('user.txt', 'a');
            fwrite($file, $uname.'|'.$pass.'|'.$uType.'|'.$id.'|'.$email.'|'."\r\n");
            fclose($file);

            header('location: login.php');
        }            
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
    <title>Registration</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        strong {
            color: red;
        }
    </style>
</head>

<body>    
    <table width="1000px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <a href="publicHome.php">Home</a>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
            </td>
        </tr>
        <tr height="auto">
            <td colspan="2" style="padding: 40px 100px 40px 100px;">
                <fieldset style="display: block; width: 500px; margin: 20px auto">
                    <legend><b>REGISTRATION</b></legend>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <br />
                        <table width="100%" cellpadding="2" cellspacing="0">
                            <tr>
                                <td>ID</td>
                                <td><input type="text" name="id" value="<?php echo $id;?>"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>
                                    <input type="text" name="email" value="<?php echo $email;?>">
                                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                                </td>
                            </tr>
                            <tr>
                                <td>User Name</td> 
                                <td><input type="text" name="uname" value="<?php echo $uname;?>"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input name="pass" type="password"></td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td><input name="confPass" type="password"></td>
                            </tr>
                            <tr>
                                <td>
                                    <label>User Type</label>
                                    <select name="uType">
                                        <option value="" >Select</option>
                                        <option value="user" >User</option>
                                        <option value="admin" >Admin</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <?php 
                            if (isset($idErr)) {
                                echo "<strong><span>" . $idErr . "</span></strong><br/>";
                            }
                            if (isset($emailErr)) {
                                echo "<strong><span>" . $emailErr . "</span></strong><br/>";
                            }
                            if (isset($unameErr)) {
                                echo "<strong><span>" . $unameErr . "</span></strong><br/>";
                            }
                            if (isset($passErr)) {
                                echo "<strong><span>" . $passErr . "</span></strong><br/>";
                            }
                            if (isset($utypeErr)) {
                                echo "<strong><span>" . $utypeErr . "</span></strong><br/>";
                            }
                        ?>
                        <br/>
                        <input name="submit" type="submit" value="Submit">
                        <input name="reset" type="reset">
                    </form>
                </fieldset>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>