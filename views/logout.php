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
    <title>Logout Successful</title>
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
    $usernumber = $user_id[0];



    $stmt = $conn->prepare("SELECT first_name FROM accounts WHERE account_id =:id");
    $stmt->bindParam(":id", $usernumber);
    $stmt -> execute();
    $arrayfetch_name = $stmt->fetch();
    $fetch_name = $arrayfetch_name[0];}
else {
    header('location: index.php');
} ?>
<?php
echo "<div class='log'>
<h1 align='center'>You have successfully logged out!</h1>
<h1 align='center'> Goodbye $fetch_name. See you next time!</h1>
  </div>"
?>
<div class="successful">
</div>
<?php include 'inc/parts/footer.php';
if(isset($_SESSION["loggedUser"])) {
    session_destroy();
    header("refresh:3.5; url=index.php");
} else {header('location: index.php');
}
?>

</body>

</html>
