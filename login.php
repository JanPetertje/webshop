
<?php

include "inc/parts/db.php";
include "views/login.php";
include "inc/parts/footer.php";


if(isset($_POST["login"])) {
    $email = trim($_POST["Email"]);
    $password = hash("sha256", trim($_POST["password"]));

    $stmt = $conn->prepare("SELECT account_id FROM accounts WHERE email = :email AND password = :psw");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":psw", $password);


    $exec = $stmt->execute();
    $result = $stmt->rowCount();

    if ($result == 1) {
        $usernumber = $stmt->fetch();
        $_SESSION["loggedUser"] = $usernumber;

        header("Location: inlogsuccessful.php");


    } else {
        if ($result != 1) {
            echo "<script>alert('Username and/or password incorrect.')</script>";
        }
    }
}



