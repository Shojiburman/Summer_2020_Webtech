<!DOCTYPE html>
<html>

<head>
    <title>lab_Task_03</title>
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
        $name = $email = $gender = $date = $blood = $pic = "";
        $degree = [];

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

            if (empty($_POST["degree"])) {
               $degreeErr = "Degree is required";
            } else {
                $degree = $_POST['degree'];
            }

            if (empty($_POST["blood"]) || $_POST["blood"] == '0') {
                $bloodErr = "Blood group is required";
            } else {
                $blood = $_POST['blood'];
            }

            if(empty($_POST["pic"])) {
                $picErr = "Picture is required";
            } else {
                $pic = $_POST["pic"];
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
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <table border="1" cellspacing="0" cellpadding="5" align="Center" width="450px" height="auto">
            <th rowspan="2" colspan="3" align="Center">
                <H1>PERSON PROFILE</H1>
            </th>
            <tr></tr>
            <tr height="45px">
                <td>Name</td>
                <td>
                    <input type="text" name="name" value="<?php echo $name;?>"  size="25px">
                </td>
                <td width="20px"></td>
            </tr>
            <tr height="45px">
                <td>Email</td>
                <td>
                    <input type="text" name="email" value="<?php echo $email;?>" size="25px">
                </td>
                <td></td>
            </tr>
            <tr height="45px">
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="Male" <?php if (isset($gender) && $gender == "Male") echo "checked"; ?>><label>Male</label>
                    <input type="radio" name="gender" value="Female" <?php if (isset($gender) && $gender == "Female") echo "checked"; ?>><label>Female</label>
                    <input type="radio" name="gender" value="Other" <?php if (isset($gender) && $gender == "Other") echo "checked"; ?>><label>Other</label>
                </td>
                <td></td>
            </tr>
            <tr height="45px">
                <td width="100px">Date Of Birth</td>
                <td>
                    <input type="number" name="date" value="<?php echo $date;?>" size="1px"><strong style="color: black">/ </strong>
                    <input type="number" name="month" value="<?php echo $month;?>" size="1px"><strong style="color: black">/ </strong>
                    <input type="number" name="year" value="<?php echo $year;?>" size="2px"><i> (dd/mm/yyyy)</i>
                </td>
                <td></td>
            </tr>
            <tr height="45px">
                <td>Blood Group</td>
                <td>
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
                </td>
                <td></td>
            </tr>
            <tr height="45px">
                <td>Degree</td>
                <td>
                    <input type="checkbox" name="degree[]" value="SSC" <?php if (isset($degree) && in_array('SSC', $degree)) echo "checked"; ?>><label>SSC</label>
                    <input type="checkbox" name="degree[]" value="HSC" <?php if (isset($degree) && in_array('HSC', $degree)) echo "checked"; ?>><label>HSC</label>
                    <input type="checkbox" name="degree[]" value="BSc" <?php if (isset($degree) && in_array('BSc', $degree)) echo "checked"; ?>><label>BSc.</label>
                    <input type="checkbox" name="degree[]" value="MSc" <?php if (isset($degree) && in_array('MSc', $degree)) echo "checked"; ?>><label>MSc.</label>
                </td>
                <td></td>
            </tr>
            <tr height="45px">
                <td>Photo</td>
                <td colspan="2"><input type="file" name="pic"></td>
            </tr>
            <tr height="45px">
                <td colspan="3">
            <?php 
                // if(isset($nameErr) || isset($emailErr) || isset($genderErr) || isset($dateErr) || isset($degreeErr) || isset($bloodErr) || isset($picErr)) {
                //     echo '<tr height="45px"><td colspan="3">';
                    if (isset($nameErr)) {
                        echo "<strong><span>" . $nameErr . "</span></strong><br/>";
                    }
                    if (isset($emailErr)) {
                        echo "<strong><span>" . $emailErr . "</span></strong><br/>";
                    }
                    if (isset($genderErr)) {
                        echo "<strong><span>" . $genderErr . "</span></strong><br/>";
                    }
                    if (isset($dateErr)) {
                        echo "<strong><span>" . $dateErr . "</span></strong><br/>";
                    }
                    if (isset($degreeErr)) {
                        echo "<strong><span>" . $degreeErr . "</span></strong><br/>";
                    }
                    if (isset($bloodErr)) {
                        echo "<strong><span>" . $bloodErr . "</span></strong><br/>";
                    }
                    if (isset($picErr)) {
                        echo "<strong><span>" . $picErr . "</span></strong><br/>";
                    }
                //     echo '</td></tr>';
                // }    
            ?>
                </td>
            </tr>
            <tr height="40px">
                <td colspan="3" align="right">
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>