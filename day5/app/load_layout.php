<?php

$pageName = $_GET['module'] ?? null;
$actionName = $_GET['action'] ?? null;

// Nếu module khác auth và session user rỗng thì chuyển đến trang login
if ($pageName != 'auth' && empty($_SESSION['user'])) {
    header('location:index.php?module=auth&action=login');
}

// Nếu action là login và đã có session user thì chuyển đến trang chủ (product)
if ($actionName === 'login' && !empty($_SESSION['user'])) {
    header('location:index.php?module=product');
}
switch ($pageName) {
    case 'product': {
        switch ($actionName) {
            case 'create': {
                require('./products/product-process.php');
                require('./products/create.php');
                break;
                }
            case 'edit': {
                require('./products/product-process.php');
                require('./products/edit.php');
                break;
                }
            default;
                require('./products/index.php');
        }
        break;
        }
    case 'upload': {     
        require('./upload/upload-process.php');
        require('./upload/index.php');
        break;
    }

    case 'order': {
        switch ($actionName) {
            case 'create': {
                    require('./orders/create.php');
                    break;
                }
            case 'edit': {
                    require('./orders/edit.php');
                    break;
                }
            default;
                require('./orders/index.php');
        }
    }
        break;
    case 'user': {
        switch ($actionName) {
            case 'create': {
                require('./users/user-process.php');
                require('./users/create.php');
                break;
                }
            case 'edit': {                   
                require('./users/user-process.php');
                require('./users/edit.php');
                break;
                }
            case 'delete': {
                require('./users/delete.php');
                break;
            }
            default;
                require('./users/index.php');
        }
    }
        break;
    case 'auth':
        if ($actionName == 'login') {
            require './auth/login_process.php';
            require './auth/login.php';
        }

        if ($actionName == 'logout') {
            require './auth/logout.php';
        }

        break;
}