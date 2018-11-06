<?php

include "inc/parts/db.php";
include "views/register.php";

if(isset($_POST["register"])) {
    $firstName  = trim($_POST["first_name"]);
    $lastName   = trim($_POST["last_name"]);
    $username   = trim($_POST["username"]);
    $password   = trim($_POST["password"]);
    $hash       = hash("sha256", trim($_POST["password"]));
    $email      = trim($_POST["email"]);
    $address    = trim($_POST["address"]);
    $city       = trim($_POST["city"]);
    $phone      = trim($_POST["phone"]);
    $gender     = trim($_POST["gender"]);

    if(!empty($firstName) && !empty($lastName) && !empty($username) && !empty($password) && !empty($email) && !empty($address) && !empty($city) && !empty($phone) && !empty($gender)) {
        if(strlen($password) >= 8) {
            $stmt = $conn->prepare(
                "
            INSERT INTO accounts (first_name, last_name, username, password, email, address, city, phone, gender)
            VALUES (:fName, :lName, :uName, :pWord, :email, :address, :city, :phone, :gender)
            "
            );

            $stmt->bindParam(':fName', $firstName);
            $stmt->bindParam(':lName', $lastName);
            $stmt->bindParam(':uName', $username);
            $stmt->bindParam(':pWord', $hash);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':gender', $gender);

            if ($stmt->execute()) {
                echo "<script>alert('Your account has successfully been made!');</script>";
            }
        } else {
            echo "<script>alert('Password must be at least 8 characters long!');</script>";
        }
    } else {
        echo "<script>alert('Not all fields are filled!');</script>";
    }
}