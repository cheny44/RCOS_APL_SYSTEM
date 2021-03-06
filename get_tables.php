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

function print_first_line() {
    echo '<table border="1">'."<br />";
    echo "<tr><td>";
    echo 'first_name';
    echo("</td><td>");
    echo 'last_name';
    echo("</td><td>");
    echo 'age';
    echo("</td><td>");
    echo 'incident_description';
    echo("</td><td>");
    echo 'ab_description';
    echo("</td><td>");
    echo 'pb_description';
}


if (isset($_POST['Perma']) && $_POST['Perma'] == 'Yes' && !isset($_POST['Active'])){
    echo "Outputting all Permanent Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT *
                                   FROM   APL.Client c, APL.incident i, APL.permanent_ban p
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND 
                                         (c.client_id= p.client_id));");
    print_first_line();
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
        echo("");
        echo("</td><td>");
        echo($row['pb_description']);
        echo("</td></tr><br/>");
    }
    echo "</table><br/>";
}
else if (isset($_POST['Active']) && $_POST['Active'] == 'Yes' && !isset($_POST['Perma'])){
    echo "Outputting all Active Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT *
                                   FROM   APL.Client c, APL.Incident i, APL.Active_ban a
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND 
                                         (c.client_id= a.client_id));");
    print_first_line();
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
        echo("");
        echo("</td></tr><br/>");
    }
    echo "</table><br/>";
}
else if(isset($_POST['Active']) && isset($_POST['Perma'])){
    echo "Outputting all Incidents involving Client ID: " . $client ."\r\n";
    $stmt = $pdo->query("SELECT *
                                   FROM  APL.Client c, APL.incident i, APL.permanent_ban p, APL.active_ban a
                                   WHERE (c.client_id = ". $client .") AND
                                         (i.client_id = c.client_id) AND 
                                         (p.client_id = c.client_id) AND
                                         (a.client_id = c.client_id);");

    print_first_line();
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
//    echo "</table><br/>";
} else {
    echo "PLEASE CHECK ONE OF THE BAN TYPE BOXES!!!";
    echo "<br/>";
    echo "Outputting all Incidents involving Client ID: " . $client ."\r\n";
    $stmt = $pdo->query("SELECT *
                                   FROM  APL.Client c, APL.incident i, APL.permanent_ban p, APL.active_ban a
                                   WHERE (c.client_id = ". $client .") AND
                                         (i.client_id = c.client_id);");

    print_first_line();
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

}
