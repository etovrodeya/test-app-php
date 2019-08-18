<?php
require_once('Tringle.php');
require_once('FileRecord.php');

$tringleFile = new FileRecord();
$tringleFile->openFile('data\tringlesRand.json');
$tringlesList = [];

for ($i = 0; $i < 10; $i++) {
    $tringle = new Tringle();
    $tringle->setRandSides();
    $tringlesList[] = array(
        'Сторона A' => $tringle->getA(),
        'Сторона B' => $tringle->getB(),
        'Сторона C' => $tringle->getC(),
        'Угол' => $tringle->getAngle(),
        'Площадь' => $tringle->getArea()
    );
}

usort($tringlesList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

$tringleFile->putFiguresList('data\tringlesRand.json', $tringlesList);

echo json_encode($tringlesList, JSON_UNESCAPED_UNICODE);
?>