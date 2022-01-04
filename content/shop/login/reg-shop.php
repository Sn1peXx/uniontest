<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login-shop.css">
    <link rel="stylesheet" href="../start-page/shop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Регистрация</title>
    <?php session_start() ?>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top: 15px;">
            <div class="col-2 account">
                <a href="#">
                    <img src="../../../assets/img/shop-img/account_circle_black_24dp (1).svg" width="40px" alt="">
                </a>
            </div>
            <div class="col-8" style="text-align: center;">
                <img src="../../../assets/img/logo/logo_top.png" width="130px" alt="">
            </div>
            <div class="col-2 cart">
                <a href="../start-page/cart.html" class="cart_img">
                    <img style="margin-left: -30px !important" src="../../../assets/img/shop-img/shopping_cart_black_18dp.svg" width="40px" alt="">
                </a>
            </div>
        </div>
        <br>
        <hr>

        <h1 class="login_title">Create account</h1> 
        <form action="./check-shop/check_reg.php" method="POST">
            <div class="login_inputs">
                <input type="name" name="username" placeholder="First name / Last name" class="login_form_reg" style="height: 50px"><br>
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error_username_reg'] ?></div>
                <input type="email" name="email" placeholder=" Email" class="login_form_reg" style="height: 50px"><br>
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error_email_reg'] ?></div>
                <input type="password" name="password" placeholder=" Password" class="login_form_reg" style="height: 50px"><br>
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error_password_reg'] ?></div>
                <input type="password" name="passwordrepeat" placeholder=" Repeat password" class="login_form_reg" style="height: 50px">
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error_password_reg2'] ?></div>
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error'] ?></div>
                <div class="login_adds">
                </div>
                <button class='login_signin' type="submit" style="margin-top: 25px !important">Create</button><br><br>
                <a class="login_link" href="../start-page/start-page.html">Return to store</a>
            </div>
        </form>
        
    </div>
</body>

</html>