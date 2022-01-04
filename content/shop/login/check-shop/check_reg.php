<?php

    session_start();

    include '../../../data/config.php';

    function back()
    {
        header('Location: ../reg-shop.php');
        exit();
    }

    function unsetData()
    {
        unset($_SESSION['error_username_reg']);
        unset($_SESSION['error_email_reg']);
        unset($_SESSION['error_password_reg']);
        unset($_SESSION['error']);

    }

    unsetData();

    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $passrepeat = filter_var(trim($_POST['passwordrepeat']), FILTER_SANITIZE_STRING);

    if (mb_strlen($username && $email && $pass) == 0) {
        $_SESSION['error'] = "Все поля должны быть заполнены";
        back();
    } else if (mb_strlen($username) <= 1) {
        $_SESSION['error_username_reg'] = "В имени пользователя должно быть больше 1 симовола";
        back();
    } else if (mb_strlen($email) <= 7) {
        $_SESSION['error_email_reg'] =  "Недопустимая длина email";
        back();
    } else if (mb_strlen($pass) < 8) {
        $_SESSION['error_password_reg'] = "Пароль должен состоять минимум из 8 симовлов";
        back();
    }

    $pass = md5($pass);
    $passrepeat = md5($passrepeat); 
    $hash = md5($username . time());

    // Переменная $headers нужна для Email заголовка
    $headers = "From: mail@example.com\r\n";
    $headers .= "Reply-to: $email\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    
    // Сообщение для email
    $message = '
                <html>
                <head>
                <title>Подтвердите Email</title>
                </head>
                <body>
                <p>Что бы подтвердить Email, перейдите по <a href="http://example.com/confirme-mail.php?hash=' . $hash . '">ссылка</a></p>
                </body>
                </html>
                ';

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $result = $mysql->query("SELECT * FROM `registration` WHERE `email` = '$email'");

    $user = $result->fetch_assoc();

    if (count($user) != 0) {
        $_SESSION['error_email_reg'] = "Эта почта уже используется";
        $mysql->close();
        header('Location: ../reg-shop.php');
        exit();
    } 
    if ($pass != $passrepeat) {
        $_SESSION['error_password_reg'] = "Пароли не совпадают";
        $mysql->close();
        header('Location: ../reg-shop.php');
        exit();
    } else {
        $mysql->query("INSERT INTO `registration` (`name`, `email`, `password`, `hash`, `email_confirmed`) VALUES ('$username', '$email', '$pass', '$hash', 1)");
        $mysql->query("INSERT INTO `contactDetails` (`email`) VALUES ('$email')");
        $mysql->query("INSERT INTO `profInformation` (`email`) VALUES ('$email')");
        $mysql->query("INSERT INTO `personalInformation` (`email`) VALUES ('$email')");
        $mysql->query("INSERT INTO `myProfile` (`myName`, `email`) VALUES ('$username', '$email')");
        $mysql->query("INSERT INTO `unit1` (`email`) VALUES ('$email')");

        // if(mail($email, "Подтвердите Email на сайте", $message, $headers)) {
        //     echo "Подтвердите вашу почту";
        // } else {
        //     echo "Что-то пошло не так";
        // }

        setcookie('email', $email, time() + 60*60*24*30, "/");
        
        $mysql->close();
        unsetData();

        header('Location: ../../start-page/start-page.html');
    }


    unsetData();
