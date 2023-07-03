<?php

$userId = $_GET['id'] ?? null;
$checkUserExists = false;
$keyOfUser = null;

foreach ($_SESSION['users'] as $key => $user) {
    if ($user['id'] == $userId) {
        $checkUserExists = true;
        $keyOfUser = $key;
        break;
    }
}

if (!$checkUserExists) {
    echo 'Không tìm thấy User';
    exit;
}

if ($checkUserExists && $keyOfUser >= 0) {
    unset($_SESSION['users'][$keyOfUser]);
    header('location:index.php?module=user');
}