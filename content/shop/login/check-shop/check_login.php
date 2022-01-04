<?php

    session_start();

    include '../../../data/config.php';

    function unsetData() {
        unset($_SESSION['error_email']);
        unset($_SESSION['error_count-shop']);
    }

    unsetData();

    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $allTry = 3;

    $password = md5($password);
    $userID = $_COOKIE['userID'];

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $result = $mysql->query("SELECT * FROM `registration` WHERE `email` = '$email' AND `password` = '$password'");
    $count = $mysql->query("SELECT `try` FROM `TryToLogin` WHERE `userID` = '$userID'");

    $user = $result->fetch_assoc();
    $counts = $count->fetch_assoc(); 

    if (count($user) == 0) { 
        if ($counts['try'] == 3) {
            header('Location: ../../../login/login-start.php');
            exit();
        } else {
            $counts['try']++;
            $res = $allTry - $counts['try'];

            $mysql->query("UPDATE `TryToLogin` SET `try` = '{$counts['try']}' WHERE `userID` = '$userID'");
            $res += 1;
            $_SESSION['error_count-shop'] = "Осталось попыток: {$res}";
            $_SESSION['error_email'] = "Неверный логин или пароль";
            header('Location: ../login-shop.php');
            exit();
    }
        
    } else {
        setcookie('email', $email, time() + 60*60*24*30, "/");

        $mysql->query("UPDATE `TryToLogin` SET `try` = 0 WHERE `userID` = '$userID'");

        $mysql->close();
        unsetData();
        header('Refresh:0.5; url=../../start-page/start-page.html');
    }

    unsetData();