<?php

include '../../data/config.php';

$mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
// Проверка есть ли хеш
if ($_GET['hash']) {
    $hash = $_GET['hash'];
    // Получаем id и подтверждено ли Email
    if ($result = $mysql->query("SELECT `id`, `email_confirmed` FROM `registration` WHERE `hash`='" . $hash . "'")) {
        while( $row = $result->fetch_assoc() ) { 
            echo $row['id'] . " " . $row['email_confirmed'];
            // Проверяет получаем ли id и Email подтверждён 
            if ($row['email_confirmed'] == 1) {
                // Если всё верно, то делаем подтверждение
                $mysql->query("UPDATE `registration` SET `email_confirmed`= 0 WHERE `id`=". $row['id'] );
                echo "Email подтверждён";
            } else {
                echo "Что то пошло не так";
            }
        } 
    } else {
        echo "Что то пошло не так";
    }
} else {
    echo "Что то пошло не так";
}