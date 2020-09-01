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
						<input type="text" id="email" name="email" onblur="f1()" onkeyup="f2()">
						<p id="emailinfo" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="load()">
						<a href="login.php" id="login" style="display: none;">Login.php</a>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">
		function f1(){
				var email = document.getElementById('email').value;
				if(email == ""){
					document.getElementById('emailinfo').innerHTML = 'Email cant empty';
				}
		}
		function f2(){
			document.getElementById('emailinfo').innerHTML = '';
		}

		function load(){
			var email = document.getElementById('email').value;
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', 'register.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('email='+email);

			xhttp.onreadystatechange = function (){
				if(this.readyState == 4 && this.status == 200){

					if(this.responseText != ""){
						document.getElementById('login').style.display = 'inline';
					}
				}	
			}
		}
	</script>
</body>
</html>