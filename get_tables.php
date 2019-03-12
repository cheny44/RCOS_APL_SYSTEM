<?php
/**
 * Created by PhpStorm.
 * User: Yitong Chen
 * Date: 3/12/2019
 * Time: 1:42 AM
 */
require_once "pdo.php";

$stmt = $pdo->query("SELECT * FROM RCOS_APL.Client");
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
