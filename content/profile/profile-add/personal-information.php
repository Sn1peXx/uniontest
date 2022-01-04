<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../personal-cabinet/personal.css">
    <link rel="stylesheet" href="../profile.css">
    <link rel="stylesheet" href="./info.css">
    <link rel="stylesheet" href="../../../assets/css/search.css">
    <link rel="stylesheet" href="../../../assets/css/not-login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <?php session_start() ?>
    <title>Ваша нынешняя профессия и мотивы членства UNION</title>
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
    function printResults($result, $let)
    {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo $row[$let];
            }
        }
    }

    include '../../data/config.php';

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysql->query("SET NAMES 'utf8'");

    if ($mysql->connect_error) {
        echo "Error number " . $mysql->connect_errno . '<br>';
        echo 'Error ошибка при загрузку Базы Данных';
    } else {
        $x = $_SESSION['email'];
        $result = $mysql->query("SELECT * FROM `profInformation` WHERE `email` = '$x'");
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

    <section class="profile">
        <div class="container">
            <div class="row">
                <div class="col-10">
                    <div class="my__profile">
                        <h1 class="profile__title">Ваша нынешняя профессия и мотивы членства UNION</h1>
                        <div class="profile__main">
                            <?php 
                                $vouchers = mysqli_fetch_array($result);
                            ?>
                            <div class="profile__item row">
                                <div class="personal__question col-4">
                                    <div class="personal__text">Статус занятости</div>
                                </div>
                                <div class="personal__answer col-8">
                                    <div class="personal__answ"><?php echo $vouchers['status'] ? $vouchers['status'] : "В информации отказано" ?></div>
                                </div>
                            </div>

                            <div class="profile__item row gray">
                                <div class="personal__question col-4">
                                    <div class="personal__text">Тип занятости</div>
                                </div>
                                <div class="personal__answer col-8">
                                    <div class="personal__answ"><?php echo $vouchers['types'] ? $vouchers['types'] : "Пожалуйста, заполните" ?></div>
                                </div>
                            </div>

                            <div class="profile__item row">
                                <div class="personal__question col-4">
                                    <div class="personal__text">Название профессии</div>
                                </div>
                                <div class="personal__answer col-8">
                                    <div class="personal__answ"><?php echo $vouchers['prof'] ? $vouchers['prof'] : "Пожалуйста, заполните" ?></div>
                                </div>
                            </div>

                            <div class="profile__item row gray">
                                <div class="personal__question col-4">
                                    <div class="personal__text">Мотивация к учебе</div>
                                </div>
                                <div class="personal__answer col-8">
                                    <div class="personal__answ"><?php echo $vouchers['study'] ? $vouchers['study'] : "Пожалуйста, заполните" ?></div>
                                </div>
                            </div>

                            <div class="profile__item row">
                                <div class="personal__question col-4">
                                    <div class="personal__text">Мотивация членства UNION</div>
                                </div>
                                <div class="personal__answer col-8">
                                    <div class="personal__answ"><?php echo $vouchers['member'] ? $vouchers['member'] : "Пожалуйста, заполните" ?></div>
                                </div>
                            </div>
                            <div class="change">
                                <a class="change__text" href="./answers-prof.php">Редактировать</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <img src="../../assets/img/license/CV9bG9VWsAQ9epE.jpg" width="220px" height="390px" alt=""
                        class="add">
                </div>
            </div>
        </div>
    </section>

    <?php   
        }
            $mysql->close();
    ?>

   <?php require '../../blocks/footer/footer-far.php' ?>


    <script src="../../../js/modules/search.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

</body>

<?php endif; ?>

</html>