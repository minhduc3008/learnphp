<?php

require './Model.php';
require './User.php';

$userObject = new User;

$userObject->query('SELECT * FROM users');

$users = $userObject->getAll();


$sqlInsertUser = "INSERT INTO users (personal_id,name,email,password,avatar,gender,birthday,family_id)
                  VALUE('4685455855544','Đỗ Thị E', 'eeee@gmail.com', '123@123a', '', 2, '1988-12-23 00:00:00', 2)";

$userObject->query($sqlInsertUser);

$sqlUpdate = "UPDATE users SET email='testupdate@gmail.com'
                WHERE id='31'";
$userObject->query($sqlUpdate);

$userObject->query('DELETE FROM users WHERE id = 20');

require './views/users/index.php';