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

<body>
    <div class="container">
        <div class="login-admin">
            <div class="row">
                <div class="log col-5">
                    <h2 class="enter__text">Войдите в аккаунт администратора</h2><br>
                    <form action="./control/check-admin.php" method="POST">
                        <label class="email__text">Имя пользователя</label>
                        <input type="name" name="admin" placeholder="Логин" class="form-control" style="height: 50px">
                        <div class="text-danger"><?= $_SESSION['error_email'] ?></div><br>
                        <label for="password" class="email__text">Пароль</label>
                        <input type="password" name="password" placeholder="Пароль" class="form-control" style="height: 50px"><br>
                        <button type="submit" class="btn btn-primary">Войти</button><br><br>
                    </form>
                </div>
                <div class="col-5 log" style="margin-left: 50px; padding-bottom: 100px">
                    <h2 class="enter__text">Новичок в UNION?</h2><br>
                    <p class="description">Планируете ли вы обучение в UNION, используете бесплатные материалы UnionWorld
                        или заинтересованы в улучшении вашего региона, с помощью учетной записи это
                        можно сделать очень быстро. </p><br>
                    <a href="./reg.php" class="btn btn-primary">Создать аккаунт</a><br><br><br><br>
                    <h2 class="enter__text">У вас уже есть аккаунт?</h2><br>
                    <a href="./login-start.php" class="btn btn-primary btnn">Войти</a>

                </div>
            </div>
        </div>
    </div>
</body>

</html>