<?php
	require_once('../php/session_header.php');
	require_once('../service/userService.php');

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$blog = getBlogById($id);
	}else{
		header('location: all_users.php');
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Update your BLOG</title>
</head>
<body>
	<button><a href="home.php">Back</a></button>
	<p></p>
	<p></p>

	<form>
		<fieldset>
			<legend>Update</legend>
			<table>
				<tr>
					<td>Blog Title</td>
					<td>
						<input type="text" id="title" name="username" value="<?=$blog['title']?>" oninput="f1()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td>Blog</td>
					<td>
						<input type="text" id="blog" name="password" value="<?=$blog['blog']?>" oninput="f2()">
						<p class="err" style="display: inline;"></p>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" name="submit" value="Submit" onclick="load()">
						<p class="err" style="display: inline;"></p>
						<input type="hidden" id="id" name="id" value="<?=$blog['b_id']?>">
					</td>
				</tr>
			</table>
		</fieldset>
	</form>
	<script type="text/javascript">

		function f1(){
			var name = document.getElementById('title').value;
			if(name == ""){
				document.getElementsByClassName('err')[0].innerHTML = 'Title cant empty';
				document.getElementsByClassName('err')[0].style.color = "red";
			} else {
				document.getElementsByClassName('err')[0].innerHTML = '';
			}
				
		}

		function f2(){
			var name = document.getElementById('blog').value;
			if(name == ""){
				document.getElementsByClassName('err')[2].innerHTML = 'Blog cant empty';
				document.getElementsByClassName('err')[2].style.color = "red";
			} else {
				document.getElementsByClassName('err')[2].innerHTML = '';
			}
				
		}


		function load(){
			var title = document.getElementById('title').value;
			var blog = document.getElementById('blog').value;
			var id = document.getElementById('id').value;
			console.log(title);
			console.log(blog);
			console.log(id);
			if((title != '') && (blog != '')){
				var xhttp = new XMLHttpRequest();
				xhttp.open('POST', '../service/updateBlog.php', true);
				xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xhttp.send('title='+title+'&blog='+blog+'&b_id='+id);

				xhttp.onreadystatechange = function (){
					if(this.readyState == 4 && this.status == 200){

						if(this.responseText == "insert"){
							document.getElementsByClassName('err')[2].innerHTML = 'published';
						} else if (this.responseText == "not") {
							document.getElementsByClassName('err')[2].innerHTML = 'Not published';
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