
<?php

include "inc/parts/db.php";
include "views/login.php";
include "inc/parts/footer.php";

//-----Checks if the the login button has been pressed----
if(isset($_POST["login"])) {
    $email = trim($_POST["Email"]);
    $password = hash("sha256", trim($_POST["password"]));
//-----Query that looks for the email and the password
    $stmt = $conn->prepare("SELECT account_id FROM accounts WHERE email = :email AND password = :psw");
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":psw", $password);


    $exec = $stmt->execute();
    $result = $stmt->rowCount();
//----If the email and the password are in one row it logs in
    if ($result == 1) {
        $usernumber = $stmt->fetch();
        $_SESSION["loggedUser"] = $usernumber["account_id"];

        header("Location: inlogsuccessful.php");

//----If they are not in one row incorrect pops up----
    } else {
        if ($result != 1) {
            echo "<script>alert('Username and/or password incorrect.')</script>";
        }
    }
}



