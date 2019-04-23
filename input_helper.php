<?php
    require_once "pdo.php";

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $branch = $_POST['branch'];
    $ban_type = $_POST['ban_type'];
    $start_date = $_POST['bs'];
    $end_date = $_POST['be'];
    $comment = $_POST['comment'];
    $description = $_POST['description'];

    $stmt = $pdo->query("SELECT * FROM RCOS_APL.Client where first_name = '$first' and last_name = '$last' and age = '$age'");
    $found = false;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $found = true;
        echo $row['client_id'];
        echo $row['first_name'] . " " . $row['last_name'] . " " . $row['age'];
        echo "<br>";
        $client_id = $row['client_id'];
    }

    if ($found == false)
    {
        $sql_client = "INSERT INTO Client(first_name, last_name, age) VALUES ('$first', '$last', '$age')";
        $pdo->query($sql_client);
        $client_id = $pdo->lastInsertId();
    }

    $stmt = $pdo ->query("SELECT * FROM RCOS_APL.branch where branch_name = '$branch'");
    if ($stmt->rowCount() == 0){
        $sql = "INSERT into RCOS_APL.branch (branch_name) values('" . $branch . "')";
        $pdo->query($sql);
        $branch_id = $pdo->lastInsertId();
    }
    else{
        $branch_id = $stmt->fetch(PDO::FETCH_ASSOC)['branch_id'];
    }


    // Add ban information
    $ban = -1;
    $start_date = date("Y-m-d", strtotime($start_date));
    if ($ban_type == "Permanent"){
        $ban = 0;
        $sql = "INSERT into RCOS_APL.Permanent_Ban (pb_start_date, pb_description, client_id) 
                                values ('" . $start_date . "', '" . $comment . "', '" . $client_id . "')";
        $pdo->query($sql);
    }
    elseif ($ban_type == "Active"){
        $ban = 1;
        $end_date = date("Y-m-d", strtotime($start_date));
        $sql = "INSERT into RCOS_APL.Active_Ban (ab_start_date, ab_end_date, ab_description, client_id) 
                                values ('" . $start_date . "', '" . $end_date . "', '" . $comment . "', '" . $client_id . "')";
        $pdo->query($sql);
    }

    // Add incident information
    $date = date("Y-m-d H:i:s", strtotime($date));
    $des = str_replace('\'', '\\\'', $description);
    if ($ban == 0 ){
        $pb_id = $pdo->lastInsertId();
        $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id, pb_id) 
                                values ('" . $date . "', '" . $des . "', '" . $client_id . "', '" . $branch_id . "', '" . $pb_id. "')";
    }
    elseif ($ban == 1){
        $ab_id = $pdo->lastInsertId();
        $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id, ab_id) 
                                values ('" . $date . "', '" . $des . "', '" . $client_id . "', '" . $branch_id . "', '" . $ab_id. "')";
    }
    else{
        $sql = "INSERT into RCOS_APL.incident(date_time, incident_description, client_id, branch_id) 
                                values ('" . $date . "', '" . $des . "', '" . $client_id . "', '" . $branch_id . "')";
    }
    $pdo->query($sql);





    header("Location: Success_page.php?insert=success");

