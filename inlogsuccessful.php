<?php
include "views/loginsuccessful.php";
if(isset($_SESSION["loggedUser"])) {
    $user_id = $_SESSION["loggedUser"];
    }
?>