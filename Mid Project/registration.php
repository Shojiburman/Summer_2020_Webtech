<?php
    session_start(); 
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

    if(isset($_SESSION['login_user']) || isset($_COOKIE['remember'])){
        header("location:dashboard.php");
        die();
    }

    $name = $email = "";
    if (isset($_POST['submit'])) {
        if (isset($_POST['name'])) {
            $name = strtolower(trim($_POST['name']));
            if ($name == '') {
                $nameErr = 'Name can not be empty';
            }
        } else {
            $nameErr = 'User Name is required';
        }

        if (isset($_POST['pass'])) {
            $pass = $_POST['pass'];
            if ($pass == '') {
                $passErr = 'Password can not be empty';
            } else {
            	if(strlen($pass) <= 6) {
            		$passErr = "Password can't be less than 6 characters";
            	}
            }
        } else {
            $passErr = 'Password is required';
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
            } else {
                $emailErr = 'Email can not be empty';
            }
        } else {
            $emailErr = 'Email is required';
        }


        $sql = "select email from users where email = '".$email."'";
        if (($result = $conn->query($sql)) !== FALSE)
        {
            while($row = $result->fetch_assoc())
            {
                $emailErr = "Email is taken";
            }
        }

        if (isset($nameErr) || isset($emailErr) || isset($passErr)) {} else {
			$sql = "INSERT INTO users (name, email, pass)
			VALUES ('$name', '$email', '$pass')";

			if ($conn->query($sql) === TRUE) {
			  $error = "New record created successfully";
			  header('location: login.php');
			} else {
			  $error = "Error: " . $sql . "<br>" . $conn->error;
			}

			$conn->close();
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
                <h1>Create Account</h1></b>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <br />
                    <table width="100%" cellpadding="2" cellspacing="0">
                    	<tr>
                            <td>Name</td>
                            <td><input type="text" name="name" value="<?php echo $name;?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email" value="<?php echo $email;?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input name="pass" type="password"></td>
                        </tr>
                    </table>
                    <br />
                    <?php 
                        if (isset($emailErr)) {
                            echo "<strong><span>" . $emailErr . "</span></strong><br/>";
                        }
                        if (isset($nameErr)) {
                            echo "<strong><span>" . $nameErr . "</span></strong><br/>";
                        }
                        if (isset($passErr)) {
                            echo "<strong><span>" . $passErr . "</span></strong><br/>";
                        }
                        if (isset($error)) {
                            echo "<strong><span>" . $error . "</span></strong><br/>";
                        }
                    ?>
                    <br/>
                    <input name="submit" type="submit" value="Submit">
                </form>
            </td>
        </tr>
        <tr height="30px">
            <td colspan="2" align="center">Copyright@ 2017</td>
        </tr>
    </table>
</body>

</html>