<strong>Bài 5: In ra dãy số từ 1 - 300, bỏ qua các số chia hết cho 3</strong>
<hr>
<?php

for($i = 1; $i <= 300; $i++) {
    if($i % 3 == 0) {
        continue;
    }
    echo $i . ' ' . '<br>';
}