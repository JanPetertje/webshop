<?php
print "LOADING...<br>";
include "inc/parts/db.php";

session_start();
$items = ($_SESSION['ShoppingCart']);
//
//$y = 0;
//$CurrentID = array();
//$IDQuantity = array();
//while ($y < count($_SESSION['ShoppingCart'])) {
//    foreach ($items[$y] AS $key => $value) {
//        if ($key == 'id') {
//            $CurrentID[$y] = $value;
//        }
//        if ($key == 'quantity') {
//            $IDQuantity[$y] = $value;
//        }
//    }
//    $y++;
//}

/* TESTMATERIAAL OM TE ZIEN OF DE UPDATE WERKT*/

//echo ("<br>Dit is de lijst van id's:");
//print_r($CurrentID);
//echo ("<br>Dit is de lijst van aantallen:");
//print_r($IDQuantity);
//
$y = 0;
while ($y < count($_SESSION['ShoppingCart'])) {
    foreach ($items[$y] AS $key => $value) {
        if ($key == 'id') {
            print 'Product ' . $value . ': aantal';
        }
        if ($key == 'quantity') {
            print ($value . '<br>');
            $y++;
        }
    }
}
//
//$productgroups = $conn->prepare("SELECT StockItemID, QuantityOnHand q FROM stockitemholdings LIMIT 2");
//$productgroups->execute();
//while ($row = $productgroups->fetch()) {
//    $id = $row["StockItemID"];
//    $stock = $row["q"];
//    print $id. " - " .$stock . '<br>';
//}
//$pdo = NULL;
// MEER TEST
//$productgroups = $conn->prepare("SELECT StockItemID, QuantityOnHand q FROM stockitemholdings LIMIT 2");
//$productgroups->execute();
//while ($row = $productgroups->fetch()) {
//    $id = $row["StockItemID"];
//    $stock = $row["q"];
//    print "<br>".$id. " - " .$stock . '<br>';
//}
//$pdo = NULL;

print_r($items);
$y=0;
while ($y < count($_SESSION['ShoppingCart'])) {
    foreach ($items[$y] AS $key => $value) {
        if ($key == 'id') {
            $StockItemID = $value;
            print '<br>ID: ' . $StockItemID;
        }
        if ($key == 'description') {
            $description = $value;
            print '<br>' . $description;
        }
        if ($key == 'quantity') {
            $quantity = $value;
            print '<br>' . $quantity;
        }
        if ($key == 'price') {
            $UnitPrice = $value;
            print '<br>' . $UnitPrice;
        }
    }
    $MaxOrderID = $conn->prepare("SELECT max(OrderID) as Y FROM orders");
    $MaxOrderID->execute();
    while ($row = $MaxOrderID->fetch()) {
        $OrderID = $row['Y'] + 1;
        $InsertOrder = $conn->prepare("INSERT INTO orders (OrderID) VALUES ($OrderID)");
        $InsertOrder->execute();
    }
}





//
//
//    $OrderLine=0;
//    $OrderID=0;
//    $MaxOrderlineID = $conn->prepare("SELECT max(OrderLineID) as X, max(OrderID) as Y FROM orderlines");
//    $MaxOrderlineID->execute();
//    while ($row = $MaxOrderlineID->fetch()) {
//        $OrderLineID = $row["X"] + 1;
//        $OrderID = $row['Y'] + 1;
//    }
//    $ImplementToDatabase = $conn->prepare("INSERT INTO orderlines (OrderLineID, OrderID, StockItemID, Description, PackageTypeID, Quantity, UnitPrice, TaxRate, PickedQuantity)
//			                                                      VALUES ($OrderLineID, $OrderID, $StockItemID, '$description', 7, $quantity, $UnitPrice, 21, $quantity)");
//    $ImplementToDatabase->execute();
//    $pdo = NULL;
//    $y++;
//}

//$ordersUpdated = 0;
//while ($ordersUpdated < count($IDQuantity)) {
//    $updateQuantityOnHand = $conn->prepare("UPDATE stockitemholdings SET QuantityOnHand = QuantityOnHand - ($IDQuantity[$ordersUpdated]) WHERE StockItemID = ($CurrentID[$ordersUpdated])");
//    $updateQuantityOnHand->execute();
//    $pdo = NULL;
//    $ordersUpdated++;
//}
//
//
//
//session_destroy();
//header("Location: https://www.ideal.nl/demo/");
?>