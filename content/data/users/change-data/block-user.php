 <?php

    session_start();

    include '../../config.php';

    $userBan = filter_var(trim($_POST['blockName']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysql->query("SET NAMES 'utf8'");

    $result = $mysql->query("SELECT `banned` FROM `registration` WHERE `email` = '$userBan'");
    $user = $result->fetch_assoc();

   if ($user['banned'] == 0) {
        $ban = 1;
        $mysql->query("UPDATE `registration` SET `banned` = '$ban' WHERE `email` = '$userBan'"); 
   }

   if ($user['banned'] == 1) {
        $ban = 0;
        $mysql->query("UPDATE `registration` SET `banned` = '$ban' WHERE `email` = '$userBan'"); 
   }
    
    $mysql->close();

    header('Location: ../users.php'); 
    exit();