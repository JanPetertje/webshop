<?php
session_start();

$total=0;
foreach($_SESSION['ShoppingCart'] as $x => $product) {
    $total += $_SESSION['ShoppingCart'][$x]['quantity'] * $_SESSION['ShoppingCart'][$x]['price'];
}
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
    $x = $_SESSION['ShoppingCart'];
    $products = trim($_POST[$x]);
}






//
//    if(isset($_SESSION["loggedUser"]) && !empty($_SESSION["loggedUser"])) {
//
//    } else {
//       // Iemand is niet ingelogd.
//        echo '<script>alert("Niet ingelogd");</script>' ;
//    }
//}
