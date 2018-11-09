<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>WWI</title>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/index.css">
        
    </head>

    <body>

    <?php
    include "inc/parts/menu.php";
    include "inc/parts/db.php";
    ?>

    <div>
        <h1>Popular items</h1>
    </div>


    <div>
        <ul class="list">
            <br><a class="productgroupLink" href="ProductGroups.php">Product Groups  </a><br><br>
            <?php
            $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
            $productgroups->execute();
            while ($row = $productgroups->fetch()) {
                $groupnames = $row["StockGroupName"];
                print ("<li><a class='productgroupLink' href='product.php?name=Novelty%20Items'> $groupnames</a></li>");
            }
            print"<br><br><br>";
            ?>
        </ul>
    </div>

    <div class="imagesborder">
        <div>
       <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 75px;
             top: 0px;">
        <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 105px;
             top: 0px;">

        <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 135px;
             top: 0px;">

        <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 75px;
             top: 50px;">

        <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 105px;
             top: 50px;">

        <img src="img/chocoreep.png" alt="chocoreep" class="picturesHome"
             style="position: relative;
             left: 135px;
             top: 50px;">
        </div>
    </div>



    </body>
    <footer>
        <div style="background-color: #8AC007 ">
            <div class="footer">
            Disclaimer van WWI - Copyrights 2018
            </div>
        </div>
    </footer>

</html>