<strong>Bài 4: In ra số lớn nhất từ 3 số </strong>
<hr>

<?php

$numberOne = 1;
$numberTwo = 2;
$numberThree = 3;
$max = $numberOne;
if($numberTwo > $max) {
    $max = $numberTwo;
}
 
if($numberThree > $max) {
    $max = $numberThree;
}

echo 'Số lớn nhất là: ' . $max;