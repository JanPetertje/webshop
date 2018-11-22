<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Successful</title>
    <link rel="stylesheet" href="inc/css/fonts.css">
    <link rel="stylesheet" href="inc/css/main.css">
    <link rel="stylesheet" href="inc/css/loginsuccessful.css">

</head>

<body>
<?php

include "inc/parts/menu.php";
include "inc/parts/db.php";
if(isset($_SESSION["loggedUser"])) {
$user_id = $_SESSION["loggedUser"];
$usernumber = $user_id[0];}

$stmt = $conn->prepare("SELECT first_name FROM accounts WHERE account_id =:id");
$stmt->bindParam(":id", $usernumber);
$stmt -> execute();
$arrayfetch_name = $stmt->fetch();
$fetch_name = $arrayfetch_name[0];
?>

<h1 align="center">Login successful!</h1>

<div class="successful">

    <?php
  echo "<div>
  
  <h1 align='center'> Welcome $fetch_name. Thank you for logging in!</h1>
  </div>"
  ?>

</div>
</body>

</html>