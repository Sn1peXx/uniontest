<?php 
    session_start();

    include '../data/config.php';
    
    $userID = $_COOKIE['userID'];

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysql->query("UPDATE `TryToLogin` SET `try` = 0 WHERE `userID` = '$userID'");
    
    //setcookie('email', $email['email'], time() - 60*60*24*30, "/");
    //setcookie('admin', $email['admin'], time() - 60*60*24*30, "/");
    
    unset($_SESSION['email']);
    unset($_SESSION["success"]);
    unset($_SESSION['error_email']);
    unset($_SESSION['error_username_reg']);
    unset($_SESSION['error_email_reg']);
    unset($_SESSION['error_password_reg']);
    unset($_SESSION['error']);
    unset($_SESSION['success_login']);
    unset($_SESSION['error_count']);
    unset($_SESSION['userID']);
    unset($_SESSION['admin']);
    unset($_SESSION['username']);


    header('Location: ../../index.php');
    exit();