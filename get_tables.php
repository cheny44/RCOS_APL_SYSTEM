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


if (isset($_POST['Perma']) && $_POST['Perma'] == 'Yes'){
    echo "Outputting all Permanent Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT *
                                   FROM   APL.Client c, APL.incident i, APL.permanent_ban p
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND i.pb_id = p.pb_id);");

    echo '<table border="1">'."<br />";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>";
        echo($row['first_name']);
        echo("</td><td>");
        echo($row['last_name']);
        echo("</td><td>");
        echo($row['age']);
        echo("</td><td>");
        echo($row['incident_description']);
        echo("</td><td>");
        echo($row['pb_description']);
        echo("</td></tr><br/>");
    }
    echo "</table><br/>";
}
else if (isset($_POST['Active']) && $_POST['Active'] == 'Yes'){
    echo "Outputting all Active Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT *
                                   FROM   APL.Client c, APL.incident i, APL.active_ban p
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND i.ab_id = p.ab_id);");

    echo '<table border="1">'."<br />";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>";
        echo($row['first_name']);
        echo("</td><td>");
        echo($row['last_name']);
        echo("</td><td>");
        echo($row['age']);
        echo("</td><td>");
        echo($row['incident_description']);
        echo("</td><td>");
        echo($row['ab_description']);
        echo("</td></tr><br/>");
    }
    echo "</table><br/>";
}
else{
    echo "Outputting all Incidents involving Client ID: " . $client ."\r\n";
    $stmt = $pdo->query("SELECT *
                                   FROM  APL.Client c, APL.incident i, APL.permanent_ban p, APL.active_ban a
                                   WHERE (c.client_id = ". $client .") AND
                                         (i.client_id = c.client_id) AND 
                                         (i.ab_id = p.pb_id AND i.pb_id = a.ab_id);");

    echo '<table border="1">'."<br />";
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>";
        echo($row['first_name']);
        echo("</td><td>");
        echo($row['last_name']);
        echo("</td><td>");
        echo($row['age']);
        echo("</td><td>");
        echo($row['incident_description']);
        echo("</td><td>");
        echo($row['ab_description']);
        echo("</td><td>");
        echo($row['pb_description']);
        echo("</td></tr><br/>");
    }
    echo "</table><br/>";
}
