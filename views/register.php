<!doctype html>
<html lang="en">
    <head>
        <?php

        include "inc/parts/head.php";

        ?>
        <link rel="stylesheet" href="inc/css/register.css">
    </head>
    <body>
    <?php

    include "inc/parts/menu.php";

    ?>
    <div class="container register-container">
        <div class="row">
            <div class="col-lg-12">
                <form action="register.php" method="post">
                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="firstNameInput">First name</label>
                            <input name="first_name" type="text" class="form-control" id="firstNameInput">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="initialInput">Initials</label>
                            <input name="initials" type="text" class="form-control" id="initialInput">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="lastNameInput">Last name</label>
                            <input name="last_name" type="text" class="form-control" id="lastNameInput">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="emailInput">E-mail</label>
                        <input name="email" type="email" class="form-control" id="emailInput" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="phoneInput">Phone</label>
                        <input name="phone" type="tel" class="form-control" id="phoneInput">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-6">
                            <label for="passwordInput">Password</label>
                            <input name="password" type="password" class="form-control" id="passwordInput">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="confirmPasswordInput">Confirm password</label>
                            <input name="confirmPassword" type="password" class="form-control" id="confirmPasswordInput">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-lg-3">
                            <label for="postalInput">Zip code</label>
                            <input name="zip" type="text" class="form-control" id="postalInput">
                        </div>
                        <div class="form-group col-lg-3">
                            <label for="addressInput">Address</label>
                            <input name="address" type="text" class="form-control" id="addressInput">
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="termsCheck">
                            <label class="form-check-label" for="termsCheck">
                                I have read, understood and accept the General Terms and Conditions relevant to e-commerce.
                            </label>
                        </div>
                    </div>
                    <input name="register" value="Checkout" type="submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
    </body>


</html>
