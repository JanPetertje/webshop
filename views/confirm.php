<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WWI</title>
    <link rel="stylesheet" href="inc/css/fonts.css">
    <link rel="stylesheet" href="inc/css/main.css">
    <link rel="stylesheet" href="inc/css/confirm.css">

</head>
<body>
    <?php
    include "inc/parts/db.php";
    include "inc/parts/head.php";

    session_start();
    $data = $_POST;
    $UserID = $_SESSION["loggedUser"];
    print($UserID);
    ?>


    <div class="top-screen">
        Confirm your order:
    </div>

    <div class="account">
        <br>
        <h1>Your personal data:</h1>
        <br>
        <table>
            <tr>
                <th>Category</th>
                <th>Your account</th>
            </tr>
        <?php
        foreach ($data AS $x => $value) {
            if ($x != 'checkout') {
                print ('<tr> <td>'. $x . ' </td>');
                print ('<td>' . $value . '</td> </tr>');
            }
        }
        ?>
        </table>
        <div class="check">
            <br>! Please check if all data is correct, so we can make sure to prevent any inconvenience !
        </div>
    </div>

    <div class="shopitems">
        <h1 class="check">Selected item(s):</h1><br>
        <div class="itemtable">
            <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price (€) </th>
                <th style="width: 10%">Quantity</th>
            </tr>

        <?php
        $items = ($_SESSION['ShoppingCart']);
        $x = 0;
        $y = 0;
        while ($y < count($_SESSION['ShoppingCart'])) {
            print "<tr>";
            foreach ($items[$y] AS $key => $value) {
                if ($key == 'id' && $x == 0) {
                    print ('<td> #' . $value . '</td>');
                    $x++;
                }
                if ($key == 'name' && $x == 1) {
                    print ('<td>' . $value . '</td>');
                    $x++;
                }
                if ($key == 'price' && $x == 2) {
                    print ('<td>' . $value . '</td>');
                    $x++;
                }
                if ($key == 'quantity' && $x == 3) {
                    print ('<td>' . $value . '</td>');
                    $x++;
                }
            }
            print "<tr>";
            $y++;
            $x = 0;
            }
        ?>

            <div class="totaal">
            <?php

            $total=0;
            foreach($_SESSION['ShoppingCart'] as $x => $product) {
                $total += $_SESSION['ShoppingCart'][$x]['quantity'] * $_SESSION['ShoppingCart'][$x]['price'];
            }
            print "<tr><td></td><td></td><td><b>Total: €" . round($total * 1.21, 2  ) . "</b></td><td></td></tr>";
            ?>
            </table>
            </div>
        </div>

    <div class="check">
        <form action="UpdateStock.php" method="post">
        <a>
            <input type="submit" id="button" class="myButton" value="iDEAL">
        </a>
        </form>
    </div>


</body>
</html>