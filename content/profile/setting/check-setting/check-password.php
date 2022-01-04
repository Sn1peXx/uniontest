<?php

    session_start();

    function back()
    {
        header('Location: ../change-password.php');
        exit();
    }

    function unsetData()
    {
        unset($_SESSION['error_current']);
        unset($_SESSION['error_repeat']); 
        unset($_SESSION['error']);
        unset($_SESSION['success']);
    }

    unsetData();

    $currentPassword = filter_var(trim($_POST['current-password']), FILTER_SANITIZE_STRING);
    $newPassword = filter_var(trim($_POST['new-password']), FILTER_SANITIZE_STRING);
    $repeatPassword = filter_var(trim($_POST['repeat-password']), FILTER_SANITIZE_STRING);

    if (mb_strlen($currentPassword && $newPassword && $repeatPassword) == 0) {
        $_SESSION['error'] = "Все поля должны быть заполнены";
        back();
    } else {
        $currentPassword = md5($currentPassword);
        $newPassword = md5($newPassword);
        $repeatPassword = md5($repeatPassword);

        include '../../../data/config.php';

        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $x = $_SESSION['email'];
        $result = $mysql->query("SELECT * FROM `registration` WHERE `email` = '$x' AND `password` = '$currentPassword'");
        $user = $result->fetch_assoc();  
        if (count($user) == 0) {
            $_SESSION['error_current'] = 'Неверный текущий пароль';
            $mysql->close();
            back();
        } else if (mb_strlen($newPassword) < 8) {
            $_SESSION['error_repeat'] = "Пароль должен состоять минимум из 5 симовлов";
            $mysql->close();
            back();
        } else if($newPassword != $repeatPassword) {
            $_SESSION['error_repeat'] = 'Пароли не совпадают';
            $mysql->close();
            back();
        } else {
            $mysql->query("UPDATE `registration` SET `password` = '$repeatPassword' WHERE `email` = '$x'");
            unsetData();
            $_SESSION['success'] = "<div class='alert alert-success' role='alert'>Вы успешно изенили пароль!</div>";
            $mysql->close();
            back();
        }
    }

    unsetData();
