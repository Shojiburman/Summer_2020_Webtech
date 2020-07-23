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
        }
	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label>Name</label><br>
		<input type="text" name="name" size="20px" style="margin: 5px 0px 5px 0px">
		<strong><span> <?php echo $nameErr;?></span></strong><br>
		<input type="submit" value="submit">
	</form>

</body>
</html>