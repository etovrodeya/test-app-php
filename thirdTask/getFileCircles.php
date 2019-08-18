<?php
require_once('Circle.php');
require_once('FileRecord.php');

$circleFile = new FileRecord();
$circleFile->openFile('data\circles.json');
$circleListFile = $circleFile->getFiguresList();
$circleList = [];

foreach ($circleListFile as $key => $value) {
    $circle = new Circle();
    $circle->setRadius($value['Радиус']);
    $circleList[] = array(
        'Радиус' => $circle->getR(),
        'Площадь' => $circle->getArea()
    );
}

usort($circleList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

echo json_encode($circleList, JSON_UNESCAPED_UNICODE);
?>