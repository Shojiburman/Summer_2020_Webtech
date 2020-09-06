<?php
	require_once('../db/db.php');
	$conn = dbConnection();

	$name = $_POST['name'];

	$sql= "SELECT * from users where username like '%{$name}%'";

	$result = mysqli_query($conn, $sql);

	$data = "<table border=1> 
				<tr>
					<td>ID</td>
					<td>Username</td>
					<td>Name</td>
					<td>Contuct Number</td>
					
				</tr>";

	while ($row = mysqli_fetch_assoc($result)) {
			$data .= "<tr>
							<td>{$row['id']}</td>
							<td>{$row['username']}</td>
							<td>{$row['name']}</td>
							<td>{$row['number']}</td>
					</tr>";
	}

	$data .= "</table>";

	echo $data;

?>