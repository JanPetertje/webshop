<?php

//include "views/winkelwagen.php";
include "inc/parts/db.php";

#Hier moet nog de link komen naar een foto van het product. Kon het niet vinden in de database
$productname = $conn->prepare("SELECT stockitemname FROM stockitems WHERE StockItemID = 12");
$productname->execute();
while ($row = $productname->fetch()) {
    $name = $row["stockitemname"];
    print($name . "<br>");
}
#Getting the product names from the database which were added to the cart. 'WHERE StockItemID = 12' Should be replaced with the product ID's that were added to the session array.
$productdesc = $conn->prepare("SELECT searchdetails FROM stockitems WHERE StockItemID = 75");
$productdesc->execute();
while ($row = $productdesc->fetch()) {
    $description = $row["searchdetails"];
    print($description . "<br>");
}

$productprice = $conn->prepare("SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = 12");
$productprice->execute();
while ($row = $productprice->fetch()) {
    $price = $row["RecommendedRetailPrice"];
    print($price . "<br>");
}

?>