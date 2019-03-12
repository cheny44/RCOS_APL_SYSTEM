<?php
	include_once 'apl_dbh.inc.php';

	$client = $_POST['client'];
	$branch = $_POST['branch'];
	$keyword = $_POST['keyword'];

	if (!empty($client)) {
		if (empty($branch) && empty($keyword)) {
			$sql = "SELECT * FROM clients;";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo $row['client_id'];
				}
			}
		}
	}
	if (!empty($branch)) {
		echo "empty branch <br>";
	}
	if (!empty($keyword)) {
		echo "empty keyword <br>";
	}