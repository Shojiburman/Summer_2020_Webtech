<!DOCTYPE html>
<html>
<head>
    <title>HTML-FORM Validation using PHP</title>
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
    <?php

        $nameErr = $emailErr = $genderErr = $websiteErr = $dateErr = $degreeErr = $bloodErr = $picErr = "";
        $name = $email = $gender = $date = $blood = $pic = "";
        $degree = [];

        if (isset($_POST['nameSubmit'])) {
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
        }

        if (isset($_POST['emailSubmit'])) {
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
                                    $domainPart = substr($email, $atpos);

                                    $dotpos = strrpos($domainPart, '.');
                                    $domainExt = substr($domainPart, $dotpos);
                                    $domainName = str_replace($domainExt,"", $domainPart);

                                    if (strlen($domainName) > 0 && validateDomainName($domainName)) {
                                        if (strlen($domainExt) > 1 && validateDomainExt($domainExt)) {} else {
                                            $emailErr = 'Email must have more than 1 letter and letters only after last "."';
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
        }

        if (isset($_POST['genderSubmit'])) {
            if (empty($_POST["gender"])) {
               $genderErr = "Gender is required";
            } else {
                $gender = $_POST['gender'];
            }
        }

        if (isset($_POST['dobSubmit'])) {
            if (empty($_POST["year"])) {
               $dateErr = "Year(yyyy) is required";
            } else {
                $year = intval(trim($_POST['year']));
                if ($year < 2017 && $year > 1899) {
                    if (empty($_POST["month"])) {
                        $dateErr = "Month(mm) is required";
                    } else {
                        $month = intval(trim($_POST['month']));
                        if ($month > 0 && $month < 13){
                            $longmm = [1, 3, 5, 7, 8, 10, 12];
                            $shortmm = [4, 6, 9, 11];
                            if (empty($_POST["date"])) {
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
        }   

        if (isset($_POST['degreeSubmit'])) {
            if (empty($_POST["degree"])) {
               $degreeErr = "Degree is required";
            } else {
                $degree = $_POST['degree'];
            }
        }

        if (isset($_POST['blood'])) {
            if (empty($_POST["blood"]) || $_POST["blood"] == '0') {
                $bloodErr = "Blood group required";
            } else {
                $blood = $_POST['blood'];
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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Name</label><br>
        <input type="text" name="name" value="<?php echo $name;?>" size="20px" style="margin: 5px 0px 5px 0px">
        <strong><span> <?php echo $nameErr;?></span></strong><br>
        <input name="nameSubmit" type="submit" value="Submit"><br><br>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Email</label><br>        
        <input type="text" name="email" value="<?php echo $email;?>" style="margin: 5px 0px 5px 0px">
        <img src="info.png" width="17px" height="17px" alt="alternative text" title="Hint: sample@example.com">
        <strong><span> <?php echo $emailErr;?></span></strong><br>
        <input name="emailSubmit" type="submit" value="Submit"><br><br>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset style="width: 200px; display: inline-block;">
            <legend>Gender</legend>
            <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?>><label>Male</label>
            <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?>><label>Female</label>
            <input type="radio" name="gender" value="Other" <?php if (isset($gender) && $gender == "Other") echo "checked"; ?>><label>Other</label>
        </fieldset>
        <strong><span><?php echo $genderErr;?></span></strong><br>
        <input name="genderSubmit" type="submit" value="Submit"><br><br>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table>
            <tr>
                <td>
                    <fieldset style="width: auto; display: inline-block;">
                        <legend>Date of birth</legend>
                            <table>
                                <tr>
                                    <td align="center">dd</td>
                                    <td></td>
                                    <td align="center">mm</td>
                                    <td></td>
                                    <td align="center">yyyy</td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 10px"><input type="number" name="date" value="<?php echo $date;?>" placeholder="" size="1px"></td>
                                    <td style="padding-bottom: 10px"><strong style="color: black"> / </strong></td>
                                    <td style="padding-bottom: 10px"><input type="number" name="month" value="<?php echo $month;?>" placeholder="" size="1px"></td>
                                    <td style="padding-bottom: 10px"><strong style="color: black"> / </strong></td>
                                    <td style="padding-bottom: 10px"><input type="number" name="year" value="<?php echo $year;?>" placeholder="" size="2px"></td>
                                </tr>
                                <tr><td colspan="5" style="border-top: 1px solid black; padding-top: 10px"><input name="dobSubmit" type="submit" value="Submit"></td></tr>
                            </table>
                    </fieldset>
                </td>
                <td>
                    <strong><span><?php echo $dateErr;?></span></strong>
                </td>
            </tr>
        </table>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <fieldset style="width: 200px; display: inline-block;">
            <legend>Degree</legend>
            <input type="checkbox" name="degree[]" value="SSC" <?php if (isset($degree) && in_array('SSC', $degree)) echo "checked"; ?>><label>SSC</label>
            <input type="checkbox" name="degree[]" value="HSC" <?php if (isset($degree) && in_array('HSC', $degree)) echo "checked"; ?>><label>HSC</label>
            <input type="checkbox" name="degree[]" value="BSc" <?php if (isset($degree) && in_array('BS', $degree)) echo "checked"; ?>><label>BSc</label>
        </fieldset>
        <strong><span><?php echo $degreeErr;?></span></strong><br>
        <input name="degreeSubmit" type="submit" value="Submit"><br><br>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div style="border-bottom: 1px solid black; padding-bottom: 10px; margin-bottom: 10px; display: inline-block;">
            <label>Blood Group</label>
            <select name="blood">
                <option value="0">Select</option>
                <option value="A+" <?php if (isset($blood) && $blood == "A+") echo "selected"; ?>>A+</option>
                <option value="A-" <?php if (isset($blood) && $blood == "A-") echo "selected"; ?>>A-</option>
                <option value="B+" <?php if (isset($blood) && $blood == "B+") echo "selected"; ?>>B+</option>
                <option value="B-" <?php if (isset($blood) && $blood == "B-") echo "selected"; ?>>B-</option>
                <option value="AB+" <?php if (isset($blood) && $blood == "AB+") echo "selected"; ?>>AB+</option>
                <option value="AB-" <?php if (isset($blood) && $blood == "AB-") echo "selected"; ?>>AB-</option>
                <option value="O+" <?php if (isset($blood) && $blood == "O+") echo "selected"; ?>>O+</option>
                <option value="O-" <?php if (isset($blood) && $blood == "O-") echo "selected"; ?>>O-</option>
            </select>
        </div>
        <strong><span><?php echo $bloodErr;?></span></strong><br>
        <input name="bloodSubmit" type="submit" value="Submit"><br><br>
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <table>
        <tr>
            <td>
                <fieldset style="width: 200px; display: inline-block;">
                    <legend>Profile Picture</legend>
                    <label>User ID</label>
                    <input type="number" name="uid" value="<?php echo $uid;?>" min="0"><br>
                    <label>Picture</label>
                    <input type="file" name="pic"><br>
                    <input name="profileSubmit" type="submit" value="Submit">
                </fieldset>
            </td>
            <td>
                <strong><span><?php echo $picErr;?></span></strong><br>
            </td>
        </tr>
    </table>
    </form>
</body>
</html>