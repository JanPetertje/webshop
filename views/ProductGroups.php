<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <?php
    include "inc/parts/head.php";
    ?>
    <link rel="stylesheet" href="inc/css/shoppingcart.css">
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

<!--Alle productgroepen laten zien-->
<div class="container-fluid">
    <div class="row">
        <div class="items">
            <?php
            $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
            $productgroups->execute();
            $x = 0;
            while ($row = $productgroups->fetch()) {
                $groupnames = $row["StockGroupName"];

                echo '<div class="card product-card">';
                    $GroepFoto = $conn->prepare("SELECT distinct st.StockGroupID AS ID 
                                                           FROM stockitemstockgroups sg 
                                                           JOIN stockitems s on sg.StockItemId = s.StockItemID 
                                                           right JOIN stockgroups st on sg.StockGroupID = st.StockGroupID 
                                                           WHERE StockGroupName = '$groupnames'
                                                           ");
                    $GroepFoto->execute();
                    while ($row = $GroepFoto->fetch()) {

                            $idnr = $row["ID"];

                            print ('<img src="img/ProductGroups/p' . $idnr . '.jpg" alt="Product picture" class="card-img-top product-img product-img2">');
                    }

                print ('<div class="card-body">
                            <h5 class="card-title">' . $groupnames . '</h5>
                            <a class="btn btn-primary" href="productOverview.php?name=' . $groupnames . '">More Products!</a>
                      </div>
        </div>');
            }

            $pdo = NULL;

            ?>
        </div>
    </div>
</div>

<div style="margin-bottom: 25px;">
</div>
<?php include 'inc/parts/footer.php'; ?>
</body>
</html>