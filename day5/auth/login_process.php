<?php

$email = $password = '';
$errorEmail = $errorPassword = $generalMessage = '';


if (isset($_POST['btn-login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!$email) {
        $errorEmail = 'Vui lòng nhập email';
    }

    if (!$password) {
        $errorPassword = 'Vui lòng nhập mật khẩu';
    }

    if ($email && $password) {
        if ($email === 'admin@gmail.com' && $password === '123@123a') {
            // email: admin@gmail.com && pass: 123@123a
            // Login thành công

            $_SESSION['user'] = [
                'email' => $email,
                'name' => 'Minh Đức',
                'address' => 'Hoàng Đan Tam Dương Vĩnh Phúc',
            ];

            header('location:index.php?module=product');

            return;
        }

        $generalMessage = 'Sai email hoặc mật khẩu';
    }
}