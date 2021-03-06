<?php
session_start();

$stmt = $conn->prepare("SELECT COUNT(StockItemID) FROM stockitems");

if($stmt->execute()) {
$pageResults = $stmt->fetch();
}


?>
<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/productOverview.css">
        <?php
        include "inc/parts/menu.php";
        ?>
    </head>

    <body>
    <?php
        include "inc/parts/head.php";
        ?>

<!--    Verkeerde input verwerken-->
        <?php
        $productGroup = $_GET;
        $productGroup = $productGroup['name'];
        if (empty($productGroup)) {
            header('location: index.php');
        }

        $x = 0;
        $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
            $productgroups->execute();
        while ($row = $productgroups->fetch()) {
            $groupnames = $row["StockGroupName"];
            if ($productGroup == $groupnames) {
                $x = 1;
            }
        }
        if ($x == 0) {
            header('location: ProductGroups.php');
        }
        $pdo = NULL;
        ?>

<!--Productgroepen-->
    <div class="top">
        <p class="titel"><?php print $productGroup;?></p>
    </div>
    <ul class="list">
        <br><a class="productgroupLink" href="ProductGroups.php">Product Groups  </a><br><br>

        <?php
        $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
        $productgroups->execute();
        while ($row = $productgroups->fetch()) {
            $groupnames = $row["StockGroupName"];
            print ("<li><a class='productgroupLink' href='productOverview.php?name=$groupnames'> $groupnames</a></li>");
        }
        print"<br><br><br>";

        ?>

    </ul>

    <div class="container-fluid">
        <div class="row">
            <div class="items">
    <?php
    $productname = $conn->prepare("Select StockGroupName, StockItemName, s.StockItemID, sg. StockGroupID, RecommendedRetailPrice from stockitemstockgroups sg join stockitems s on sg.StockItemId = s.StockItemID join stockgroups st on sg.StockGroupID = st.StockGroupID order by StockGroupID");
    $productname->execute();
    while ($row = $productname->fetch()) {
        $productnames = $row["StockItemName"];
        $ProductID = $row["StockItemID"];
        $group = $row["StockGroupName"];
        $Price = $row["RecommendedRetailPrice"];
        $stockgroupID = $row["StockGroupID"];

        if ($productGroup == $group && (file_exists('img/products/' . $ProductID . '.jpg') == TRUE)) {
            print '<div class="card product-card">
                      <img class="product-img" src="img/products/' . $ProductID . '.jpg" alt="Product picture" class="card-img-top">
                      <div class="card-body">
                      <h5 class="card-title">' . $productnames. '</h5>
                      <p class="card-text">€ ' . $row["RecommendedRetailPrice"] . '</p>
                      <a class="btn btn-primary" href="productpage.php?productID=' . $ProductID . '">Read More!</a>
                    </div>
                </div>';

        } elseif ($productGroup == $group && (file_exists('img/products/' . $ProductID . '.jpg') == false)) {
            print '<div class="card product-card">
                      <img class="product-img" src="img/ProductGroups/p' . $stockgroupID . '.jpg" alt="Product picture" class="card-img-top">
                      <div class="card-body">
                      <h5 class="card-title">' . $productnames. '</h5>
                      <p class="card-text">€ ' . $row["RecommendedRetailPrice"] . '</p>
                      <a class="btn btn-primary" href="productpage.php?productID=' . $ProductID . '">Read More!</a>
                    </div>
                </div>';
        }
    }
    ?>


            </div>
        </div>
    </div>



    <?php
    $countids = $conn->prepare("Select count(sg.StockGroupID)totaal, s.StockGroupName from stockitemstockgroups sg right join stockgroups s on sg.StockGroupID = s.StockGroupID group by s.StockGroupID");
    $countids->execute();
    while ($row = $countids->fetch()) {
        $countid = $row["totaal"];
        $names = $row["StockGroupName"];
        $names = $row["StockGroupName"];
        if ($countid <= 0 && $names == $productGroup) print "<div style='height: 200px;'> <h1><a href='ProductGroups.php' class='noproducts'> This productgroup has no products, <br> press this link to enter the productgroupspage. </a></h1></div>";
    }
    ?>

        <?php include 'inc/parts/footer.php'; ?>


    </body>



</html>

