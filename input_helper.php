<?php
    require_once "pdo.php";

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $branch = $_POST['branch'];
    $comment = $_POST['comment'];

    $stmt = $pdo->query("SELECT * FROM RCOS_APL.Client where first_name = '$first' and last_name = '$last' and age = '$age'");
    $found = false;
    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $found = true;
        echo $row['client_id'];
        echo $row['first_name'] . " " . $row['last_name'];
        echo "<br>";
    }

    if ($found == false)
    {
        $sql_client = "INSERT INTO Client(first_name, last_name, age) VALUES ('$first', '$last', '$age')";
        $pdo->query($sql_client);
        echo "Input success";
    }


//    $sql_branch = "INSERT INTO Branch(branch_name, branch_description) VALUES ('$branch', '$comment')";
//    $pdo->query($sql_branch);

//    header("Location: Success_page.php?insert=success");

