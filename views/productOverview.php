<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/productOverview.css">
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


    <div class="text">
    <?php

    $productname = $conn->prepare("Select StockGroupName, StockItemName, sg. StockGroupID from stockitemstockgroups sg join stockitems s on sg.StockItemId = s.StockItemID join stockgroups st on sg.StockGroupID = st.StockGroupID order by StockGroupID");
    $productname->execute();
    while ($row = $productname->fetch()) {
        $productnames = $row["StockItemName"];
        $stockgroupID = $row["StockGroupID"];
        $group = $row["StockGroupName"];


        if ($productGroup == $group) {
            print ( $stockgroupID . ": " . $productnames . "<br>");
        }
    }

    ?>



    </div>

    </body>
</html>

