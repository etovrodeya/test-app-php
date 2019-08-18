<?php
require('config.php');

$connection = new mysqli($url, $login, $password, $db);

if ($connection->connect_error) {
    die ('Ошибка соединения: ' . $connection->connect_error);
}
?>