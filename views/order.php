<?php

$stmt = $conn->prepare("SELECT first_name, initials, last_name, email, zip, address, city, country, phone FROM accounts WHERE account_id = :id");

$stmt->bindParam(":id", $_SESSION["loggedUser"]);

if($stmt->execute()) {
    $result = $stmt->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php

        include "inc/parts/head.php";

        ?>
        <link rel="stylesheet" href="inc/css/order.css">
    </head>
    <body>
        <?php

        include "inc/parts/menu.php";

        ?>
        <div class="container order-container">
            <div class="row">
                <div class="col-lg-8">
                    <form action="order.php" method="post">
                        <?php

                        if(isset($_SESSION["loggedUser"]) && !empty($_SESSION["loggedUser"])) {
                            echo '<div class="form-row">
                            <div class="form-group col-lg-4">
                                <label for="firstNameInput">First name</label>
                                <input value="' . $result["first_name"] . '" name="firstName" type="text" class="form-control" id="firstNameInput">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="initialInput">Initials</label>
                                <input value="' . $result["initials"] . '" name="initials" type="text" class="form-control" id="initialInput">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="lastNameInput">Last name</label>
                                <input value="' . $result["last_name"] . '" name="lastName" type="text" class="form-control" id="lastNameInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">E-mail</label>
                            <input value="' . $result["email"] . '" name="email" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <label for="postalInput">Zip code</label>
                                <input value="' . $result["zip"] . '" name="postal" type="text" class="form-control" id="postalInput">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="houseInput">Address</label>
                                <input value="' . $result["address"] . '" name="address" type="text" class="form-control" id="houseInput">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cityInput">City</label>
                                <input value="' . $result["city"] . '" name="city" type="text" class="form-control" id="cityInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="countryInput">Country</label>
                            <input value="' . $result["country"] . '" name="country" type="text" id="countryInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phoneInput">Phone</label>
                            <input value="0' . $result["phone"] . '" name="phone" type="tel" id="phoneInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="termsCheck">
                                <label class="form-check-label" for="termsCheck">
                                    I have read, understood and accept the General Terms and Conditions relevant to e-commerce.
                                </label>
                            </div>
                        </div>';
                        } else {
                            echo '<div class="form-row">
                            <div class="form-group col-lg-4">
                                <label for="firstNameInput">First name</label>
                                <input name="firstName" type="text" class="form-control" id="firstNameInput">
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="initialInput">Initials</label>
                                <input name="initials" type="text" class="form-control" id="initialInput">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="lastNameInput">Last name</label>
                                <input name="lastName" type="text" class="form-control" id="lastNameInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailInput">E-mail</label>
                            <input name="email" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">We\'ll never share your email with anyone else.</small>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-3">
                                <label for="postalInput">Zip code</label>
                                <input name="postal" type="text" class="form-control" id="postalInput">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="houseInput">House number</label>
                                <input name="houseNumber" type="text" class="form-control" id="houseInput">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="cityInput">City</label>
                                <input name="city" type="text" class="form-control" id="cityInput">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="countryInput">Country</label>
                            <input name="country" type="text" id="countryInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phoneInput">Phone</label>
                            <input name="phone" type="tel" id="phoneInput" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="termsCheck">
                                <label class="form-check-label" for="termsCheck">
                                    I have read, understood and accept the General Terms and Conditions relevant to e-commerce.
                                </label>
                            </div>
                        </div>';
                        }
                        ?>
                        <input value="Checkout" type="submit" class="btn btn-primary">
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="summary-container">
                        <h1>Summary</h1>
                        <ul>
                            <li>
                                <p>Shipping<span>€ 135</span></p>
                            </li>
                            <li>
                                <p>Tax<span>€ 135</span></p>
                            </li>
                            <li>
                                <p>Total<span><?php print("€ " . $total);?></span></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <?php

        include "inc/parts/footer.php";

        ?>
    </body>
</html>