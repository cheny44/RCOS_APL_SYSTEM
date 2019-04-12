<?php
    require_once "pdo.php";

    if (isset($_POST['submit']))
    {
        //Import uploaded file to Database
        $handle = fopen($_FILES['filename']['tmp_name'], "r");
        while(($data = fgetcsv($handle)) !== FALSE){
            print_r($data);
            break;
//            $sql = "INSERT into client (first_name, last_name) values('".$data[0]."', '".$data[1]."')";
//            mysqli_query($conn, $sql);
//            $sql = "INSERT into branch (branch) values('".$data[2]."')";
//            mysqli_query($conn, $sql) ;
//            $sql = "INSERT into incident(date_time, incident_description) values ('".$data[3]."', '".$data[4]."')";
//            mysqli_query($conn, $sql);

        }

    }