<?php
print "LOADING...<br>";
include "inc/parts/db.php";

session_start();
$items = ($_SESSION['ShoppingCart']);

$y = 0;
$CurrentID = array();
$IDQuantity = array();
while ($y < count($_SESSION['ShoppingCart'])) {
    foreach ($items[$y] AS $key => $value) {
        if ($key == 'id') {
            $CurrentID[$y] = $value;
        }
        if ($key == 'quantity') {
            $IDQuantity[$y] = $value;
        }
    }
    $y++;
}

/* TESTMATERIAAL OM TE ZIEN OF DE UPDATE WERKT*/

//echo ("<br>Dit is de lijst van id's:");
//print_r($CurrentID);
//echo ("<br>Dit is de lijst van aantallen:");
//print_r($IDQuantity);
//
//$y = 0;
//while ($y < count($_SESSION['ShoppingCart'])) {
//    foreach ($items[$y] AS $key => $value) {
//        if ($key == 'id') {
//            print 'Product ' . $value . ': aantal';
//        }
//        if ($key == 'quantity') {
//            print ($value . '<br>');
//            $y++;
//        }
//    }
//}
//
//$productgroups = $conn->prepare("SELECT StockItemID, QuantityOnHand q FROM stockitemholdings LIMIT 2");
//$productgroups->execute();
//while ($row = $productgroups->fetch()) {
//    $id = $row["StockItemID"];
//    $stock = $row["q"];
//    print $id. " - " .$stock . '<br>';
//}
//$pdo = NULL;

$ordersUpdated = 0;
while ($ordersUpdated < count($IDQuantity)) {
    $updateQuantityOnHand = $conn->prepare("UPDATE stockitemholdings SET QuantityOnHand = QuantityOnHand - ($IDQuantity[$ordersUpdated]) WHERE StockItemID = ($CurrentID[$ordersUpdated])");
    $updateQuantityOnHand->execute();
    $pdo = NULL;
    $ordersUpdated++;
}

//session_destroy();

unset($_SESSION['ShoppingCart']);

header("Location: https://www.ideal.nl/demo/");

// MEER TEST
//$productgroups = $conn->prepare("SELECT StockItemID, QuantityOnHand q FROM stockitemholdings LIMIT 2");
//$productgroups->execute();
//while ($row = $productgroups->fetch()) {
//    $id = $row["StockItemID"];
//    $stock = $row["q"];
//    print "<br>".$id. " - " .$stock . '<br>';
//}
//$pdo = NULL;
?>