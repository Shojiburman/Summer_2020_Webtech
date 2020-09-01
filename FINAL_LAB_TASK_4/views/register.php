<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
</head>
<body>

	<form action="../php/regCheck.php" method="post">
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" id="name" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" id="pass" name="password"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" id="email" name="email" onkeyup="f1()">
						<p id="emailinfo" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" >
						<a href="login.php" id="login">Login.php</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">
		function f1(){
				var email = document.getElementById('name').value;
				if(email == ""){
					document.getElementById('emailinfo').innerHTML = 'Email cant empty';
				}
			}
	</script>
</body>
</html>