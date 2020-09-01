<?php

	$email = $_POST['email'];

	$conn = mysqli_connect('localhost', 'root', '', 'webtech');
	$sql= "select * from users where email = {$email}";

	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
			$data = $row['email']
	}
	echo $data;
?>