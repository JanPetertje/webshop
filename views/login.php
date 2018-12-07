<?php
session_start();
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Login</title>
<!--        Style sheets-->
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/login.css">
    </head>
    <body>
    <?php
    include "inc/parts/menu.php";
    ?>

<!--    Login register-->
    <div class="container">
        <form method="post" action="login.php">
            <h1>Login</h1>
            <input type="text" name="Email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
            <a href="register.php">Register now!</a>
        </form>
    </div>
    <?php include 'inc/parts/footer.php';?>
    </body>
</html>