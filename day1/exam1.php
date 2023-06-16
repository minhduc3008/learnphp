<strong>Bài 1: In ra dãy số từ 1 - 50. Số chắn màu xanh, số lẻ màu đỏ.</strong>
<hr>
<?php

    for($i = 1; $i <= 50; $i++) {
        if($i % 2 == 0) {
            echo "<div style= 'color:blue'>$i</div>";
        } else {
            echo "<div style= 'color:red'>$i</div>";
        }
    }