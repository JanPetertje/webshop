<?php
session_start();
if(!isset($_SESSION["ShoppingCart"])) {
    $_SESSION["ShoppingCart"] = [];
}

include "views/index.php";
