<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./support.css">
    <link rel="stylesheet" href="../../personal-cabinet/personal.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/not-login.css">
    <title>Служба поддержки UNION</title>
    <?php session_start() ?>
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
    <header class="header"></header>

   <div class="nav_support">
    <nav class="nav">
        <a href="../../personal-cabinet/personal-cabinet.php" class="nav__link active__nav">UnionHome</a>
        <a href="../../profile/my-prfile.php" class="nav__link">Профиль</a>
        <a href="../../lessons/lesson-main.php" class="nav__link">Обучение</a>
        <a href="../../blocks/librar/library.php" target="_blank" class="nav__link">Библиотека</a>
        <a href="../../license/career.php" target="_blank" class="nav__link">Карьера</a>
        <a href="../../community/community.php" class="nav__link">Сообщество</a>
        <a href="../../license/help.php" class="nav__link">Помощь</a>
    </nav>
   </div>
   <main class="main">
       <div class="support_img">
            <div class="support_center">
                <h1 class="support_title">Служба поддержки UNION</h1>
                <form class="d-flex search">
                    <div class="search-panel">
                        <input class="form-control me-2 search__control" type="search" placeholder="Поиск по ресурсам службы поддержки" aria-label="Search">
                        <?php if ($_SESSION['email'] == "") : ?>
                            <ul class="search__help">
                                <p>Для поиска на сайте необходимо зарегистрироваться</p>
                            </ul>
                        <?php else : ?>
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
                                <li><a href="../../profile/setting/change-mail.php" class="search__link">Измененить адрес электронной почты</a></li>
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
                                <li><a href="../../license/tutoe.html" class="search__link">Ваш тьютор</a></li>
                                <li><a href="../../license/your-profile.html" class="search__link">Ваш профиль в сети UNION</a></li>
                                <li><a href="../../license/advancement.html" class="search__link">Продвижение в учебе</a></li>
                                <li><a href="../../license/help-items/new-student.html" class="search__link">Новоприбывшим в UNION</a></li>
                                <li><a href="../../license/help-items/new-student.html" class="search__link">Новичок</a></li>
                                <li><a href="../../license/support.html" class="search__link">Служба поддержки студентов</a></li>
                        </ul>
                        <?php endif; ?>
                        
                    </div>
                </form>
            </div>
       </div>
   </main>
   <footer class="footer">
       <div class="footer_center">
           <a class="footer_link" target="_blank" href="https://t.me/union_universe">
               <img class="footer_img" width="50px" src="../../../assets/img/license/social/telegram.png" alt="telegram">
           </a>
           <a class="footer_link" target="_blank" href="#">
            <img class="footer_img" width="50px" src="../../../assets/img/license/social/contact-book.png" alt="contact">
            </a>
            <a class="footer_link" target="_blank" href="#">
                <img class="footer_img" width="50px" src="../../../assets/img/license/social/email.png" alt="email">
            </a>
            <a class="footer_link" target="_blank" href="https://www.instagram.com/the.union.universe/">
                <img class="footer_img" width="50px" src="../../../assets/img/license/social/instagram.png" alt="instagram">
            </a>
            <a class="footer_link" target="_blank" href="https://vk.com/public205861322">
                <img class="footer_img" width="55px" src="../../../assets/img/license/social/vk.png" alt="vk">
            </a>
       </div>
   </footer>
   <script src="../../../js/modules/search.js"></script>
   <?php endif; ?>
</body>
</html>