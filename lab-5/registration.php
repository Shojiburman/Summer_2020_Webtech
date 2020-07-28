<?php
    session_start(); 

    if(isset($_SESSION['login_user'])){
        header("location:dashboard.php");
        die();
    }

    $name = $uname = $email = $gender = "";
    if (isset($_POST['submit'])) {
        if (isset($_POST['name'])) {
            $name = trim($_POST['name']);
            if (!$name == '') {
                if(str_word_count($name) > 1) {
                    if (ctype_alpha($name[0])) {
                        if (!validateName($name)) {
                            $nameErr = 'Name must contain a-z, A-Z, dot(.) or dash(-)';
                        }
                    } else {
                        $nameErr = 'Name must start with a letter';
                    }
                } else {
                    $nameErr = 'Name can not be less than two words';
                }
            } else {
                $nameErr = 'Name can not be empty';
            }
        } else {
            $nameErr = 'Name is required';
        }

        if (isset($_POST['uname'])) {
            $uname = strtolower(trim($_POST['uname']));
            if ($uname == '') {
                $unameErr = 'User Name can not be empty';
            }
        } else {
            $unameErr = 'User Name is required';
        }

        if (isset($_POST['pass'])) {
            $pass = trim($_POST['pass']);
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            }
        } else {
            $passErr = 'Password is required';
        }

        if (isset($_POST['confPass'])) {
            $confPass = trim($_POST['confPass']);
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

        if (empty($_POST["gender"])) {
           $genderErr = "Gender is required";
        } else {
            $gender = $_POST['gender'];
        }

        if (empty($_POST["year"])) {
            $year = $_POST["year"];
            $dateErr = "Year(yyyy) is required";
        } else {
            $year = intval(trim($_POST['year']));
            if ($year < 2017 && $year > 1899) {
                if (empty($_POST["month"])) {
                    $month = $_POST["month"];
                    $dateErr = "Month(mm) is required";
                } else {
                    $month = intval(trim($_POST['month']));
                    if ($month > 0 && $month < 13){
                        $longmm = [1, 3, 5, 7, 8, 10, 12];
                        $shortmm = [4, 6, 9, 11];
                        if (empty($_POST["date"])) {
                            $date = $_POST["date"];
                            $dateErr = "Date(dd) is required";
                        } else {
                            $date = intval(trim($_POST['date']));
                            if (in_array($month, $longmm)) {
                                if ($date > 31 || $date < 1) {
                                   $dateErr = "Date(dd) must be between 1 -31";
                                }
                            } else if (in_array($month, $shortmm)) {
                                if ($date > 30 || $date < 1) {
                                   $dateErr = "Date(dd) must be between 1 -30";
                                }
                            } else if ($month == 2) {
                                if ((($year % 4 == 0) && ($year % 100!= 0)) || ($year % 400 == 0)) {
                                    if ($date > 29 || $date < 1) {
                                       $dateErr = "Date(dd) must be between 1 -29";
                                    }
                                } else {
                                    if ($date > 28 || $date < 1) {
                                       $dateErr = "Date(dd) must be between 1 -28";
                                    }
                                }
                            }
                        }
                    } else {
                        $dateErr = "Month(mm) must be between 1 -12";
                    }                            
                }
            } else {
                $dateErr = "Year(yyyy) must be between 1900 - 2016";
            }
        }

        if (isset($nameErr) || isset($unameErr) || isset($emailErr) || isset($passErr) || isset($genderErr) || (isset($dateErr))) {} else {
            setcookie('name', $name, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('email', $email, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('uname', $uname, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('pass', $pass, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('gender', $gender, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('dd', $date, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('mm', $month, time() + (10 * 365 * 24 * 60 * 60));
            setcookie('yy', $year, time() + (10 * 365 * 24 * 60 * 60));
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
    <table width="500px" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="50px">
            <td colspan="2" align="right">
                <a href="publicHome.php">Home</a>
                <a href="registration.php">Registration</a>
                <a href="login.php">Login</a>
            </td>
        </tr>
        <tr height="auto">
            <td colspan="2" style="padding: 40px 100px 40px 100px;">
                <fieldset style="display: block; width: 350px; margin: 20px auto">
                    <legend><b>REGISTRATION</b></legend>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <br />
                        <table width="100%" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>
                                    <input type="text" name="email" value="<?php echo $email;?>">
                                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td>User Name</td>
                                <td>:</td>
                                <td><input type="text" name="uname" value="<?php echo $uname;?>"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><input name="pass" type="password"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>:</td>
                                <td><input name="confPass" type="password"></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <fieldset>
                                        <legend>Gender</legend>
                                        <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?>><label>Male</label>
                                        <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?>><label>Female</label>
                                        <input type="radio" name="gender" value="Other" <?php if (isset($gender) && $gender == "Other") echo "checked"; ?>><label>Other</label>
                                    </fieldset>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <hr />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <fieldset>
                                        <legend>Date of Birth</legend>
                                        <input type="number" name="date" value="<?php echo $date;?>" size="1px"><strong style="color: black">/ </strong>
                                        <input type="number" name="month" value="<?php echo $month;?>" size="1px"><strong style="color: black">/ </strong>
                                        <input type="number" name="year" value="<?php echo $year;?>" size="2px"><i> (dd/mm/yyyy)</i>
                                    </fieldset>
                                </td>
                                <td></td>
                            </tr>
                        </table>
                        <hr/>
                        <?php 
                            if (isset($nameErr)) {
                                echo "<strong><span>" . $nameErr . "</span></strong><br/>";
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
                            if (isset($genderErr)) {
                                echo "<strong><span>" . $genderErr . "</span></strong><br/>";
                            }
                            if (isset($dateErr)) {
                                echo "<strong><span>" . $dateErr . "</span></strong><br/>";
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