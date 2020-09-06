<?php

	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'null_value'){
			echo "Username/Password field can't left empty...";
		}

		if($_GET['error'] == 'invalid_user'){
			echo "Invalid username or Password";
		}

		if($_GET['error'] == 'invalid_request'){
			echo "You have to login first...";
		}

	}else if(isset($_GET['success'])){
		
		if($_GET['success'] == 'registration_done'){
			echo "Registration Done! Now you can login...";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form action="../php/logCheck.php" method="post">
		<fieldset>
			<legend>SignIn</legend>
			<table>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" name="email" id="Email">
						<p class="err" style="display: none;"></p>
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" name="password" id="pass">
						<p class="err" style="display: none;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="load()">
						<p class="err" style="display: none;"></p>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">
		function load(){
			var pass = document.getElementById('pass').value.trim();
			var email = document.getElementById('Email').value.trim();
			console.log(email);
			console.log(pass);
			if((pass != '') && (email != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/login.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('email='+email+'&pass='+pass);

				xhttp.onreadystatechange = function (){
					if(this.readyState == 4 && this.status == 200){

						if(this.responseText == "ok"){
							location.replace("home.php")
						} else if (this.responseText == "not") {
							document.getElementById('home').style.display = 'none';
						}
					}	
				}
			} else {
				document.getElementsByClassName('err')[0].innerHTML = 'password cant empty';
				document.getElementsByClassName('err')[0].style.display = "inline";
				document.getElementsByClassName('err')[0].style.color = "red";
				document.getElementsByClassName('err')[1].innerHTML = 'Email cant empty';
				document.getElementsByClassName('err')[1].style.display = "inline";
				document.getElementsByClassName('err')[1].style.color = "red";
				document.getElementsByClassName('err')[2].innerHTML = 'invalid credintial';
				document.getElementsByClassName('err')[2].style.display = "inline";
				document.getElementsByClassName('err')[2].style.color = "red";
			}
		}
	</script>
</body>
</html>