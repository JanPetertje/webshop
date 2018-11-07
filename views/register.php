<!doctype html>
<html lang="en">
    <head>
        <?php

        include "inc/parts/head.php";

        ?>
        <link rel="stylesheet" href="inc/css/register.css">
    </head>
    <body>
    <?php

    include "inc/parts/menu.php";

    ?>
    <div class="container">
        <form method="post" action="register.php">
            <h1>Register</h1>
            <input type="text" name="first_name" placeholder="First name">
            <input type="text" name="last_name" placeholder="Last name">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="address" placeholder="Address">
            <input type="text" name="city" placeholder="City">
            <input type="text" name="phone" placeholder="Phone number">
            <select name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="submit" name="register" value="Register">
            <a href="login.php">Terug</a>
        </form>
    </div>
    </body>
</html>