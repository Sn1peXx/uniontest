<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../personal-cabinet/personal.css">
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="./setting.css">
    <link rel="stylesheet" href="../../../assets/css/search.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/not-login.css">
    <?php session_start() ?>
    <title>Смена пароля</title>
</head> 

<body>
<?php if ($_SESSION['email'] == "") : ?>
    <div class="error-main">
        <div class="error-page">
            <h1>Oops</h1>
            <br>
            <p>Похоже вы не в аккаунте. <a href="../../login/login-start.php" style='color: #d6d6d6'>Исправить это</a> </p>
        </div>
    </div>
    <?php else : ?>
        
        <?php 
        include '../../data/config.php';
        
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysql->query("SET NAMES 'utf8'");

        if ($mysql->connect_error) {
            echo "Error number " . $mysql->connect_error . '<br>';
            echo 'Error ошибка при загрузку Базы Данных';
        } else {
            $x = $_SESSION['email'];
            $result = $mysql->query("SELECT * FROM `registration` WHERE `email` = '$x'");
            
    ?>

<div class="container" style="margin-top: 10px;">
        <a href="../../../index.php">
            <img src="../../../assets/img/logo/logo_top.png" class="logo" width="100px" alt="">
        </a>

        <div class="search">
      <form class=" col-2 d-flex">
        <div class="search-panel">
          <input class="form-control me-2 search__control" type="search" placeholder="Поиск" aria-label="Search">
            <ul class="search__help"> 
              <li><a href="../../../index.php" class="search__link">Главная</a></li>
              <li><a href="../../personal-cabinet/personal-cabinet.php" class="search__link">UnionHome</a></li>
              <li><a href="../../personal-cabinet/personal-cabinet.php" class="search__link">Личный кабинет</a></li>
              <li><a href="../../profile/my-prfile.php" class="search__link">Профиль</a></li>
              <li><a href="../../profile/records.php" class="search__link">Учебные записи</a></li>
              <li><a href="../../profile/profile-add/contact.php" class="search__link">Контактные детали</a></li>
              <li><a href="../../profile/profile-add/personal-information.php" class="search__link">Мотивы членства UNION</a></li>
              <li><a href="../../profile/profile-add/your__personality.php" class="search__link">Ваша личность</a></li>
              <li><a href="../../profile/setting/change-password.php" class="search__link">Изменить пароль</a></li>
              <li><a href="../profile/setting/change-mail.php" class="search__link">Измененить адрес электронной почты</a></li>
              <li><a href="../../profile/setting/change-personal-info.php" class="search__link">Редактировать личные данные</a></li>
              <li><a href="../../profile/setting/change-personal-info.php" class="search__link">Личный профиль</a></li>
              <li><a href="../../lessons/lesson-main.php" class="search__link">Обучение</a></li>
              <li><a href="../../lessons/lesson-main.php" class="search__link">CourseHome</a></li>
              <li><a href="" class="search__link">Аттестация</a></li>
              <li><a href="../../event/event.php" class="search__link">Мероприятия</a></li>
              <li><a href="../../forum/forum.php" class="search__link">Форум</a></li>
              <li><a href="../../forum/add-content/more-info.html" class="search__link">Общение в Интернете</a></li>
              <li><a href="../../forum/add-content/more-info.html" class="search__link">Как работают форумы</a></li>
              <li><a href="../../license/career.php" class="search__link">Карьера</a></li>
              <li><a href="../../community/community.php" class="search__link">Сообщество</a></li>
              <li><a href="../../license/help.php" class="search__link">Помощь</a></li>
              <li><a href="../../license/support/system.php" class="search__link">Состояние системы</a></li>
              <li><a href="../../license/availability.html" class="search__link">Доступность</a></li>
              <li><a href="../../license/terms-of-use.html" class="search__link">Условия использования</a></li>
              <li><a href="../../license/copyright.html" class="search__link">Авторские права</a></li>
              <li><a href="../../license/cookies.html" class="search__link">Конфиденциальность и cookie</a></li>
              <li><a href="../../license/student-association.html" class="search__link">Студенческий устав</a></li>
              <li><a href="../../license/tutoe.php" class="search__link">Ваш тьютор</a></li>
              <li><a href="../../license/your-profile.html" class="search__link">Ваш профиль в сети UNION</a></li>
              <li><a href="../../license/advancement.html" class="search__link">Продвижение в учебе</a></li>
              <li><a href="../../license/help-items/new-student.html" class="search__link">Новоприбывшим в UNION</a></li>
              <li><a href="../../license/help-items/new-student.html" class="search__link">Новичок</a></li>
              <li><a href="../../license/support.html" class="search__link">Служба поддержки студентов</a></li>
              <li><a href="" class="search__link"></a></li>
            </ul>
        </div>
      </form>
    </div>

        <nav class="nav">
            <a href="../../personal-cabinet/personal-cabinet.php" class="nav__link">UnionHome</a>
            <a href="../my-prfile.php" class="nav__link active__nav">Профиль</a>
            <a href="../../lessons/lesson-main.php" class="nav__link">Обучение</a>
            <a href="#" class="nav__link">Библиотека</a>
            <a href="../../license/career.php" target="_blank" class="nav__link">Карьера</a>
            <a href="../../community/community.php" class="nav__link">Сообщество</a>
            <a href="../../license/help.php" class="nav__link">Помощь</a>
        </nav>
    </div>

    <section style='margin-top: 40px;'>
        <div class="container">
            <div class="row">
                <h1 class="password__name">Смена пароля</h1>
                <div><?= $_SESSION['success'] ?></div>
                <form action="./check-setting/check-password.php" method="POST">
                <div class="col-10">
                    <div class="password__block">
                        <div class="current__password col-6">
                            <label for="exampleFormControlInput1" class="form-label">Действующий пароль</label>
                            <input type="password" class="form-control" name="current-password">
                            <div class="text-danger"><?= $_SESSION['error_current'] ?></div><br>
                        </div>
                        <p style="margin-left: 20px;">
                            Ваш новый пароль должен содержать не менее 8 символов.
                            Он должен включать три пункта из перечисленного: <br>
                             <ul style="margin-left: 20px;">
                                 <li>хотя бы одну заглавную букву</li>
                                 <li>хотя бы одну строчную букву</li>
                                 <li>цифру или число </li>
                                 <li>Один из этих специальных символов: ! $ % ^ & * [ ] @ # ? + - </li>
                             </ul>
                        </p>
                        <div class="new__password col-6">
                            <label for="exampleFormControlInput1" class="form-label">Новый пароль</label>
                            <input type="password" class="form-control" name="new-password">
                            <div class="block_check"></div>
                        </div>
                        <div class="new__password col-6">
                            <label for="exampleFormControlInput1" class="form-label">Повторите новый пароль</label>
                            <input type="password" class="form-control" name="repeat-password">
                            <div class="text-danger"><?=$_SESSION['error_repeat'] ?></div>
                            <div class="text-danger"><?=$_SESSION['error'] ?></div>
                        </div>
                        <button type="submit" style="margin-left: 20px;" class="btn btn-primary btn-send my-3">Сохранить</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </section>

    <?php   
        }
            $mysql->close();
    ?>

    <?php require '../../blocks/footer/footer-far.php' ?>
    
    <script src="../../../js/modules/check-pass.js"></script>
    <script src="../../../js/modules/search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>


    <?php endif; ?>

    
</body>

</html>