<?php

    session_start();

    include '../../../data/config.php';

    date_default_timezone_set("Europe/Moscow");

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // Работа с форумом
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $avatar = $_SESSION['ava'];
    $comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING);
    $date = date('Y-m-d');
    $time = date('H:i');

    if ($comment) {
        $mysql->query("INSERT INTO `forum_1` (`username`, `comment`, `date`, `time`, `avatar`, `send_by`) VALUES ('$username', '$comment', '$date', '$time', '$avatar', '$email')");
    }
    
    $mysql->close();

    header('Location: ../forum-chat.php');