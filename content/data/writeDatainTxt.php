<?php
$a = $_GET['a']; // Неверные слова
$b = $_GET['b']; // Неверные буквы
$unit = $_GET['unit']; // Неверные буквы
$type = $_GET['type']; // тип урока
$x = $_COOKIE['email'];
//записываем текст в файл с блокировкой
$filename = './log.txt';
$text = "Слова в которых была ошибка - " . $a . " Ошибки, допущенные в тесте - " . $b . " Пользователь - " . $x . " UNIT: " . $unit . " Урок: " . $type;
// file_put_contents($filename, $text, LOCK_EX);
$file = fopen($filename,'a');
fwrite($file, $text . "\r\n");
fclose($file);
?>