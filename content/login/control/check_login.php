<?php

    session_start();

    include '../../data/config.php';

    function unsetData() {
        unset($_SESSION['error_email']);
        unset($_SESSION['error_count']);
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
            header('Location: ../login-start.php');
            exit();

        } else {
            $counts['try']++;
            $res = $allTry - $counts['try'];

            $mysql->query("UPDATE `TryToLogin` SET `try` = '{$counts['try']}' WHERE `userID` = '$userID'");

            $_SESSION['error_count'] = "Осталось попыток: {$res}";
            $_SESSION['error_email'] = "Неверный логин или пароль";
            header('Location: ../login-start.php');
            exit();
    }
        
    } else {
        // setcookie('email', md5($email), time() + 60*60*24*30, "/");
        $_SESSION['email'] = $email;
        $mysql->query("UPDATE `TryToLogin` SET `try` = 0 WHERE `userID` = '$userID'");
        $mysql->close();
        unsetData();
       
        header('Refresh:0.5; url=../../personal-cabinet/personal-cabinet.php');
    }

    unsetData();