<?php

session_start();

function back()
{
    header('Location: ../personal-info.php');
    exit();
} 

$myName = filter_var(trim($_POST['my_name']), FILTER_SANITIZE_STRING);
$country = filter_var(trim($_POST['country']), FILTER_SANITIZE_STRING);
$img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);
$vk = filter_var(trim($_POST['vk']), FILTER_SANITIZE_STRING);
$inst = filter_var(trim($_POST['inst']), FILTER_SANITIZE_STRING);
$tg = filter_var(trim($_POST['tg']), FILTER_SANITIZE_STRING);
$yt = filter_var(trim($_POST['yt']), FILTER_SANITIZE_STRING);

include '../../../data/config.php';

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES 'utf8'");

$x = $_SESSION['email'];

$mysql->query("UPDATE `myProfile` SET `myName` = '$myName', `country` = '$country', `vk` = '$vk',
                                            `inst` = '$inst', `tg` = '$tg', `yt` = '$yt',
                                            `img` = '$img' WHERE `email` = '$x'");

$mysql->query("UPDATE `registration` SET `name` = '$myName' WHERE `email` = '$x'");

$mysql->close();
back();