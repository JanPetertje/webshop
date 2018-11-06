<?php

include "inc/parts/db.php";
include "views/login.php";

if(isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = hash("sha256", trim($_POST["password"]));

    $stmt = $conn->prepare("SELECT COUNT(account_id) FROM accounts WHERE username = :user AND password = :psw");

    $stmt->bindParam(":user", $username);
    $stmt->bindParam(":psw", $password);

    if($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r($result);


    }
}