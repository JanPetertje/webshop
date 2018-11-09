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
    include "inc/parts/db.php";
    ?>

    <div class="top">
        <p class="titel">Shopping Cart.</p>
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
<?php $quantity = 2;?>
    <div>
        <ul style="list-style-type:none">


          <li>
              <div class="product1" style="clear:both">
                  <div class="product-image">
                      <img src= https://b.kisscc0.com/20180717/cyw/kisscc0-fortnite-skin-battle-royale-game-dance-dab-fortnite-click-5b4dbcea9e6494.8478354315318212906488.jpg class="grim">
                  </div>
                  <div class="product-details">
                      <div class="product-title"> <?php print($name); ?></div>
                      <p class="product-description"> <?php print($description); ?> </p>
                  </div>
                  <div class="product-price"><?php print($price); ?></div>
                  <div class="product-quantity">
                      <input type="number" value="<?php print($quantity);?>" min="1">
                  </div>
                  <div class="product-removal">
                      <button class="remove-product">
                          Remove
                      </button>
                  </div>
                  <div class="product-line-price2"> <?php $subprice = $price * $quantity; print($subprice);?></div>
              </div>
          </li>
            <li>
                <div class="product1" style="clear:both">
                    <div class="product-image">
                        <img src= https://banner2.kisspng.com/20180613/gpo/kisspng-fortnite-battle-royale-minecraft-battle-royale-gam-fortnite-skins-5b20aced2df673.8941036815288680771883.jpg class="grim">
                    </div>
                    <div class="product-details">
                        <div class="product-title"> productnaam </div>
                        <p class="product-description"> beschrijving </p>
                    </div>
                    <div class="product-price"><?php $prijsgrim = 12.99; print($prijsgrim); ?></div>
                    <div class="product-quantity">
                        <input type="number" value="<?php print($quantity);?>" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">
                            Remove
                        </button>
                    </div>
                    <div class="product-line-price2"> <?php $subprijs = $prijsgrim * $quantity; print($subprijs);?></div>
                </div>
            </li>
            <li>
                <div class="product1" style="clear:both">
                    <div class="product-image">
                        <img src= https://banner2.kisspng.com/20180613/gpo/kisspng-fortnite-battle-royale-minecraft-battle-royale-gam-fortnite-skins-5b20aced2df673.8941036815288680771883.jpg class="grim">
                    </div>
                    <div class="product-details">
                        <div class="product-title"> productnaam </div>
                        <p class="product-description"> beschrijving </p>
                    </div>
                    <div class="product-price"><?php $prijsgrim = 12.99; print($prijsgrim); ?></div>
                    <div class="product-quantity">
                        <input type="number" value="<?php print($quantity);?>" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">
                            Remove
                        </button>
                    </div>
                    <div class="product-line-price2"> <?php $subprijs = $prijsgrim * $quantity; print($subprijs);?></div>
                </div>
            </li>
            <li>
                <div class="product1" style="clear:both">
                    <div class="product-image">
                        <img src= https://banner2.kisspng.com/20180613/gpo/kisspng-fortnite-battle-royale-minecraft-battle-royale-gam-fortnite-skins-5b20aced2df673.8941036815288680771883.jpg class="grim">
                    </div>
                    <div class="product-details">
                        <div class="product-title"> productnaam </div>
                        <p class="product-description"> beschrijving </p>
                    </div>
                    <div class="product-price"><?php $prijsgrim = 12.99; print($prijsgrim); ?></div>
                    <div class="product-quantity">
                        <input type="number" value="<?php print($quantity);?>" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">
                            Remove
                        </button>
                    </div>
                    <div class="product-line-price2"> <?php $subprijs = $prijsgrim * $quantity; print($subprijs);?></div>
                </div>
            </li>

                <div class="totalprice" style = "clear:both:">

                    <label> subtotal </label>
                    <div class = "subtotal-values" id = "cart-total" > $74 </div>

                   <label> Tax </label>
                    <div class = "subtotal-values" id = "cart-total" > 100% </div>

                   <label> Shipping </label>
                    <div class = "subtotal-values" id = "cart-total" > free </div>

                    <label> TOTAL </label>
                    <div class = "subtotal-values" id = "cart-total" > $500 </div>


                </div>

            </li>
            <li>
                <a href="#" class="myButton">order now!</a>
            </li>
        </ul>
    </div>





<!--    <div class="product">-->
<!--        <div class="product-image">-->
<!--            <img src= https://upload.wikimedia.org/wikipedia/commons/9/92/The_death.png >-->
<!--        </div>-->
<!--        <div class="product-details">-->
<!--            <div class="product-title"> productnaam </div>-->
<!--            <p class="product-description"> beschrijving </p>-->
<!--        </div>-->
<!--        <div class="product-price">12.99</div>-->
<!--        <div class="product-quantity">-->
<!--            <input type="number" value="2" min="1">-->
<!--        </div>-->
<!--        <div class="product-removal">-->
<!--            <button class="remove-product">-->
<!--                Remove-->
<!--            </button>-->
<!--        </div>-->
<!--        <div class="product-line-price2">25.98</div>-->
<!--    </div>-->




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






    </body>
</html>