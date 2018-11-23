<?php

include "inc/parts/db.php";
include "views/register.php";

if(isset($_POST["register"])) {
    $firstName          = trim($_POST["first_name"]);
    $initials           = trim($_POST["initials"]);
    $lastName           = trim($_POST["last_name"]);
    $email              = trim($_POST["email"]);
    $password           = trim($_POST["password"]);
    $confirmPassword    = trim($_POST["confirmPassword"]);
    $zip                = trim($_POST["zip"]);
    $address            = trim($_POST["address"]);
    $city               = trim($_POST["city"]);
    $country            = trim($_POST["country"]);
    $hash               = hash("sha256", trim($_POST["password"]));
    $phone              = trim($_POST["phone"]);


    if(!empty($firstName) && !empty($initials) && !empty($lastName) && !empty($email) && !empty($password) && !empty($zip) && !empty($address) && !empty($city) && !empty($country) && !empty($phone)) {
        if(strlen($password) >= 8) {
            if($password == $confirmPassword) {
                $stmt = $conn->prepare("INSERT INTO accounts (first_name, initials, last_name, email, password, zip, address, city, country, phone)
                  VALUES (:fName, :init, :lName, :email, :pWord, :zip, :address, :city, :country, :phone)");

                $stmt->bindParam(':fName', $firstName);
                $stmt->bindParam(':init', $initials);
                $stmt->bindParam(':lName', $lastName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':pWord', $hash);
                $stmt->bindParam(':zip', $zip);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':city', $city);
                $stmt->bindParam(':country', $country);
                $stmt->bindParam(':phone', $phone);

                if ($stmt->execute()) {
                    echo "<script>alert('Your account has successfully been made!');</script>";
                }
            } else {
                echo "<script>alert('Passwords must match!');</script>";
            }
        } else {
            echo "<script>alert('Password must be at least 8 characters long!');</script>";
        }
    } else {
        echo "<script>alert('Not all fields are filled!');</script>";
    }
}