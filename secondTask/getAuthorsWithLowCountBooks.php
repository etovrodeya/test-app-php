<?php
require('config/connect.php');

$query = "SELECT firstname, lastname, COUNT(*) FROM authors JOIN book_author ON authors.id=book_author.authors_id GROUP BY authors.id HAVING COUNT(*) <= 6";
$result = $connection->query($query);
$response = [];

if (!$result) {
    echo "Сбой при вставке данных: $query<br>" . 
        $connection->error . "<br><br>";
}

while ($row = $result->fetch_assoc()) {
    $response[] = $row;
}

$secondQuery = "SELECT (firstname), (lastname) FROM authors LEFT JOIN book_author ON (book_author.authors_id=authors.id) WHERE book_author.authors_id IS NULL";
$secondResult = $connection->query($secondQuery);

if (!$secondResult) {
    echo "Сбой при вставке данных: $secondQuery<br>" . 
        $connection->error . "<br><br>";
}

while ($secondRow = $secondResult->fetch_assoc()) {
    $response[] = $secondRow;
}

echo json_encode($response);
?>