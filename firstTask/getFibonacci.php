<?php
$first = 0;
$second = 1;
$sum = 0;
$result = [$first, $second];

for ($i = 0; $i < 62; $i++) {
    $sum = $first + $second;
    $first = $second;
    $second = $sum;
    $result[] = $sum;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>