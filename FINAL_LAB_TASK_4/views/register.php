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
					<td>
						<input type="text" id="name" name="username" oninput="f1()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" id="pass" name="password" oninput="f2()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="text" id="Email" name="email" onblur="emailcheck()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="load()">
						<a href="login.php" id="login" style="display: none;">Login.php</a>
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">

		function f1(){
			var name = document.getElementById('name').value;
			if(name == ""){
				document.getElementsByClassName('err')[0].innerHTML = 'username cant empty';
				document.getElementsByClassName('err')[0].style.color = "red";
			}
				
		}

		function f2(){
			var pass = document.getElementById('pass').value;
			if(pass == ""){
				document.getElementsByClassName('err')[1].innerHTML = 'password cant empty';
				document.getElementsByClassName('err')[1].style.color = "red";
			}
			else if(pass.length < 6){
				document.getElementsByClassName('err')[1].innerHTML = 'password is too weak';
				document.getElementsByClassName('err')[1].style.color = "#94941f";
			}
			else if(pass.length >= 6 && pass.length < 7){
				document.getElementsByClassName('err')[1].innerHTML = 'password is weak';
				document.getElementsByClassName('err')[1].style.color = "#3d791f";
			}
			else if(pass.length >= 8 && pass.length < 9){
				document.getElementsByClassName('err')[1].innerHTML = 'password is strong';
				document.getElementsByClassName('err')[1].style.color = "#4CAF50";
			}
			else if(pass.length >= 10){
				document.getElementsByClassName('err')[1].innerHTML = 'password is too strong';
				document.getElementsByClassName('err')[1].style.color = "green";
			}
		}

		function f3(){
			var email = document.getElementById('Email').value;
			if(email == ""){
				document.getElementsByClassName('err')[2].innerHTML = 'email cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
			}
				
		}

		function emailcheck(){
			var email = document.getElementById('Email').value.trim();
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../service/reg.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('email='+email);

			xhttp.onreadystatechange = function (){
				if(this.readyState == 4 && this.status == 200){

					if(this.responseText == "ok"){
						document.getElementsByClassName('err')[2].innerHTML = 'Email is ok';
						document.getElementsByClassName('err')[2].style.color = "green";
					} else if(this.responseText == "not"){
						document.getElementsByClassName('err')[2].innerHTML = 'Email is taken';
						document.getElementsByClassName('err')[2].style.color = "#9c27b0";
					} else if(this.responseText == "empty"){
						document.getElementsByClassName('err')[2].innerHTML = 'Email is empty';
						document.getElementsByClassName('err')[2].style.color = "red";
					}
				}	
			}
		}

		function load(){
			var name = document.getElementById('name').value;
			var pass = document.getElementById('pass').value;
			var email = document.getElementById('Email').value;
			if((name != '') && (pass != '') && (email != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/insert.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('email='+email+'&name='+name+'&pass='+pass);

				xhttp.onreadystatechange = function (){
					if(this.readyState == 4 && this.status == 200){

						if(this.responseText == "insert"){
							document.getElementById('login').style.display = 'inline';
						} else if (this.responseText == "not") {
							document.getElementById('login').style.display = 'none';
						}
					}	
				}
			} else {
				document.getElementsByClassName('err')[0].innerHTML = 'username cant empty';
				document.getElementsByClassName('err')[0].style.color = "red";
				document.getElementsByClassName('err')[1].innerHTML = 'password cant empty';
				document.getElementsByClassName('err')[1].style.color = "red";
				document.getElementsByClassName('err')[2].innerHTML = 'Email cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
			}
			
		}
	</script>
</body>
</html>