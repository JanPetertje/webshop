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
//    Menu-scherm
    include "inc/parts/menu.php";
    include "inc/parts/db.php";
    include "inc/parts/head.php";
    ?>
<!--    Homepage:
        - Titel
        - Productgroups
        - Afbeeldingen
        - Footer -->
    <div>
        <h1>Welcome to Wide World Importers</h1>
    </div>


    <div class="imagesborder">
        <ul class="list">
            <br><a class="productgroupLink" href="ProductGroups.php">Product Groups  </a><br><br>
            <?php
            $productgroups = $conn->prepare("SELECT StockGroupName FROM stockgroups");
            $productgroups->execute();
            while ($row = $productgroups->fetch()) {
                $groupnames = $row["StockGroupName"];
                print ("<li><a class='productgroupLink' href='productOverview.php?name=$groupnames'>$groupnames</a></li>");
            }
            $pdo = NULL;

            print"<br><br><br>";
            ?>
        </ul>

        <div id="carouselExampleIndicators" class="carousel slide placementSlides" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/WideWorldImportersSplash.png?auto=yes&bg=777&fg=555&text=First slide" alt="First slide" class="images">
                </div>
                <div class="carousel-item">
                    <img src="img/Globe.jpg?auto=yes&bg=666&fg=444&text=Second slide" alt="Second slide" class="images">
                </div>
                <div class="carousel-item">
                    <img src="img/shipping.jpg?auto=yes&bg=555&fg=333&text=Third slide" alt="Third slide" class="images">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>


<?php
include "inc/parts/footer.php"
?>
    </body>

</html>
