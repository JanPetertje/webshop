<html>
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/searchresults.css">

        <?php
        include "inc/parts/menu.php";
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
        $products = array("Novelty Items", "Clothing", "Mugs", "T-Shirts", "Airline Novelties", "Computing Novelties", "USB Novelties", "Furry Footwear", "Toys", "Packaging Materials", "Shipping Products");
        $x = 0;
        foreach ($products as $key => $product) {
            if ($product == $searchinput) {
                print "Results found!";
                $x = 1;
                return;
            } elseif (empty($searchinput)) {
                print "Please enter a search objective - Error";
                $x = 1;
                return;
            }
        }
        if ($x == 0) {
            print "<u>No results</u> found, please try another.";
        }
        ?>
    </div>

    <div>
        Resultaten
    </div>
    </body>
</html>