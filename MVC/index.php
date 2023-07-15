<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h2>Chào Mừng đến với trang quản trị Minh Đức</h2>


<p>Bắt đầu thôi</p>

<ul>
    <li><a href="index.php?controller=user&action=index">Quản lý User</a></li>
    <li><a href="index.php?controller=family&action=index">Quản lý Gia Đình</a></li>
    <li><a href="index.php?controller=employee&action=index">Quản lý Công nhân</a></li>
</ul>
<?php 
require './Common/Autoload.php';
require './Common/Helper.php';

$controllerName = ucfirst(($_GET['controller'] ?? 'Home') . 'Controller');
$actionName = $_GET['action'] ?? 'index'; 

$controller = new $controllerName;

$controller->$actionName();
?>
</body>
</html>
