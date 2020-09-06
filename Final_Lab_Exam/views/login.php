
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form>
		<fieldset>
			<legend>SignIn</legend>
			<table>
				<tr>
					<td>User Name</td>
					<td>
						<input type="text" name="uname" id="Uname">
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
			var uname = document.getElementById('Uname').value.trim();
			console.log(uname);
			console.log(pass);
			if((pass != '') && (uname != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/login.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('uname='+uname+'&pass='+pass);

				xhttp.onreadystatechange = function (){
					if(this.readyState == 4 && this.status == 200){

						if(this.responseText == "admin"){
							location.replace("adminHome.php");
						} 
						else if(this.responseText == "author"){
							location.replace("home.php")
						}
					}	
				}
			} else {
				document.getElementsByClassName('err')[0].innerHTML = 'password cant empty';
				document.getElementsByClassName('err')[0].style.display = "inline";
				document.getElementsByClassName('err')[0].style.color = "red";
				document.getElementsByClassName('err')[1].innerHTML = 'UserName cant empty';
				document.getElementsByClassName('err')[1].style.display = "inline";
				document.getElementsByClassName('err')[1].style.color = "red";
				document.getElementsByClassName('err')[2].innerHTML = 'invalid credential';
				document.getElementsByClassName('err')[2].style.display = "inline";
				document.getElementsByClassName('err')[2].style.color = "red";
			}
		}
	</script>
</body>
</html>