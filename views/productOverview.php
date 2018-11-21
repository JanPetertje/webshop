<!doctype html>
<html lang="en">
    <head>
        <?php
        include "inc/parts/head.php";
        ?>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/productOverview.css">
        <?php
        include "inc/parts/head.php";
        ?>

    </head>

    <body>
    <?php
    $productGroup = ($_GET);
    $productGroup = $productGroup["name"];

    include "inc/parts/menu.php";
    include "inc/parts/db.php";
    ?>

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
    $productname = $conn->prepare("Select StockGroupName, StockItemName, s.StockItemID, sg. StockGroupID from stockitemstockgroups sg join stockitems s on sg.StockItemId = s.StockItemID join stockgroups st on sg.StockGroupID = st.StockGroupID order by StockGroupID");
    $productname->execute();
    while ($row = $productname->fetch()) {
        $productnames = $row["StockItemName"];
        $ProductID = $row["StockItemID"];
        $group = $row["StockGroupName"];


        if ($productGroup == $group) {
            print '<div class="card product-card">
                      <img class="product-img" src="img/products/' . $ProductID . '.jpg" alt="Product picture" class="card-img-top">
                      <div class="card-body">
                      <h5 class="card-title">' . $productnames. '</h5>
                      <a class="btn btn-primary" href="productpage.php?productID=' . $ProductID . '">Read More!</a>
                    </div>
                </div>';
        }
    }
    ?>


    </div>
        </div>
    </div>

    <div class ="noproducts">

    <?php

    $countids = $conn->prepare("Select count(sg.StockGroupID)totaal, s.StockGroupName from stockitemstockgroups sg right join stockgroups s on sg.StockGroupID = s.StockGroupID group by s.StockGroupID");
    $countids->execute();
    while ($row = $countids->fetch()) {
        $countid = $row["totaal"];
        $names = $row["StockGroupName"];

        if ($countid <= 0 && $names == $productGroup) print "<div style='height: 200px;'> <h1><a href='ProductGroups.php' class='link'> this productgroupp has no products, press to go to the other productgroups </a></h1></div>";
    }

    ?>
    </div>
    </body>



</html>

