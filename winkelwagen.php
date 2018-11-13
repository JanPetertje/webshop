<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="inc/css/fonts.css">
    <link rel="stylesheet" href="inc/css/main.css">
    <link rel="stylesheet" href="inc/css/winkelwagen.css">
</head>

<body>

<?php
include "inc/parts/menu.php";
include "inc/parts/db.php";
?>

<div class="top">
    <p class="titel" style="clear:both">Shopping Cart.</p>
</div>

<div class="column-labels" style="clear:both">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-line-price">Subtotal</label>
</div>

<?php
$quantity = 2;
$products = array(215, 75);
$sum = 0;
?>
<div>
    <ul style="list-style-type:none">
        <?php
            foreach($products as $productnumbre => $product_id) {
                $productname = $conn->prepare("SELECT stockitemname FROM stockitems WHERE StockItemID = $product_id");
                $productname->execute();
                while ($row = $productname->fetch()) {
                    $name = $row["stockitemname"];
                }

                $productdesc = $conn->prepare("SELECT searchdetails FROM stockitems WHERE StockItemID = $product_id");
                $productdesc->execute();
                while ($row = $productdesc->fetch()) {
                    $description = $row["searchdetails"];
                }

                $productprice = $conn->prepare("SELECT RecommendedRetailPrice FROM stockitems WHERE StockItemID = $product_id");
                $productprice->execute();
                while ($row = $productprice->fetch()) {
                    $price = $row["RecommendedRetailPrice"];
                }
                ?>
                <li>
                    <div class="product1" style="clear:both">
                        <div class="product-image">
                            <img src= https://b.kisscc0.com/20180717/cyw/kisscc0-fortnite-skin-battle-royale-game-dance-dab-fortnite-click-5b4dbcea9e6494.8478354315318212906488.jpg class="grim">
                        </div>
                        <div class="product-details">
                            <div class="product-title"> <?php print($name); ?></div>
                            <p class="product-description"> <?php print($description); ?> </p>
                        </div>
                        <div class="product-price"><?php print("$".$price); ?></div>
                        <div class="product-quantity">
                            <input type="number" value="<?php print($quantity);?>" min="1">
                        </div>
                        <div class="product-removal"
                            <button type="button" name="Delete">
                                Remove
                            </button>
                        </div>
                        <div class="product-line-price2"> <?php $subprice = $price * $quantity; print("$".$subprice);?></div>
                    </div>
                </li>
                <?php
                $sum+= $subprice;
                }
                ?>

        <div class="totalprice" style = "clear:both:">

            <label> Total </label>
            <div class = "subtotal-values" id = "cart-total" > <?php print("$".$sum); ?> </div>

            <label> Tax </label>
            <div class = "subtotal-values" id = "cart-total" > 21% </div>

            <label> Shipping </label>
            <div class = "subtotal-values" id = "cart-total" > <?php print("injecting trojan succesfull"); ?> </div>

            <label> TOTAL </label>
            <div class = "subtotal-values" id = "cart-total" > <?php $total = $sum * 1.21; print("$".round($total, 2));?> </div>


        </div>

        </li>
        <li>
            <a href="#" class="myButton">order now!</a>
        </li>
    </ul>
</div>
</body>
</html>