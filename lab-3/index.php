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
        $name = $email = $gender = $date = $degree = $blood = $pic = "";

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
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Name</label><br>
        <input type="text" name="name" value="<?php echo $name;?>" size="20px" style="margin: 5px 0px 5px 0px">
        <strong><span> <?php echo $nameErr;?></span></strong><br>
        <input name="nameSubmit" type="submit" value="Submit"><br><br>
    </form>
    
</body>
</html>