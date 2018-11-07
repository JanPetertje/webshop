<html>
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">

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

    <div style="background-color: black; height: 100%; color: white;">
        <?php
        $products = array("hats", "cups", "dog");
        $x = 0;
        foreach ($products as $key => $product) {
            if ($product == $searchinput) {
                print "<br>Results found!";
                $x = 1;
                return;
            } elseif (empty($searchinput)) {
                print "No input - error";
                $x = 1;
                return;
            }
        }
        if ($x == 0) {
            print "No results for $searchinput";
        }
        ?>
    </div>
    </body>
</html>