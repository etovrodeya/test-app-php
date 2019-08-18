<?php
require_once('Square.php');
require_once('FileRecord.php');

$squareFile = new FileRecord();
$squareFile->openFile('data\squaresRand.json');
$squaresList = [];

for ($i = 0; $i < 10; $i++) {
    $square = new Square();
    $square->setRandSide();
    $squaresList[] = array(
        'Сторона' => $square->getA(),
        'Площадь' => $square->getArea()
    );
}

usort($squaresList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

$squareFile->putFiguresList('data\squaresRand.json', $squaresList);

echo json_encode($squaresList, JSON_UNESCAPED_UNICODE);
?>
