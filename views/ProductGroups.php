<!doctype html>
<html lang="en">
<head>
    <?php


    include "inc/parts/head.php";
    ?>

    <link rel="stylesheet" href="inc/css/winkelwagen.css">
    <link rel="stylesheet" href="inc/css/ProductGroupsStyle.css">
</head>

<body>

<?php
include "inc/parts/menu.php";
include "inc/parts/db.php";
?>


<div class="top">
    <p class="titel">Product Groups</p>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="items">
<?php
                $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
//            $productgroups = $pdo->prepare(state"SELECT StockGroupName FROM stockgroups");
            $productgroups->execute();
            while ($row = $productgroups->fetch()) {
                $groupnames = $row["StockGroupName"];
                echo '<div class="card product-card">
                      <img src="https://hlfppt.org/wp-content/uploads/2017/04/placeholder.png" alt="Product picture" class="card-img-top">
                      <div class="card-body">
                      <h5 class="card-title">' . $groupnames . '</h5>
                      <a class="btn btn-primary" href="productOverview.php?name=' . $groupnames . '">More Products!</a>
                    </div>
                </div>';
            }

$pdo = NULL;

?>

        </div>
    </div>
</div>

<!--                    print ("<li><a class='productgroupLink' href='product.php?name=$groupnames'>$groupnames</a></li>");-->
<!--                    foreach($productgroups as $item) {-->
<!--                            echo '<div class="card product-card">-->
<!--                                <img src="https://hlfppt.org/wp-content/uploads/2017/04/placeholder.png" alt="Product picture" class="card-img-top">-->
<!--                                <div class="card-body">-->
<!--                                        <h5 class="card-title">' . $item["groupnames"] . '</h5>-->
<!--                                    </div>-->
<!--                            </div>';-->
<!--         }-->

</body>
</html>