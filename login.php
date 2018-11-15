<?php

include "inc/parts/db.php";
include "views/login.php";

if(isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = hash("sha256", trim($_POST["password"]));

    $stmt = $conn->prepare("SELECT account_id FROM accounts WHERE username = :user AND password = :psw");

    $stmt->bindParam(":user", $username);
    $stmt->bindParam(":psw", $password);


    $exec = $stmt->execute();
    $result = $stmt->rowCount();

    if ($result == 1) {
        echo "<script>alert('login successful')</script>";

        header("Location: inlogsuccess.php");


    } else {
        if ($result != 1) {
            echo "<script>alert('Username and/or password incorrect.')</script>";
        }
    }
}



