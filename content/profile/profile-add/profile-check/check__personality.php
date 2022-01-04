<?php

session_start();

function back()
{
    header('Location: ../your__personality.php');
    exit();
} 

$family = filter_var(trim($_POST['family']), FILTER_SANITIZE_STRING);
$invalid = filter_var(trim($_POST['invalid']), FILTER_SANITIZE_STRING);
$legal = filter_var(trim($_POST['legal']), FILTER_SANITIZE_STRING);
$ethnicity = filter_var(trim($_POST['ethnicity']), FILTER_SANITIZE_STRING);
$religion = filter_var(trim($_POST['religion']), FILTER_SANITIZE_STRING);
$sexorientation = filter_var(trim($_POST['sexorientation']), FILTER_SANITIZE_STRING);
$borngender = filter_var(trim($_POST['borngender']), FILTER_SANITIZE_STRING);

include '../../../data/config.php';

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES 'utf8'");
 
$x = $_SESSION['email'];

$mysql->query("UPDATE `personalInformation` SET `family` = '$family', `invalid` = '$invalid', 
                                                `legal` = '$legal', `ethnicity` = '$ethnicity',
                                                `religion` = '$religion', `sexorientation` = '$sexorientation',
                                                 `borngender` = '$borngender' WHERE `email` = '$x'");

$mysql->close();
back();