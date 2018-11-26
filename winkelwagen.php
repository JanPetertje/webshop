<?php
session_start();

$shoppingCart = $_SESSION["ShoppingCart"];
$products = 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping cart</title>
    <link rel="stylesheet" href="inc/css/fonts.css">
    <link rel="stylesheet" href="inc/css/main.css">
    <link rel="stylesheet" href="inc/css/winkelwagen.css">
</head>
<body>

<?php
include "inc/parts/menu.php";
include "inc/parts/db.php";
include "inc/parts/footer.php";
$sum = 0;
$delete = 0;
if (isset($_GET["remove"])) {
    $getal = $_GET["remove"];
    foreach($_SESSION['ShoppingCart'] as $numbre => $buys){
        if($buys['id'] == $getal) {
            unset($_SESSION['ShoppingCart'][$numbre]);
        }
    }
    $_SESSION['ShoppingCart'] = array_values($_SESSION['ShoppingCart']);
}

if(isset($_POST['change_amount'])){
    foreach($_SESSION['ShoppingCart'] as $numbree => $idd){;
        if($_POST['product_idd'] == $idd['id']){
            $_SESSION['ShoppingCart'][$numbree]['quantity'] = filter_var($_POST['quantity'], FILTER_SANITIZE_STRING);
        }
    }
}
foreach($_SESSION["ShoppingCart"] as $item){
    $item = $item; $products+= 1;
}


if($products >= 1) {
?>

<div class="top">
    <p class="titel" style="clear:both">Shopping Cart <?php print("(".$products.")"); ?></p>
</div>

<div class="column-labels" style="clear:both">
    <label class="product-image">Image</label>
    <label class="product-details">Product</label>
    <label class="product-price">Price/piece</label>
    <label class="product-quantity">Quantity</label>
    <label class="product-line-price">Price</label>
</div>

<?php

//print_r($_SESSION['ShoppingCart']);
//error_reporting(0);
?>

<?php
    ?>
    <div>
        <ul style="list-style-type:none">
            <?php
            foreach ($_SESSION["ShoppingCart"] as $item) {
                ?>
                <li>
                    <div class="product1" style="clear:both">
                        <div class="product-image">
                            <img class="product-img" src="img/Products/<?php print($item['id']) ?>.jpg">
                        </div>
                        <div class="product-details">
                            <div class="product-title"> <?php echo $item['name']; ?></div>
                            <p class="product-description"> <?php echo $item['description']; ?> </p>
                        </div>
                        <div class="product-price" name="price"><?php echo "€" . $item['price']; ?></div>
                        <div class="product-quantity">
                            <form method="post">
                                <input type="number" name="quantity" value="<?php print $item["quantity"]; ?>" min="1"
                                       required>
                                <input type="hidden" name="product_idd" value="<?= $item['id']; ?>">
                                <button type="submit" name="change_amount" value="update">Change amount</button>
                            </form>
                        </div>
                        <div class="product-removal">
                            <button class="btn btn-danger"
                                    onclick="window.location.href='winkelwagen.php?remove=<?php echo $item['id']; ?>'">X
                            </button>
                        </div>
                        <div class="product-line-price2"> <?php $subprice = $item['price'] * $item['quantity'];
                            print("€" . number_format($subprice, 2)); ?></div>
                    </div>
                </li>
                <?php
                $sum += $subprice;
            }
            ?>
            <div class="underline">

            </div>

            <div class="totalprice" style="clear:both">

                <!--            <label class="subtotal-values"> Subtotal </label>-->
                <div class="subtotal-values"> <?php print("<u>Subtotal:</u> €" . number_format($sum, 2)); ?> </div>

                <!--            <label class="subtotal-values"> Tax </label>-->
                <div class="subtotal-values"><u>Tax:</u> <?php print(" "); ?> 21%</div>

                <!--            <label class="subtotal-values"> Shipping </label>-->
                <div class="subtotal-values"> <?php print("<u>Shipping:</u> FREE"); ?> </div>

                <!--            <label class="subtotal-values"> TOTAL </label>-->
                <div class="subtotal-values"> <?php $total = $sum * 1.21;
                    print("<u>TOTAL:</u> €" . number_format($total, 2)); ?> </div>

            </div>
            </li>
            <li>
                <a href="order.php" class="myButton"><b>order now!</b></a>
            </li>
        </ul>
    </div>
    <?php
}
else{ ?>

    <div class="product2"><a href="index.php" class="subtotal-valuess">
        <img src="img/iconfinder_Basket_2205960.png" class="waggie"><br>
        <div class="subtotal-valuess">There are no products in your shoppingcart</div>
        <div class="subtotal-valuess">Click here to go back</div>
        </a>
    </div>

<?php } ?>
</body>
</html>