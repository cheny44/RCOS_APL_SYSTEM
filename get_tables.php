<?php
/**
 * Created by PhpStorm.
 * User: Yitong Chen
 * Date: 3/12/2019
 * Time: 1:42 AM
 */
require_once "pdo.php";

$client = $_POST['client'];
$branch = $_POST['branch'];
$keyword = $_POST['keyword'];

$stmt = $pdo->query("SELECT * FROM APL.Client where client_id = ". $client .";");
echo '<table border="1">'."<br />";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr><td>";
    echo($row['first_name']);
    echo("</td><td>");
    echo($row['last_name']);
    echo("</td><td>");
    echo($row['age']);
    echo("</td></tr><br/>");
}
echo "</table><br/>";
