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
        $searchinput = filter_var($searchinput["search_input"], FILTER_SANITIZE_STRING);
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
        $searchresults = $conn->prepare("SELECT StockItemID, RecommendedRetailPrice FROM stockitems WHERE StockItemName LIKE '%$searchinput%'");
        $searchresults->execute();
        while ($row = $searchresults->fetch()) {
            $productID = $row["StockItemID"];
            $Price = $row["RecommendedRetailPrice"];
            print ("<a href='productpage.php?productID=$productID'>".$productID . "</a> $" .  $Price ."<br>");
        }
        $pdo = NULL;
        print "<div style='height: 200px;'>
        <br><br><br>    
        <h1><a href='ProductGroups.php' class='productgroupLink'>You just reached the end of this page. If you want to search in productgroups press <b>here</b>.</a></h1>
        </div>";
        ?>
    </div>
    </body>
    <footer>
        <div style="background-color: #8AC007 ">
            <div class="footer">
                <a class="productgroupLink"  style="color: #ffffff;" href="https://termsfeed.com/disclaimer/3c8db8ef82c06aa1e0117b04bacccf23">Disclaimer van WWI - Copyrights 2018</a>
            </div>
        </div>
    </footer>
</html>