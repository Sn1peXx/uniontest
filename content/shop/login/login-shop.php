<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../start-page/shop.css">
    <link rel="stylesheet" href="./login-shop.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Вход в аккаунт</title>
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
                <a href="./cart.html">
                    <img src="../../../assets/img/shop-img/shopping_cart_black_18dp.svg" width="40px" alt="">
                </a>
            </div>
        </div>
        <br>   
        <hr>    
        <h1 class="login_title">Login</h1> 
        <form action="./check-shop/check_login.php" method="POST">
            <div class="login_inputs">
                <input type="email" name="email" placeholder=" Email" class="login_form" style="height: 50px"><br>
                <input type="password" name="password" placeholder=" Password" class="login_form" style="height: 50px">
                <div class="text-danger" style="color: black !important"><?= $_SESSION['error_count-shop'] ?></div>
                <div class="login_add">
                    <a href="#" class="login_forgot login_link">Forgot your<br>passwords?</a>
                    <a href="./reg-shop.php" class="login_create login_link">Create account</a>
                </div>
                <button class='login_signin'>Sign in</button>
            </div>
        </form>

    </div>
</body>
</html>