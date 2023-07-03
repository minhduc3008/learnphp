<?php
    //Xóa thông tin đăng nhập user
    unset($_SESSION['user']);
    //Xóa tất cả thông tin của session
    // session_destroy(); 
    header('location:index.php?module=auth&action=login');
?>