<?php
require('config/connect.php');

$query = "SELECT * FROM authors";
$result = $connection->query($query);
$response = [];

if (!$result) {
    echo "Сбой при вставке данных: $query<br>" . 
        $connection->error . "<br><br>";
}

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

echo json_encode($response);
?>