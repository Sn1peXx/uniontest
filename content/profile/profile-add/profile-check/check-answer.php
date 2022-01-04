<?php

session_start();

function back()
{
    header('Location: ../contact.php');
    exit();
} 

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
$address__deliver = filter_var(trim($_POST['address__deliver']), FILTER_SANITIZE_STRING);
$live__style = filter_var(trim($_POST['live__style']), FILTER_SANITIZE_STRING);
$phone = filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING);
$phoneN = filter_var(trim($_POST['phoneN']), FILTER_SANITIZE_STRING);
$phoneS = filter_var(trim($_POST['phoneS']), FILTER_SANITIZE_STRING);

include '../../../data/config.php';

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES 'utf8'");

$x = $_SESSION['email'];

$mysql->query("UPDATE `contactDetails` SET `fullName` = '$name', `login` = '$login', `adress` = '$address',
                                            `adressDelivery` = '$address__deliver', `typeOfResidence` = '$live__style',
                                            `telephoneDay` = '$phone', `telephoneNight` = '$phoneN',
                                            `telephoneAdd` = '$phoneS' WHERE `email` = '$x'");

$mysql->close();

back();
