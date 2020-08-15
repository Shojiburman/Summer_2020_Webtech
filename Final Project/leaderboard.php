<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include 'nav.html'
		include 'search.php'
	?>
	<div id="leftmenu">
		
	</div>
	<div id="content">
		<?php
			foreach ($var as $key) {
				echo '
					<div>
						<p></P>
						<h3></h3>
						<p></p>
					</div>
				';
			}
		?>
	</div>
	<?php 
		include 'footer.html'
	?>
</body>
</html>