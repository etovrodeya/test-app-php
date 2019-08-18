<?php
require_once('Circle.php');
require_once('FileRecord.php');

$circleFile = new FileRecord();
$circleFile->openFile('data\circlesRand.json');
$circlesList = [];

for ($i = 0; $i < 10; $i++) {
    $circle = new Circle();
    $circle->setRandRadius();
    $circlesList[] = array(
        'Радиус' => $circle->getR(),
        'Площадь' => $circle->getArea()
    );
}

usort($circlesList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

$circleFile->putFiguresList('data\circlesRand.json', $circlesList);

echo json_encode($circlesList, JSON_UNESCAPED_UNICODE);
?>