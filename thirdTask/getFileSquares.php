<?php
require_once('Square.php');
require_once('FileRecord.php');

$squareFile = new FileRecord();
$squareFile->openFile('data\squares.json');
$squaresListFile = $squareFile->getFiguresList();
$squaresList = [];

foreach ($squaresListFile as $key => $value) {
    $square = new Square();
    $square->setSide($value['side']);
    $squaresList[] = array(
        'Сторона' => $square->getA(),
        'Площадь' => $square->getArea()
    );
}

usort($squaresList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

echo json_encode($squaresList, JSON_UNESCAPED_UNICODE);
?>