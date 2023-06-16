<strong>Bài 2: In ra bảng cửu chương</strong>
<hr>

<?php
echo '<table width=1200 style>';
for($i = 1; $i <= 10; $i++) {
echo '<tr>';
    for($j = 1; $j <= 9; $j++) {
        $k = $j*$i;
        echo "<td style='border:1px solid #ccc'>$j x $i =$k</td>";  
    }
echo '</tr>';
 }
echo '</table>';