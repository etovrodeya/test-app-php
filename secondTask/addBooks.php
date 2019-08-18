<?php
require('config/connect.php');

if (isset($_POST['title']) && isset($_POST['authors'])) {
    $title = $_POST['title'];
    //Первый запрос на добавление книги
    $query = "INSERT INTO books (title) VALUES" . "('$title')";
    $result = $connection->query($query);

    if (!$result) {
        echo "Сбой при вставке данных: $query<br>" . 
            $connection->error . "<br><br>";
    }

    $values_array = [];

    foreach ($_POST['authors'] as $author) {
        $values_array[] = sprintf("(%s, %s)", $connection->insert_id, $author);
    }

    $values_string = implode(', ', $values_array);

    /*Второй запрос на добавление соответствия книга-автор
    в связующую таблицу*/
    $secondQuery = "INSERT INTO book_author (books_id, authors_id) VALUES " . $values_string;
    $secondResult = $connection->query($secondQuery);

    if (!$secondResult) {
        echo "Сбой при вставке данных: $secondQuery<br>" . 
            $connection->error . "<br><br>";
    }
}
?>