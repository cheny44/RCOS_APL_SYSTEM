<?php
	include_once 'apl_dbh.inc.php';
?>
<!doctype html>
<html>
<head>
<!-- <meta charset="UTF-8"> -->
	<title>SEARCH</title>
</head>

<body>

<form action="search_algo.inc.php" method="POST">
	Client: <input type="text" name="client" placeholder="Client ID/Name">
	<br>
	Branch: <input type="text" name="branch" placeholder="Branch ID/Name">
	<br>
	Keyword: <input type="text" name="keyword" placeholder="Keyword Search">
	<br>
	<button type="submit" name="Search" >Search</button>
</form>


</body>
</html>