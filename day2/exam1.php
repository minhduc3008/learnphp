<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        label {
            float: left;
            width: 100px;
        }
        input {
                margin-bottom: 5px;
                padding: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 300px;
        }

        .input-error {
            border: 1px solid red;
        }

        .smg-error {
            color: red;
            text-indent: 100px;
        }
        
        button {
            display: block;
            margin: 10px 0px 0px 100px;
            cursor: pointer;
        }
        div.result {
            border: 1px solid #ccc;
            width: 500px;
            text-align: center;
            margin: 50px auto;
        }
        form {
            border: 1px solid #ccc;
            width: 500px;
            padding: 10px;
            margin: 0 auto;
        }
        div.btn {
            display: flex;
        }
    </style>
</head>
<body>
    <?php

    $fullname = $email = $phone = $password = $address = $gender = '';
    $fullnameErr = $emailErr = $phoneErr = $passwordErr = $addressErr = $genderErr = '';
    $content = '';

    if(isset($_POST['btnRegister'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        // Validate for fullname
        if(empty($fullname)) {
            $fullnameErr = 'Vui lòng nhập họ và tên';
        } else if(strlen($_POST['fullname']) < 3) {
            $fullnameErr = 'Họ và tên không được dưới 3 ký tự';
        }

        // Validate for email
        if(empty($email)) {
            $emailErr = 'Vui lòng nhập email của bạn';
        } else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Email không đúng định dạng';
        }

        // Validate for phone
        if(empty($phone)) {
            $phoneErr = 'Vui lòng nhập số điện thoại của bạn';
        } else if(!is_numeric($_POST['phone'])) {
            $phoneErr = 'Số điện thoại không đúng';
        } else if(strlen($_POST['phone']) != 10) {
            $phoneErr = 'Số điện thoại phải có 10 số';
        }

        // Validate for password
        if(empty($password)) {
            $passwordErr = 'Vui lòng nhập mật khẩu';
        } else if(strlen($_POST['password']) < 6) {
            $passwordErr = 'Mật khẩu không được dưới 6 ký tự';
        }

        // Validate for address
        if(empty($address)) {
            $addressErr = 'Vui lòng nhập địa chỉ';
        } else if(is_numeric($_POST['address'])) {
            $addressErr = 'Địa chỉ không đúng';
        }

        // Validate for gender
        if (empty($gender)) {
            $genderErr = 'Vui lòng chọn giới tính của bạn';
        } else {
            // Xử lý logic khi radio button được chọn
        }


        // Xử lý sau khi nhập đúng và đủ
        if ($fullname && $email && $phone && $address && $password) {
           $content .= "<p>Tên của bạn: ${fullname}";
           $content .= "<p>Email của bạn: ${email}";
           $content .= "<p>Phone của bạn: ${phone}";
           $content .= "<p>Password của bạn: ${password}";
           $content .= "<p>Address của bạn: ${address}";
           $content .= "<p>Giới tính của bạn: ${gender}";

        }
    }

    if (isset($_POST['btnReset'])) {
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
?>
    <form action="" method="post">
        <label for="">Fullname</label>
        <input type="text" name="fullname" class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>" />
        <?= $fullnameErr ? "<div class='smg-error'>{$fullnameErr}</div>" : '' ?>

        <br>

        <label for="">Email</label>
        <input type="text" name="email" class="<?= $emailErr ? 'input-error' : '' ?>" value="<?= $email ?>" />
        <?= $emailErr ? "<div class='smg-error'>{$emailErr}</div>" : '' ?>
        <br>

        <label for="">Phone</label>
        <input type="text" name="phone" class="<?= $phoneErr ? 'input-error' : '' ?>" value="<?= $phone ?>" />
        <?= $phoneErr ? "<div class='smg-error'>{$phoneErr}</div>" : '' ?>
        <br>

        <label for="">Password</label>
        <input type="password" name="password" class="<?= $passwordErr ? 'input-error' : '' ?>" value="<?= $password ?>" />
        <?= $passwordErr ? "<div class='smg-error'>{$passwordErr}</div>" : '' ?>
        <br>

        <label for="">Address</label>
        <input type="text" name="address" class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" />
        <?= $addressErr ? "<div class='smg-error'>{$addressErr}</div>" : '' ?>
        <br>

        <label for="gender">Gender</label>
        <input type="radio" id="male" name="gender" value="Nam" <?= $gender === 'Nam' ? 'checked' : '' ?>>Nam
        <input type="radio" id="female" name="gender" value="Nữ" <?= $gender === 'Nữ' ? 'checked' : '' ?>>Nữ
        <input type="radio" id="other" name="gender" value="Khác" <?= $gender === 'Khác' ? 'checked' : '' ?>> Khác
        <?= $genderErr ? "<div class='smg-error'>$genderErr</div>" : '' ?>

        <div class="btn">
            <button name="btnRegister">Register</button>
            <button name="btnReset" type="submit">Reset</button>
        </div>
        
    </form>
    <div class='result'><?= $content ?></div>
</body>
</html>