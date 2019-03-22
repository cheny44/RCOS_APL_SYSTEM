<?php
    require_once "pdo.php";

    $first = $_POST['first_name'];
    $last = $_POST['last_name'];
    $age = $_POST['age'];
    $date = $_POST['date'];
    $branch = $_POST['branch'];
    $comment = $_POST['comment'];





    $sql_client = "INSERT INTO Client(first_name, last_name, age) VALUES ('$first', '$last', '$age')";
    $sql_branch = "INSERT INTO Branch(branch_name, branch_description) VALUES ('$branch', '$comment')";
    $pdo->query($sql_client);
    $pdo->query($sql_branch);

    header("Location: Success_page.php?insert=success");

