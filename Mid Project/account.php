<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table align="center" style="margin-bottom: 30px;">
		<tr height="50px">
	        <td colspan="2" align="right">
	            <a href="publicHome.php" style="border: 2px solid black; border-radius: 7%; padding: 10px 15px; margin-right: 20px; text-decoration: none; color: black">Home</a>
	            <a href="about.php" style="border: 2px solid black; border-radius: 7%; padding: 10px 15px; margin-right: 20px; text-decoration: none; color: black">About</a>
	            <a href="registration.php" style="border: 2px solid black; border-radius: 7%; padding: 10px 15px; margin-right: 20px; text-decoration: none; color: black">Registration</a>
	            <a href="login.php" style="border: 2px solid black; border-radius: 7%; padding: 10px 15px; text-decoration: none; color: black">Login</a>
	        </td>
    	</tr>
	</table>
	<table align="center" border="1" cellspacing="0" cellpadding="0">
		<tr>
			<?php 
				if (isset($_POST['sign'])){
			?>
			<td>
				<div>
				    <table width="auto" border="0" cellpadding="0" cellspacing="0">
				        <tr height="120px">
				            <td colspan="2" align="center" style="padding: 40px 100px 40px 100px;">
				            	<h1>Sign in to Protibeshi</h1><br>
				                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
			                        <table>
			                            <tr>
			                                <td>Email</td>
			                                <td><input type="text" name="email" value=""></td>
			                            </tr>
			                            <tr>
			                                <td>Password</td>
			                                <td><input type="password" name="pass" value=""></td>
			                            </tr>
			                            <tr>
			                                <td colspan="3" style = "padding-top: 10px;">
			                                    <input id="remember" type="checkbox" name="remember[]" value="yes" <?php if (isset($remember) && in_array("yes", $remember)) echo "checked"; ?>><label for="remember">Remember me</label>
			                                    <input type="submit" name="logsub" value="Submit" style="float: right;">
			                                </td>
			                            </tr>
			                        </table>
				                </form>
				            </td>
				        </tr>
				    </table>
				</div>
			</td>
			<?php } ?>
			<?php 
				if (isset($_POST['reg'])){
			?>
			<td>
				<div>    
				    <table width="auto" border="0" cellpadding="0" cellspacing="0">
				        <tr height="auto">
				            <td colspan="2" style="padding: 40px 100px 40px 100px;">
				                <h1 align="center">Create Account</h1>
				                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				                    <table width="100%" cellpadding="2" cellspacing="0">
				                    	<tr>
				                            <td>Name</td>
				                            <td><input type="text" name="name" value=""></td>
				                        </tr>
				                        <tr>
				                            <td>Email</td>
				                            <td>
				                                <input type="text" name="email" value="">
				                            </td>
				                        </tr>
				                        <tr>
				                            <td>Password</td>
				                            <td><input name="pass" type="password"></td>
				                        </tr>
				                    </table>
				                    <input name="regsub" type="submit" value="Submit" style="float: right;">
				                </form>
				            </td>
				        </tr>
				    </table>
				</div>
			</td>
			<?php } ?>
		</tr>
	</table>
	</table>
</body>

</html>