<?php

if (isset($_POST['btn-submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email = $_POST['phone'];
    $address = $_POST['address'];
    $gender = isset($_POST['gender']);

    $id = 1;

    if (!empty($_SESSION['user'])) {
        $userInfor = end($_SESSION['user']);
        $id += $userInfor['id'];
    }

    // Kiểm tra xem thêm hay là sửa

    if (!empty($_GET['id'])) { // Sửa
        $data['id'] = $_GET['id']; 

        // Tìm key của array
        $keyOfUser = null;
        foreach ($_SESSION['users'] as $key => $user) {
            if ($user['id'] == $_GET['id']) {
                $keyOfUser = $key;
                break;
            }
        }

        $_SESSION['users'][$keyOfUser] = $data;
    }

    if (empty($_GET['id'])) { // Thêm mới
        $data['id'] = $id; 
        $_SESSION['users'][] = $data;
    }

    header('location:index.php?module=user');
}