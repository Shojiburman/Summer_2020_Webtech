<?php
    session_start(); 
    $conn = mysqli_connect('127.0.0.1', 'root', '', 'protibeshi');

    if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

    if(isset($_SESSION['name']) || isset($_COOKIE['remember'])){
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
            $nameErr = 'Name is required';
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
    <link rel="stylesheet" type="text/css" href="../css/body.css">
    <link rel="stylesheet" type="text/css" href="../css/registration.css">
    <link rel="stylesheet" type="text/css" href="../css/nav.css">
</head>

<body>
    <?php
    include 'nav.html';
    ?>   
    <table width="auto" border="1" cellpadding="0" cellspacing="0" align="center">
        <tr height="auto">
            <td colspan="2" style="padding: 40px 100px 40px 100px;">
                <h1 align="center" style="color: #0aab8e">Create Account</h1>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <table width="100%" cellpadding="2" cellspacing="0">
                    	<tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $name;?>" placeholder="Name" style="padding: 10px; width: 300px">
                                <?php
                                    if (isset($passErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $nameErr . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="email" value="<?php echo $email;?>" placeholder="Email" style="padding: 10px; width: 300px">
                                <?php
                                    if (isset($passErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $emailErr . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input name="pass" type="password" placeholder="Password" style="padding: 10px; width: 300px;">
                                <?php
                                    if (isset($passErr)) {
                                        echo "<br/><span style='color: red; font-size: 14px'>* " . $passErr . "</span>";
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <?php 
                        if (isset($error)) {
                            echo "<strong><span>* " . $error . "</span></strong><br/>";
                        }
                    ?>
                    <input name="submit" type="submit" value="SIGN UP" style="margin: 20px auto; display: block; padding: 10px 30px; border-radius: 5px; background-color: white; border: 1.5px solid #0aab8e; cursor: pointer;">
                </form>
            </td>
        </tr>
    </table>
</body>

</html>