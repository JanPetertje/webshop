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

    ?>
    <div class="container-fluid">
        <div class="row info-row">
            <div class="col-lg-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active productImage">
                            <img class="d-block w-100 h-100" src="https://amp.businessinsider.com/images/57f4036d9bd978d11b8b478f-750-375.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item productImage">
                            <img class="d-block w-100 h-100" src="https://reviewed-com-res.cloudinary.com/image/fetch/s--7ev_7Hn4--/b_white,c_limit,cs_srgb,f_auto,fl_progressive.strip_profile,g_center,q_auto,w_642/https://reviewed-production.s3.amazonaws.com/attachment/aa7ee39e5eab474d/air-fryer.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item productImage">
                            <img class="d-block w-100 h-100" src="https://cdn-images-1.medium.com/max/1600/1*z96WPBDM0g1p59TlibghsA.png" alt="Third slide">
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
                    <ul class="property-list">
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
                        </li>';

                        ?>
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
