<?php

session_start();

function back()
{
    header('Location: ../personal-information.php');
    exit();
} 

$status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
$types = filter_var(trim($_POST['types']), FILTER_SANITIZE_STRING);
$prof = filter_var(trim($_POST['prof']), FILTER_SANITIZE_STRING);
$study = filter_var(trim($_POST['study']), FILTER_SANITIZE_STRING);
$member = filter_var(trim($_POST['member']), FILTER_SANITIZE_STRING);

include '../../../data/config.php';

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$mysql->query("SET NAMES 'utf8'");

$x = $_SESSION['email'];

$mysql->query("UPDATE `profInformation` SET `status` = '$status', `types` = '$types', `prof` = '$prof',
                                            `study` = '$study', `member` = '$member' WHERE `email` = '$x'");

$mysql->close();
back();