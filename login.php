<?php

include "inc/parts/db.php";
include "views/login.php";

if(isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
}