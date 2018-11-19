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
    <link rel="stylesheet" href="inc/css/index.css">

</head>

<body>
    <?php
    include "inc/parts/menu.php";
    include "inc/parts/db.php";
    include "inc/parts/head.php";
    ?>

    <?php
    $product = $_GET;
    $productID = $product["productID"];
    print $productID;

    $searchresults = $conn->prepare("SELECT StockItemID, StockItemName, Size, RecommendedRetailPrice FROM stockitems WHERE StockItemID = '$productID'");
    $searchresults->execute();
    while ($row = $searchresults->fetch()) {
        $productID = $row["StockItemID"];
        $productName = $row["StockItemName"];
        $Size = $row["Size"];
        $Price = $row["RecommendedRetailPrice"];
        print ($productID. " $Size ". $productName . " $" .  $Price ."<br>");
    }
    $pdo = NULL;

    print ("<img src='img/Products/ID_$productID.jpg'>");

    ?>
</body>

</html>