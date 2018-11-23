<?php
session_start();

$product = $_GET["productID"];

$stmt = $conn->prepare("SELECT StockItemID, StockItemName, RecommendedRetailPrice, MarketingComments FROM stockitems WHERE StockItemID = :id");

$stmt->bindParam(":id", $product);

if ($stmt->execute()) {
    $result = $stmt->fetch();
}

$stmt2 = $conn->prepare("SELECT QuantityOnHand FROM stockitemholdings WHERE StockItemID = :id");

$stmt2->bindParam(":id", $product);

if($stmt2->execute()) {
    $result2 = $stmt2->fetch();
}

if(isset($_GET["buy"])) {
    if($result["MarketingComments"] == "") {
        $result["MarketingComments"] = "No description available.";
    }

    $item = [
        "id" => $result["StockItemID"],
        "name" => $result["StockItemName"],
        "price" => $result["RecommendedRetailPrice"],
        "description" => $result["MarketingComments"],
        "quantity" => "1"
    ];

    $cart = $_SESSION["ShoppingCart"];

    array_push($cart, $item);

    $_SESSION["ShoppingCart"] = $cart;
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
                    ?>
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
                         ?>
                        <?php
                        if (number_format($result2["QuantityOnHand"] >= 1)) {
                                    print("Order today before 10PM, tomorrow delivered!"); } else  { print ("This product is out of stock");
                        } ?>

                        </li>



                    </ul>
                </form>
            </div>
        </div>
    </div>
    <?php

    include "inc/parts/footer.php";

    ?>
    </body>
</html>
