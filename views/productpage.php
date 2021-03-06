<?php
session_start();

$product = $_GET["productID"];
//statement for stockitem
$stmt = $conn->prepare("SELECT StockItemID, StockItemName, RecommendedRetailPrice, MarketingComments, IsChillerStock FROM stockitems WHERE StockItemID = :id");

$stmt->bindParam(":id", $product);

if ($stmt->execute()) {
    $result = $stmt->fetch();
}
// statement for product Quantity
$stmt2 = $conn->prepare("SELECT QuantityOnHand FROM stockitemholdings WHERE StockItemID = :id");

$stmt2->bindParam(":id", $product);

if($stmt2->execute()) {
    $result2 = $stmt2->fetch();
}

if($result["MarketingComments"] == "") {
    $result["MarketingComments"] = "No description available.";
}
// statement for temperature
$stmt3 = $conn->prepare("SELECT ROUND(SUM(Temperature)/COUNT(*),1) AS Temperature FROM coldroomtemperatures");

if($stmt3->execute()) {
    $result3 = $stmt3->fetch();
}

//error_reporting(0);

if(isset($_GET["buy"])) {

    $item = [
        "id" => $result["StockItemID"],
        "name" => $result["StockItemName"],
        "price" => $result["RecommendedRetailPrice"],
        "description" => $result["MarketingComments"],
        "quantity" => "1",
        "QuantityOnHand" => $result2["QuantityOnHand"]
    ];

    $ter = 0;

    foreach($_SESSION['ShoppingCart'] as $dot => $net){
        if($_GET['productID'] == $net['id']){
            $dot = $dot;
            $ter = 1;
            $_SESSION['ShoppingCart'][$net]['quantity'] = $_POST['newquantity'];
        }
    }

    if($ter == 0){
        trim($dot);
        $cart = $_SESSION["ShoppingCart"];
        array_push($cart, $item);
        $_SESSION['ShoppingCart'] = $cart;
    }
}

$stmt4 = $conn->prepare("select StockGroupID, StockItemID from stockitemstockgroups where StockItemID = '$product'");
$stmt4->execute();
while ($row = $stmt4->fetch()) {

$productgroupid = $row["StockGroupID"];
$stockitemid = $row["StockItemID"];
}

?>
<!doctype html>
<html lang="en">
    <head>
        <?php

        include "inc/parts/head.php";

        ?>
        <link rel="stylesheet" href="inc/css/productpage.css">
    </head>
    <body>
    <?php

    include "inc/parts/menu.php";


//    checks if pictures are available
    if (file_exists('img/products/' . $product . '_2.jpg') == TRUE)
        echo '<div class="container-fluid">
        <div class="row info-row">
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '.jpg" alt="First slide">
                        </div>
                       <div class="carousel-item productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '_1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '_2.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="productpage.php" method="get">
                    <ul class="property-list">';

    elseif ((file_exists('img/products/' . $product . '_2.jpg') == FALSE) && (file_exists('img/products/' . $product . '_1.jpg') == TRUE))
        echo '<div class="container-fluid">
        <div class="row info-row">
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '.jpg" alt="First slide">
                        </div>
                       <div class="carousel-item productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '_1.jpg" alt="Second slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="productpage.php" method="get">
                    <ul class="property-list">';

    elseif ((file_exists('img/products/' . $product . '_1.jpg') == FALSE) && (file_exists('img/products/' . $product . '_2.jpg') == FALSE) && (file_exists('img/products/' . $product . '.jpg') == TRUE))
        echo '<div class="container-fluid">
        <div class="row info-row">
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active productImage">
                            <img class="d-block w-100 h-100" src="img/products/' . $product . '.jpg" alt="First slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="productpage.php" method="get">
                    <ul class="property-list">';

    elseif ((file_exists('img/products/' . $stockitemid . '.jpg') == FALSE))
        echo '<div class="container-fluid">
        <div class="row info-row">
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active productImage">
                            <img class="d-block w-100 h-100" src="img/productgroups/p' . $productgroupid . '.jpg" alt="First slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-7">
                <form action="productpage.php" method="get">
                    <ul class="property-list">';
                    ?>

<!--product information-->
                        <?php

                        echo '<li>
                            <h1>' . $result["StockItemName"] . '</h1>
                        </li>
                        <li>
                            <p class="price"><span class="badge badge-success">€ ' . $result["RecommendedRetailPrice"] . '</span></p>
                        </li>
                        <li>
                            <p>' . $result["MarketingComments"] . '</p>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="productpage.php?productID=' . $result["StockItemID"] . '&buy=true">Add to shopping cart</a>
                        </li>
                        <li>
                            <p>Available: <span class="badge badge-info">' . number_format($result2["QuantityOnHand"]) . '</span></p>
                        </li>
                        <li class="text">';

                        if (number_format($result2["QuantityOnHand"] >= 1)) {
                                    print("Order today before 10PM, tomorrow delivered!"); } else  { print ("This product is out of stock");
                        }

                        if ($result["IsChillerStock"] == 1) {
                            echo  '<li class="text"> Temperature of the refrigerator: ' . $result3["Temperature"]. '℃ </li> ';
                        }

                        ?>
                    </ul>
                </form>

    <form action="Update_Review.php" method="post">
       Stars <select name="rating">
            <?php
            $maxrating = 5;
            $minrating = 1;
            while ($minrating <= $maxrating) {
                print ("<option>$maxrating</option>");
                $maxrating = $maxrating -1;
            }
            ?>
        </select>
            <input type="hidden" name="ID" value="<?php print $product;?>" min="<?php print $product;?>" max="<?php print $product;?>" >
        </select>
        <br>
        Comment:   <textarea rows="4" cols="40" type="text" name="content"></textarea>
        <input type="submit">
    </form>
    <?php
//    connect statement for review
    $stmt5 = $conn->prepare("SELECT Rating,Content FROM Review WHERE StockItemID = '$product'");
    $stmt5->execute();
    while ($row = $stmt5->fetch()) {
        $rating = $row["Rating"];
        $Content = $row["Content"];
        echo '
    <div>
    rating: ' . $rating  . '  stars<br>
    Review: ' . $Content .

            '</div><br>'
    ;}
    ?>
            </div>

    <?php
    $pdo = null;
    include "inc/parts/footer.php";

    ?>
    </body>
</html>
