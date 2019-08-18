<?php
require('config/connect.php');

if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $query = "INSERT INTO authors (firstname, lastname) VALUES" . "('$firstname', '$lastname')";
    $result = $connection->query($query);
    if (!$result) {
        echo "Сбой при вставке данных: $query<br>" . 
            $connection->error . "<br><br>";
    }
}
?>