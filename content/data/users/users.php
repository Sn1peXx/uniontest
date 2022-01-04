<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../personal-cabinet/personal.css">
    <link rel="stylesheet" href="../data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Админ панель</title>
    <?php session_start(); ?> 
</head>


<body>

    <?php if (!$_SESSION['admin']) : ?>
        <p>Доступ только для администратора</p>
    <?php else : ?>
 
        <?php

        include '../config.php';

        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $mysql->query("SET NAMES 'utf8'");
        if ($mysql->connect_error) {
            echo "Error number " . $mysql->connect_errno . '<br>';
            echo 'Error ошибка при загрузку Базы Данных';
        } else {
            $x = $_COOKIE['email'];
            $result = $mysql->query("SELECT * FROM `registration` WHERE `Id` > 1");

        ?>

            <header class="logo__fixed">
                <div class="headers">
                    <div class="container">
                        <div class="logo__block">
                            <a href="../../../index.php" class="img">
                                <img src="../../../assets/img/logo/logo__main.png" alt="" width="230px" class="logos">
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <a href="./change-data/change-data.php" class="btn btn-outline-secondary change">Редактировать</a>

            <div style="margin-top: 60px"></div>
            <div class="row mt-3">
                <div class="col-1"></div>
                <div class="col-1" style="font-weight: 700">ID</div>
                <div class="col-3" style="font-weight: 700">Имя</div>
                <div class="col-3" style="font-weight: 700">Почта</div>
                <div class="col-2" style="font-weight: 700">Блокировка</div>
            </div>

            <?php
            while ($vouchers = mysqli_fetch_assoc($result)) {
            ?>
                <div class="row mt-4 d-flex table">
                    <div class="col-1"></div>
                    <div class="col-1"> <?php echo $vouchers['Id']; ?> </div>
                    <div class="col-3"> <?php echo $vouchers['name']; ?> </div>
                    <div class="col-3"> <?php echo $vouchers['email']; ?> </div>
                    <div class="col-2"> <?php 
                     if ($vouchers['banned'] == 0) {
                         echo "Не заблокирован";
                     } else {
                        echo "Заблокирован";
                     }
                     ?> </div>
                </div>

            <?php } ?>

        <?php
        }
        $mysql->close();
        ?>

    <?php endif; ?>


</body>

</html>