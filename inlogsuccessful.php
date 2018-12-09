<?php

include "views/loginsuccessful.php";

//------If the login session is filled it wil bring you to the index page----
if(isset($_SESSION["loggedUser"])) {
    $user_id = $_SESSION["loggedUser"];
    header("refresh:3.25; url=index.php");
}