<?php
    if (!isset($_SESSION['users'])) {
        $_SESSION['users'] = [];
    }

    $fullName = $email = $phone = $address = $gender = $file = '';
    $fullNameErr = $emailErr = $phoneErr = $addressErr = $genderErr = $fileErr = '';
    
    if (isset($_POST['btn-submit'])) {
        $fullName = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        

        if (empty($fullName)) {
            $fullNameErr = 'Vui lòng điền họ và tên của bạn';
        }

        if (empty($email)) {
            $emailErr = 'Vui lòng điền email của bạn';
        }
        
        if (empty($phone)) {
            $phoneErr = 'Vui lòng điền số điện thoại của bạn';
        }

        if (empty($address)) {
            $addressErr = 'Vui lòng điền địa chỉ của bạn';
        }
        if (empty($gender)) {
            $genderErr = 'Vui lòng chọn giới tính của bạn';
        }
        // if (empty($file)) {
        //     $fileErr = 'Vui lòng chọn avatar của bạn';
        // }
        

        // Kiểm tra xem thêm hay sửa

        if (!empty($_GET['id'])) { // Sửa
            $user['id'] = $_GET['id'];

            // Tìm id trong array
            $keyOfUser = null;
            foreach ($_SESSION['users'] as $key => $item) {
                if ($item['id'] == $user['id']) {
                    $keyOfUser = $key;
                    break;
                }
            }
            $_SESSION['users'][$keyOfUser] = $user;
        }

        if (empty($_GET['id'])) { // Thêm
            if($fullName && $email && $phone && $address && $gender) {
                $users = [
                    'id' => count($_SESSION['users']) + 1,
                    'fullname' => $fullName,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'gender' => $gender,
                    // 'file' => $file
                ];
    
                $_SESSION['users'][] = $users;
    
                header('location:index.php?module=user');
                return;
            }
        } 
        }
        
?>