<?php
	require_once('../php/session_header.php');
	if (isset($_GET['error'])) {
		
		if($_GET['error'] == 'db_error'){
			echo "Something went wrong...please try again";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add user</title>
</head>
<body>

	<form>
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" id="Uname" name="username" oninput="f1()" onblur="usernameCheck()">
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
					<td>Name</td>
					<td>
						<input type="text" id="Name" name="name" oninput="f3()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td>Contuct Number</td>
					<td>
						<input type="number" id="Number" name="number" oninput="f4()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="load()">
						<p href="login.php" id="login" style="display: none;">Added</p>
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">

		function f1(){
			var name = document.getElementById('Uname').value;
			if(name == ""){
				document.getElementsByClassName('err')[0].innerHTML = 'username cant empty';
				document.getElementsByClassName('err')[0].style.color = "red";
			} else {
				document.getElementsByClassName('err')[0].innerHTML = '';
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
			var name = document.getElementById('Name').value;
			if(name == ""){
				document.getElementsByClassName('err')[2].innerHTML = 'Name cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
			} else {
				document.getElementsByClassName('err')[2].innerHTML = '';
			}
				
		}

		function f4(){
			var Number = document.getElementById('Number').value;
			if(Number == ""){
				document.getElementsByClassName('err')[3].innerHTML = 'Contact Number cant empty';
				document.getElementsByClassName('err')[3].style.color = "red";
			} else {
				document.getElementsByClassName('err')[3].innerHTML = '';
			}
				
		}

		function usernameCheck(){
			var name = document.getElementById('Name').value.trim();
			var xhttp = new XMLHttpRequest();
			xhttp.open('POST', '../service/reg.php', true);
			xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xhttp.send('name='+name);

			xhttp.onreadystatechange = function (){
				if(this.readyState == 4 && this.status == 200){

					if(this.responseText == "ok"){
						document.getElementsByClassName('err')[2].innerHTML = 'Username is ok';
						document.getElementsByClassName('err')[2].style.color = "green";
					} else if(this.responseText == "not"){
						document.getElementsByClassName('err')[2].innerHTML = 'Username is taken';
						document.getElementsByClassName('err')[2].style.color = "#9c27b0";
					} else if(this.responseText == "empty"){
						document.getElementsByClassName('err')[2].innerHTML = 'Username is empty';
						document.getElementsByClassName('err')[2].style.color = "red";
					}
				}	
			}
		}


		function load(){
			var uname = document.getElementById('Uname').value;
			var pass = document.getElementById('pass').value;
			var name = document.getElementById('Name').value;
			var number = document.getElementById('Number').value;
			console.log(uname);
			console.log(pass);
			console.log(name);
			console.log(number);
			if((uname != '') && (pass != '') && (name != '') && (number != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/insert.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('uname='+uname+'&name='+name+'&pass='+pass+'&number='+number);

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
				document.getElementsByClassName('err')[0].innerHTML = 'Username cant empty';
				document.getElementsByClassName('err')[0].style.color = "red";
				document.getElementsByClassName('err')[1].innerHTML = 'password cant empty';
				document.getElementsByClassName('err')[1].style.color = "red";
				document.getElementsByClassName('err')[2].innerHTML = 'Name cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
				document.getElementsByClassName('err')[3].innerHTML = 'Contuct Number cant empty';
				document.getElementsByClassName('err')[3].style.color = "red";
			}
		}
	</script>
</body>
</html>