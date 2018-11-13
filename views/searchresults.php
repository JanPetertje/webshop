<html>
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/searchresults.css">

        <?php
        include "inc/parts/menu.php";
        include "inc/parts/db.php";
        ?>
    </head>
    <body>
    <div>
       <h1>
        <?php
        $searchinput = $_GET;
        $searchinput = $searchinput["search_input"];
        print "Results for: ".$searchinput;
        ?>
        </h1>
    </div>

    <div class="border">
        <?php
        $countResults = $conn->prepare("SELECT count(StockItemName) AS aantal FROM stockitems WHERE StockItemName LIKE '%$searchinput%'");
        $countResults->execute();
        while ($row = $countResults->fetch()) {
            $aantal = $row["aantal"];
            print $aantal . " results found";
        }
        $pdo = NULL;

        ?>
    </div>

    <div class="resultList">
        <?php
        $searchresults = $conn->prepare("SELECT StockItemName, RecommendedRetailPrice FROM stockitems WHERE StockItemName LIKE '%$searchinput%'");
        $searchresults->execute();
        while ($row = $searchresults->fetch()) {
            $productName = $row["StockItemName"];
            $Price = $row["RecommendedRetailPrice"];
            print ("<a href='views/productpage.php?productname=$productName'>".$productName . "</a> $" .  $Price ."<br>");
        }
        $pdo = NULL;

        ?>
    </div>
    </body>
</html>