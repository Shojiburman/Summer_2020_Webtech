<!DOCTYPE html>
<html>
<head>
    <title>HTML-FORM Validation using PHP</title>
</head>
<body>
    <?php

        $nameErr = $emailErr = $genderErr = $websiteErr = "";
        $name = $email = $gender = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            //name field validation

            $name = $_POST['name'];
            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }
            elseif ((strstr($name,"/") != "") && (strstr($name,"*") != "") (strstr($name,"-") != "") && (strstr($name,"@") != "") && (strstr($name,"+") != "") && (strstr($name,"&") != "") && (strstr($name,"$") != "") && (strstr($name,"#") != "") && (strstr($name,"%") != "") (strstr($name,"|") != "")) { 
                $nameErr = "No special character allowed";
            }
            else if(strlen($name) < 2){
                $nameErr = "At least 2 letter is required";
            }
            else if(!ctype_upper($name[0])){
                $nameErr = "First letter must be capital";
            }
            else if(!ctype_alpha($name)){
                $nameErr = "No special character allowed";
            }
            else {
                $nameErr = "Looks good";
            }

            //email field validation

            $email = $_POST["email"];
            if(empty($_POST["email"])) {
                $emailErr = "Email is required";
            } 
            else {
               
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format"; 
               }
            }
        }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label>Name</label><br>
        <input type="text" name="name" size="20px" style="margin: 5px 0px 5px 0px">
        <strong><span> <?php echo $nameErr;?></span></strong><br>
        <input type="submit" value="submit"><br><br>



        <label>Email</label><br>
        
        <input type="text" name="email" style="margin: 5px 0px 5px 0px">
        <img src="info.png" width="17px" height="17px" alt="alternative text" title="Hint: sample@example.com">
        <strong><span> <?php echo $emailErr;?></span></strong><br>
        <input type="submit" value="submit">



    </form>

</body>
</html>