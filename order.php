<?php
session_start();

include "inc/parts/db.php";
include "views/order.php";

if(isset($_POST["checkout"])) {
    $first_name = trim($_POST["firstName"]);
    $initials = trim($_POST["initials"]);
    $last_name = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $zip = trim($_POST["postal"]);
    $address = trim($_POST["address"]);
    $city = trim($_POST["city"]);
    $country = trim($_POST["country"]);
    $phone = trim($_POST["phone"]); 


    if(isset($_SESSION["loggedUser"]) && !empty($_SESSION["loggedUser"])) {

    } else {
        $stmt = $conn->prepare("SELECT ");

        $stmt = $conn->prepare("SELECT ");

    }
}

