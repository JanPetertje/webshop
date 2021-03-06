<html>
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/searchresults.css">

        <?php
        include "inc/parts/menu.php";
        include "inc/parts/db.php";
        include "inc/parts/head.php";
        include 'inc/parts/footer.php';
        ?>
    </head>
    <body>
    <div>
       <h1>
        <?php
        $searchinput = $_GET;
        $searchinput = filter_var($searchinput["search_input"], FILTER_SANITIZE_STRING);
        print "Results for: " . $searchinput;
        ?>
        </h1>
    </div>

    <div class="searchproductid">

<!--        Redirect when someone searches a productid-->
        <?php

        if (is_numeric($searchinput)) {

            $searchproductids = $conn->prepare("SELECT StockItemID FROM stockitems WHERE StockItemID = '$searchinput'");
            $searchproductids->execute();
            while ($row = $searchproductids->fetch()) {
                $productidsearch = $row["StockItemID"];

                header("Location: productpage.php?productID=$productidsearch");

            }
        }


        ?>

    </div>


    <div class="border">

<!--        counts amount of search results-->
        <?php
        $countResults = $conn->prepare("SELECT count(*) AS aantal FROM stockitems WHERE StockItemName LIKE '%$searchinput%' OR Tags LIKE '%$searchinput%' ");
        $countResults->execute();
        while ($row = $countResults->fetch()) {
            $aantal = $row["aantal"];
            print $aantal . " results found";
        }
        $pdo = null;

        ?>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="items">

<!--                print the results-->
        <?php
            $searchresults = $conn->prepare("SELECT StockItemID, RecommendedRetailPrice, Tags, StockItemName FROM stockitems WHERE StockItemName LIKE '%$searchinput%'  OR Tags LIKE '%$searchinput%' ");
            $searchresults->execute();
            while ($row = $searchresults->fetch()) {
                $productnames = $row["StockItemName"];
                $productID = $row["StockItemID"];
                $Price = $row["RecommendedRetailPrice"];
                print '<div class="card product-card">
                          <img class="product-img" src="img/products/' . $productID . '.jpg"alt="Product picture" class="card-img-top">
                          <div class="card-body">
                          <h5 class="card-title">' . $productnames . '</h5>
                          <p class="card-text">€ ' . $row["RecommendedRetailPrice"] . '</p>
                          <a class="btn btn-primary" href="productpage.php?productID=' . $productID . '">Read More!</a>
                        </div>
                    </div>';
            }


        ?>
</div>
    </div>
        </div>

<!--    end of the page -->

    <?php
    $pdo = null;
    print "<div style='height: 200px;'>
        <br><br><br>    
        <h1><a href='ProductGroups.php' class='link'>You just reached the end of this page. If you want to search in productgroups press <b>here</b>.</a></h1>
        </div>";
    ?>



    </body>
</html>