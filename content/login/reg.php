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
    <title>Регистрация</title>
</head>

<body>
    <div class="container">
        <div class="login" style="height: 95vh">
            <div class="row">
                <div class="log col-5">
                    <h2 class="enter__text">Зарегистрируйтесь в UNION</h2><br>
                    <form action="./control/check_reg.php" method="POST">
                        <label for="email" class="email__text">Имя пользователя</label>
                        <input type="email" name="email" placeholder="Введите Email" class="form-control" style="height: 50px">
                        <div class="text-danger"><?= $_SESSION['error_email_reg'] ?></div><br>
                        <input type="name" name="username" placeholder="Введите Имя и Фамилию" class="form-control" style="height: 50px">
                        <div class="text-danger"><?= $_SESSION['error_username_reg'] ?></div><br>
                        <label for="pass" class="email__text">Придумайте пароль</label>
                        <input type="password" name="password" placeholder="Введите пароль" class="form-control" style="height: 50px">
                        <!-- Полоска сложности пароля -->
                        <div class="block_check"></div>
                        <br>
                        <p>
                            Ваш новый пароль должен содержать не менее 8 символов.
                            Можете использовать эти пункиы для усложнения пароля: <br>
                             <ul>
                                 <li>хотя бы одну заглавную букву</li>
                                 <li>хотя бы одну строчную букву</li>
                                 <li>цифру или число </li>
                                 <li>Один из этих специальных символов: ! $ % ^ & * @ # ? + - </li>
                             </ul>
                        </p>
                        <div class="text-danger"><?= $_SESSION['error_password_reg'] ?></div><br>
                        <input type="password" name="passwordrepeat" placeholder="Повторите пароль" class="form-control" style="height: 50px">
                        <div class="text-danger"><?= $_SESSION['error_password_reg2'] ?></div><br>
                        <div class="text-danger"><?= $_SESSION['error'] ?></div><br>
                        <button type="submit" class="btn btn-primary">Зарегистрироваться</button><br><br>
                        <p style="font-size: 15px;">Больше информации можно найти в разделе <a href="../license/help.php" style="text-decoration: none">помощь</a></p>
                    </form>
                </div>
                <div class="col-5 log" style="margin-left: 50px">
                    <h2 class="enter__text">Уже есть аккаунт UNION?</h2><br>
                    <p class="description">Если вы уже создавали аккаунт UNION, то можете воспользоваться им</p>
                    <a href="./login-start.php" class="btn btn-primary">Войти</a><br><br><br><br>
                    <h2 class="enter__text">Вход для сотрудников</h2><br>
                    <a href="./admin-reg.php" class="btn btn-primary btnn">Войти</a>
                    <a href="../../index.php" style="position:relative; top: 380px; left: 230px" class="btn btn-outline-danger">Назад</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../../js/modules/check-pass.js"></script>
</body>

</html>