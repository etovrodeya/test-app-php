<?php
$first = 0;
$second = 1;
$sum = 0;
$result = [$first, $second];

/*В результирующий массив добавляется 62 числа так так
первые два 0 и 1 уже в него добавлены*/
for ($i = 0; $i < 62; $i++) {
    $sum = $first + $second;
    $first = $second;
    $second = $sum;
    $result[] = $sum;
}

echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>