







<!doctype html>
<html lang="en">
<head>
    <?php

    include "inc/parts/head.php";
    include 'inc/parts/footer.php';

    ?>
    <link rel="stylesheet" href="inc/css/_productOverview.css">
</head>
<body>
<?php

include "inc/parts/menu.php";

?>
<div class="container-fluid overview-container">
    <div class="row">
        <div class="col-lg-3">
            <div class="list-group">
                <div class="stock-group-list">
                    <div class="list-group-item custom-list-group">
                        <a href="ProductGroups.php" class="product-group-link">Product groups</a>
                    </div>
                    <?php

                    foreach($productGroupNameResult as $item) {
                        echo '<a href="_productOverview.php?id=' . $item["StockGroupID"] . '&limit=0" class="list-group-item custom-list-group">' . $item["StockGroupName"] . '</a>';
                    }

                    ?>
                    <div class="list-group-item custom-list-group">
                        <div class="btn-group d-flex" role="group">
                            <?php

                            $pageCount = 0;

                            for($i = 0; $i < $pageResults["COUNT(S.StockItemID)"]; $i += 15) {
                                $pageCount += 1;
                                echo '<a href="_productOverview.php?id=' . $category . '&limit=' . $i . '" class="btn btn-primary w-100">' . $pageCount . '</a>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php

//    print $stockGroupname["StockGroupName"];

    ?>
        <div class="col-lg-9">
            <div class="product-list">
                <?php

                if(!empty($productGroupItemResult)) {
                    foreach($productGroupItemResult as $item) {
                        if(file_exists('img/products/' . $item["StockItemID"] . '.jpg') == false) {
                            echo '
                            <div class="card product-card">
                                <img src="img/ProductGroups/p' . $item["StockGroupID"] . '.jpg" alt="Product group picture" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">' . $item["StockItemName"] . '</h5>
                                    <p class="card-text">€ ' . $item["RecommendedRetailPrice"] . '</p>
                                    <a href="productpage.php?productID=' . $item["StockItemID"] . '" class="btn btn-primary btn-block">Read more</a>
                                </div>
                            </div>
                            ';
                        } else {
                            echo '
                            <div class="card product-card">
                                <img src="img/Products/' . $item["StockItemID"] . '.jpg" alt="Product picture" class="card-img-top">
                                <div class="card-body">
                                    <h5 class="card-title">' . $item["StockItemName"] . '</h5>
                                    <p class="card-text">€ ' . $item["RecommendedRetailPrice"] . '</p>
                                    <a href="productpage.php?productID=' . $item["StockItemID"] . '" class="btn btn-primary btn-block">Read more</a>
                                </div>
                            </div>
                            ';
                        }
                    }
                } else {
                    print"<div style='height: 200px;'> <h1><a href='ProductGroups.php' class='noproducts'> This productgroup has no products  <br> press <i> <b> this link </b> </i> to enter the productgroupspage. </a></h1></div>";

                }

                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>