<?php
	require_once('../php/session_header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Share your BLOG</title>
</head>
<body>

	<form>
		<fieldset>
			<legend>SignUp</legend>
			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" id="title" name="username" oninput="f1()" onblur="usernameCheck()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="text" id="blog" name="password" oninput="f2()">
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
			var name = document.getElementById('Name').value;
			if(name == ""){
				document.getElementsByClassName('err')[2].innerHTML = 'Name cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
			} else {
				document.getElementsByClassName('err')[2].innerHTML = '';
			}
				
		}


		function load(){
			var title = document.getElementById('title').value;
			var blog = document.getElementById('blog').value;
			console.log(title);
			console.log(blog);
			if((title != '') && (blog != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/insertBlog.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('title='+title+'&blog='+blog+'&a_id='+$_SESSION['username']);

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
			}
		}
	</script>
</body>
</html>