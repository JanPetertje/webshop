<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="inc/css/fonts.css">
        <link rel="stylesheet" href="inc/css/main.css">
        <link rel="stylesheet" href="inc/css/winkelwagen.css">
    </head>

    <body>

    <?php
    include "inc/parts/menu.php";
    ?>

    <div class="top">
        <p class="titel">Winkelwagen</p>
    </div>

<!--    <div class="kopjes">-->
<!--        <h1 class="kopje1">Product</h1>-->
<!--        <h1 class="kopje1">price</h1>-->
<!--        <h1 class="kopje1">quantity</h1>-->
<!--        <h1 class="kopje1">subtotal</h1>-->


    <div class="column-labels">
        <label class="product-image">Image</label>
        <label class="product-details">Product</label>
        <label class="product-price">Price</label>
        <label class="product-quantity">Quantity</label>
<!--        <label class="product-removal">delete</label>-->
        <label class="product-line-price">Total</label>
    </div>



<!--    <label class="product-removal">delete</label>-->

<!--    <div>-->
<!--        <ul>-->
<!---->
<!--          <li> </li>-->
<!---->
<!--        </ul>-->
<!---->
<!--    </div>-->




    <div class="product">
        <div class="product-image">
            <img src= https://upload.wikimedia.org/wikipedia/commons/9/92/The_death.png >
        </div>
        <div class="product-details">
            <div class="product-title"> productnaam </div>
            <p class="product-description"> beschrijving </p>
        </div>
        <div class="product-price">12.99</div>
        <div class="product-quantity">
            <input type="number" value="2" min="1">
        </div>
        <div class="product-removal">
            <button class="remove-product">
                Remove
            </button>
        </div>
        <div class="product-line-price2">25.98</div>
    </div>




    <!--maak voor elke header een 1/8,3/8,5/8,7/8 zodat alles netjes te staan komt op de pagina-->

<!--    </div>-->
<!---->
<!--    <div>-->
<!--        <img src="https://www.wisfaq.nl/bestanden/q59712img1.gif" class="image">-->
<!--    </div>-->



<!--    <ul>-->
<!--        <li>-->
<!--            <h1 class="product1">Productnaam</h1>-->
<!--            <p>poephoofd</p>-->
<!--        </li>-->
<!--        <li>-->
<!--            <h1 class="product2"> Nog een product</h1>-->
<!--            <p>Poep</p>-->
<!--        </li>-->
<!--        <li>-->
<!--        <h1 class="product3"> nog een 3e product</h1>-->
<!--        </li>-->
<!--    </ul>-->


    <a href="#" class="myButton">order now!</a>



    </body>
</html>