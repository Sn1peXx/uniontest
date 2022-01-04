<?php

session_start();

if($_POST['kapcha'] != $_SESSION['rand_code']) {
  header('Location: ../login-start.php');
  exit();
}

else{
  include '../../data/config.php';

  $mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  $userID = $_COOKIE['userID'];

  $count = $mysql->query("UPDATE `TryToLogin` SET `try` = 0 WHERE `userID` = '$userID'");

  unset($_SESSION['error_email']);
  unset($_SESSION['error_count']);

  $mysql->close();

  header('Location: ../login-start.php');
  exit();
}

?>
