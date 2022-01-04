<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <?php session_start() ?>
    <title>Вход</title>
</head>

<?php

    include '../data/config.php'; 

    $userID = $_COOKIE['userID'];
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $count = $mysql->query("SELECT `try` FROM `TryToLogin` WHERE `userID` = '$userID'");

    $counts = $count->fetch_assoc(); 

    if ($counts['try'] == 3) {
        $_SESSION['login_btn-off'] = "<button type='submit' class='btn btn-primary login-btn' disabled  style='display: block'>Войти</button>";
        $_SESSION['login_btn'] = "<button type='submit' class='btn btn-primary login-btn' style='display: none'>Войти</button>";
        ?> 
        
        <div class="container">
            <form action='./control/check-capcha.php' class="cap-form" method='POST'>
                <div class='cap'>
                    <h4 style="color: #2b6add; font-weight: 500; margin-bottom: 20px; padding-top: 8px">Для получения новых попыток необходимо ввести капчу</h4>
                        <div class='cap-sec'>
                            <img class='img-cap' src='./control/captcha.php' />
                            <input autocomplete="off" class='form-control' style="width: 450px; margin-left: 20px" type='text' name='kapcha' />
                        </div>
                    <button class='btn btn-primary confirm' type='submit'>Подтвердить</button>
                </div>
            </form>
        </div>
        <?php
        
      
    } else {
        $_SESSION['login_btn-off'] = "<button type='submit' class='btn btn-primary login-btn' disabled style='display: none'>Войти</button>";
        $_SESSION['login_btn'] = "<button type='submit' class='btn btn-primary login-btn' style='display: block'>Войти</button>";
    }
?>

<body class="body">
    <div class="container">
        <div class="login">
            <div class="row">
                <div class="log col-5">
                    <h2 class="enter__text">Войдите в аккаунт</h2><br>
                    <form action="./control/check_login.php" method="POST" class="form">
                        <label class="email__text">Имя пользователя</label>
                        <input type="email" name="email" placeholder="Введите Email" class="form-control" style="height: 50px">
                        <div class="text-danger"><?= $_SESSION['error_email'] ?></div><br>
                        <p class="description">
                            Ваше имя пользователя является одним из: <br>
                            Адрес электронной почты,
                            с помощью которой вы зарегистрировались
                            <br><br>
                            Имя пользователя компьютера UNION, например, ab123.
                            <br><br>
                            Если вы студент UNION, адрес электронной почты,
                            который UNION использует для связи с вами.
                            <br><br>
                            Обратите внимание, что вы не можете использовать
                            свой личный идентификатор, например, A1234567. 
                        </p>
 
                        <br>
                        <label for="email" class="email__text">Пароль</label>
                        <input type="password" name="password" placeholder="Введите пароль" class="form-control" style="height: 50px"><br>
                        <a href="#" class="reset__pass">Вы можете сбросить пароль здесь</a><br><br>
                        <!-- Кнопка входа -->
                        <div class="text-danger"><?= $_SESSION['login_btn-off'] ?></div>
                        <div class="text-danger"><?= $_SESSION['login_btn'] ?></div><br>
                        <!-- Сколько попыток осталось -->
                        <div class="text-danger count"><?= $_SESSION['error_count'] ?></div><br>
                        <p style="font-size: 15px;">Больше информации можно найти в разделе <a href="../license/help.php" style="text-decoration: none">помощь</a></p>

                    </form>
                </div>
                <div class="col-5 log" style="margin-left: 50px">
                    <h2 class="enter__text">Новичок в UNION?</h2><br>
                    <p class="description">Планируете ли вы обучение в UNION, используете бесплатные материалы UnionWorld
                        или заинтересованы в улучшении вашего региона, с помощью учетной записи это
                        можно сделать очень быстро. </p><br>
                    <a href="./reg.php" class="btn btn-primary">Создать аккаунт</a><br><br><br><br>
                    <h2 class="enter__text">Вход для сотрудников</h2><br>
                    <a href="./admin-reg.php" class="btn btn-primary btnn">Войти</a> 

                    <h2 class="enter__text" style="margin-top: 40px">UNION Shop</h2><br>
                    <?php if ($_SESSION['email'] == "") : ?>
                        <a href="../shop/start-page/start-page.html" class="btn btn-primary btnn">Перейти</a>
                    <?php else : ?>
                        <a href="../shop/start-page/start-page.html" class="btn btn-primary btnn">Перейти</a>
                    <?php endif; ?>

                    <a href="../../index.php" style="position:relative; top: 120px; left: 230px" class="btn btn-outline-danger">Назад</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>