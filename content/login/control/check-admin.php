<?php

    session_start();

    function unsetData() {
        unset($_SESSION['error_email']);
    }

    unsetData();

    include '../../data/config.php';

    $admin = filter_var(trim($_POST['admin']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

    $password = md5($password);
  
    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $result = $mysql->query("SELECT * FROM `registration` WHERE `email` = '$admin' AND `password` = '$password'");
    $user = $result->fetch_assoc();  
    if (count($user) == 0) {
        $_SESSION['error_email'] = "Неверный логин или пароль";
        header('Location: ../admin-reg.php');
        exit();

    } else {
        // setcookie('admin', $admin, time() + 60*60*24*30, "/");
        $_SESSION['admin'] = true;
        $mysql->close();
        unsetData();
    }
   
    header('Location: ../../data/users/users.php');
   
    

    unsetData();