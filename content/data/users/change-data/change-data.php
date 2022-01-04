<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../personal-cabinet/personal.css">
    <link rel="stylesheet" href="../../data.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Админ панель</title>
    <?php session_start(); ?> 
</head> 


<body>

    <?php if (!$_SESSION['admin']) : ?>
       <p>Вход только для администратора</p>
    <?php else : ?>

        <?php

        session_start();

        include '../../config.php';

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
                            <div class="img">
                                <img src="../../../../assets/img/logo/logo__main.png" alt="" width="230px" class="logos">
                            </div>
                        </div>
                    </div>
                </div>
            </header>

           <div class="header_admin">
               <div class="admin_block">
                    <form action="./block-user.php" method='POST'>
                        <p>Введите email человека, которого необходимо заблокировать / разблокировать</p>
                        <input type="email" class="form-control inputs" name="blockName">
                        <button type="submit" class="btn btn-danger btn-send my-3">Подтвердить</button>
                    </form>
               </div>
           </div>
        <?php
        }
        $mysql->close();
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>


    <?php endif; ?>

</body>

</html>