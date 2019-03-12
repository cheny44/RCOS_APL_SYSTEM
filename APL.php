<?php
	include_once 'includes/apl_dbh.inc.php';
?>

<!doctype html>
<html>
<head>
<!-- <meta charset="UTF-8"> -->
	<title>Searching Engine</title>
</head>

<style>
.error {color: #FF0000;}
</style>

<body>

<?php
	$choice = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["choice"])) {
			$choiceErr = "Choice is required";
		}
		else {
			$choice = check_input($_POST["choice"]);
		}
	}
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	INPUT/SEARCH CHOICE:
	<input type="radio", name="choice" <?php if (isset($choice) && $choice=="input") echo "checked";?> value="input">INPUT
	<input type="radio", name="choice" <?php if (isset($choice) && $choice=="search") echo "checked";?> value="search">SEARCH
	<br><br>
	<input type="submit" name="submit" value="Submit">
</form>

<?php 
	if ($choice == "input") {
		header('Location: http://localhost/APL/includes/input.inc.php');
	}
	elseif ($choice == "search") {
		header('Location: http://localhost/APL/includes/search.inc.php');
	}
?>

</body>
</html>