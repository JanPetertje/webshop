<html>
    <head>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">

        <?php
        include "inc/parts/menu.php";
        ?>
    </head>
    <body>
    <h1>
    <?php
    $searchinput = $_GET;
    print "You were searching for: " . $searchinput["search_input"];
    ?>
    </h1>
    </body>
</html>