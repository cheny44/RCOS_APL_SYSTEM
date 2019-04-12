<?php
    require_once "pdo.php";

    $file = $_FILES['filename'];
    $csv = array_map("str_getcsv", $file);
    foreach ($csv as $data){
        print_r($csv[1]);
        break;
//    $sql_insert = "INSERT INTO Client(first_name, last_name, age) VALUES(".$data[0].$data[1].null.")";
//    $pdo->exec($sql_insert);

}
//print_r($csv[1]);