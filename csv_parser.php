<?php
    require_once "pdo.php";

    if (isset($_POST['submit']))
    {
        //Import uploaded file to Database
        $file = fopen($_FILES['filename']['tmp_name'], "r");
        if ($data = fgetcsv($file) != FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                // Add client
                $sql = "INSERT into RCOS_APL.client (last_name, first_name) values('" . $data[0] . "', '" . $data[1] . "')";
                $pdo->query($sql);
                $client_id = $pdo->lastInsertId();

                // Add new branch
                $sql = "SELECT * FROM RCOS_APL.branch where branch_name = '$data[3]'";
                $stmt = $pdo ->query($sql);
                if ($stmt->rowCount() == 0){
                    $sql = "INSERT into RCOS_APL.branch (branch_name) values('" . $data[3] . "')";
                    $pdo->query($sql);
                    $branch_id = $pdo->lastInsertId();
                }
                else{
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $branch_id = $row['branch_id'];
                }

                // Add ban information
                $ban = -1;
                $start_date = date("Y-m-d", strtotime($data[6]));
                if ($data[7] == "Permanent" || $data[7] == "INDEFINITE"){
                    $ban = 0;
                    $sql = "INSERT into RCOS_APL.Permanent_Ban (pb_start_date, pb_description, client_id) 
                            values ('" . $start_date . "', '" . $data[8] . "', '" . $client_id . "')";
                    $pdo->query($sql);
                }
                elseif ($data[7] != ""){
                    $ban = 1;
                    $end_date = date("Y-m-d", strtotime($data[7]));
                    $sql = "INSERT into RCOS_APL.Active_Ban (ab_start_date, ab_end_date, ab_description, client_id) 
                            values ('" . $start_date . "', '" . $end_date . "', '" . $data[8] . "', '" . $client_id . "')";
                    $pdo->query($sql);
                }

                // Add incident information
                $date = date("Y-m-d H:i:s", strtotime($data[2].$data[4]));
                $description = str_replace('\'', '\\\'', $data[5]);
                if ($ban == 0 ){
                    $pb_id = $pdo->lastInsertId();
                    $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id, pb_id) 
                            values ('" . $date . "', '" . $description . "', '" . $client_id . "', '" . $branch_id . "', '" . $pb_id. "')";
                }
                elseif ($ban == 1){
                    $ab_id = $pdo->lastInsertId();
                    $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id, ab_id) 
                            values ('" . $date . "', '" . $description . "', '" . $client_id . "', '" . $branch_id . "', '" . $ab_id. "')";
                }
                else{
                    $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id) 
                            values ('" . $date . "', '" . $description . "', '" . $client_id . "', '" . $branch_id . "')";
                }
                $pdo->query($sql);
            }
        }
        header("Location: success_page.php?insert=success");


    }
