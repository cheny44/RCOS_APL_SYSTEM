<?php
require_once "pdo.php";
/**
 * Created by PhpStorm.
 * User: cheny44
 * Date: 3/29/2019
 * Time: 4:38 PM
 */
$csv = array_map("str_getcsv", file("complete list_updated.csv"));
print_r($csv[1]);
//foreach ($csv as $data){
//    print_r($data);
//    $sql_insert = "INSERT INTO Client(first_name, last_name, age) VALUES(".$data[0].$data[1].null.")";
//    $pdo->exec($sql_insert);

//}
//print_r($csv[1]);