<?php
require_once('Tringle.php');
require_once('FileRecord.php');

$tringleFile = new FileRecord();
$tringleFile->openFile('data\tringles.json');
$tringleListFile = $tringleFile->getFiguresList();
$tringleList = [];

foreach ($tringleListFile as $key => $value) {
    $tringle = new Tringle();
    $tringle->setSides($value['Сторона A'], $value['Сторона B'], $value['Угол']);
    $tringleList[] = array(
        'Сторона A' => $tringle->getA(),
        'Сторона B' => $tringle->getB(),
        'Сторона C' => $tringle->getC(),
        'Угол' => $tringle->getAngle(),
        'Площадь' => $tringle->getArea()
    );
}

usort($tringleList, function($a, $b) {
    return $b['Площадь'] <=> $a['Площадь'];
});

echo json_encode($tringleList, JSON_UNESCAPED_UNICODE);
?>