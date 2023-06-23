<?php
require_once("students.php");

$studentId = $_GET['id'] ?? null;

if (empty($studentId)) {
    echo '<p>Không tìm thấy sinh viên</div>';
} else {
    $studentInfo = null;

    foreach ($students as $student) {
        if ($student['id'] == $studentId) {
            $studentInfo = $student;
        }
    }

    if ($studentInfo) {
        echo '<h4>Thông tin sinh viên</h4>';
        echo '<ul>';
        echo '<li>Họ và tên: ' . $studentInfo['name'] . '</li>';
        echo '<li>Email: ' . $studentInfo['email'] . '</li>';
        echo '<li>Địa chỉ: ' . $studentInfo['address'] . '</li>';
        echo '</ul>';
    } else {
        echo '<p>Không tìm thấy sinh viên</div>';
    }
}


// if()
echo "<p><a href='index.php?keyword="  . "&gender=" . urlencode($studentInfo['gender']) . "'>Quay lại danh sách</a></p>";
?>