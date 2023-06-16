<strong>Bài 3: In ra tam giác bằng '*'</strong>
<hr>

<?php
$height = 40;

for ($i = 1; $i <= $height; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>