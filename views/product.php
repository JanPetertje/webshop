<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/product.css">
    </head>

    <body>
    <?php
    $name = ($_GET["name"])
    ?>
    <?php
    include "inc/parts/menu.php";
    include "inc/parts/db.php";
    ?>

    <div class="top">
        <p class="titel"><?php echo $name ?></p>
    </div>
    <ul class="list">
        <br><a class="productgroupLink" href="ProductGroups.php">Product Groups  </a><br><br>

        <?php
        $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
        $productgroups->execute();
        while ($row = $productgroups->fetch()) {
            $groupnames = $row["StockGroupName"];
            print ("<li><a class='productgroupLink' href='product.php?name='> $groupnames</a></li>");
        }
        print"<br><br><br>";
        ?>

<!--        <li><a class="productgroupLink" href="product.php?name=Novelty%20Items">Novelty Items</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Clothing">Clothing</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Mugs">Mugs</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=T-Shirts">T-Shirts</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Airline%20Novelties">Airline Novelties</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Computing%20Novelties">Computing Novelties</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=USB%20Novelties">USB Novelties</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Furry%20Footwear">Furry Footwear</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Toys">Toys</a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Packaging%20Materials">Packaging Materials</Materials></a></li>-->
<!--        <li><a class="productgroupLink" href="product.php?name=Shipping%20Products">Shipping Products</a></li><br>-->
    </ul>

    </body>
</html>

