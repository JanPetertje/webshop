<?Php

?>

<body>
<div class="menu">
    <div class="menu-content">
        <a href="index.php">
            <h1><span>Wide</span> <span>World</span> Importers</h1>
        </a>
        <ul>
            <li>
                <form method="get" action="searchresults.php">
               <input type="text" name="search_input">
                </form>
            </li>
            <li>

                <?php
                //-----If session loggedUser is filled with a value the login will change to logout---
                if(isset($_SESSION["loggedUser"])) {
                  $user_id = $_SESSION["loggedUser"];
                  echo '<a class="loginLink" href="logout.php">Logout</a>';
                } else {
                    echo '<a class="loginLink" href="login.php">Login</a>';
                }
                ?>
            </li>
            <li>
                <a href="shoppingcart.php">
                    <img src="img/shopping-cart.png" alt="shopping-cart">
                </a>
            </li>
        </ul>
    </div>
</div>
</body>