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
    echo "Outputing all Permenant Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT * 
                                   FROM RCOS_APL.Client c, rcos_apl.incident i, rcos_apl.premanent_ban p 
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND c.pb_id = p.pb_id AND i.pb_id = i.pb_id);");
}
else if (isset($_POST['Active']) && $_POST['Active'] == 'Yes'){
    echo "Outputing all Active Incidents involving client ". $client;
    $stmt = $pdo->query("SELECT * 
                                   FROM RCOS_APL.Client c, rcos_apl.incident i, rcos_apl.active_ban p 
                                   WHERE (c.client_id = ". $client .") AND
                                         (c.client_id = i.client_id AND c.ab_id = p.ab_id AND i.ab_id = i.ab_id);");
}
else{
    $stmt = $pdo->query("SELECT * 
                                   FROM RCOS_APL.Client 
                                   WHERE client_id = ". $client .";");
    echo "Outputting all Incidents involving client ". $stmt->fetch(PDO::FETCH_ASSOC)['first_name'];
}

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
