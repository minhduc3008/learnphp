<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivery Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php
    $fullname = $phone = $address = $pageName = '';
    $fullnameErr = $phoneErr = $addressErr = '';
    $content = '';

    if (!empty($_GET['categoryID'])) {
        switch ($_GET['categoryID']) {
            case 1:
                $pageName = 'Laptop';
                break;

            case 2:
                $pageName = 'Printer';
                break;

            case 3:
                $pageName = 'Mobile';
                break;
            case 4:
                $pageName = 'Fax';
                break;
        }
    }

    if (isset($_POST['btn-submit'])) {
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Validate fullname
        if (empty($fullname)) {
            $fullnameErr = 'Vui lòng nhập họ và tên.';
        } else if (strlen($_POST['fullname']) < 3) {
            $fullnameErr = 'Họ và tên không được nhỏ hơn 3 ký tự.';
        }

        // Validate phone
        if (empty($phone)) {
            $phoneErr = 'Vui lòng nhập số điện thoại.';
        } else if (strlen($_POST['phone']) != 10) {
            $phoneErr = 'Số điện thoại phải có 10 kí tự.';
        } else if (!is_numeric($_POST['phone'])) {
            $phoneErr = 'Số điện thoại phải là số.';
        }
        // Validate address
        if (empty($address)) {
            $addressErr = 'Vui lòng nhập địa chỉ.';
        } else if (strlen($_POST['address']) < 3) {
            $addressErr = 'Vui lòng nhập địa chỉ cụ thể hơn';
        }

        // Sau khi nhập đúng và đủ
    
        if ($fullname && $phone && $address && strlen($phone) === 10) {
            $content .= "<p>Họ và tên: $fullname</p>";
            $content .= "<p>Số điện thoại: $phone</p>";
            $content .= "<p>Địa chỉ: $address</p>";
        }

    }
    ?>
    <div class="container">
        <div class="list-product">
            <ul>
                <li><a href="#">Danh mục sản phẩm</a></li>
                <li><a href="index.php?categoryID=1">Laptop</a></li>
                <li><a href="index.php?categoryID=2">Printer</a></li>
                <li><a href="index.php?categoryID=3">Mobile</a></li>
                <li><a href="index.php?categoryID=4">Fax</a></li>
            </ul>
        </div>
        <form action="" method="post">
            <span>
                Bạn đang ở trang<?= $pageName ?>, vui lòng nhập thông tin giao hàng
            </span>

            <div class="product-item">
                <label>Họ và tên: </label>
                <input type="text" name="fullname" placeholder="Vũ Minh Đức"
                    class="<?= $fullnameErr ? 'input-error' : '' ?>" value="<?= $fullname ?>" />
                <?= $fullnameErr ? "<p class='smg-error'>{$fullnameErr}</p>" : '' ?>
            </div>

            <div class="product-item">
                <label>Số điện thoại: </label>
                <input type="text" name="phone" placeholder="0000-000-000" class="<?= $phoneErr ? 'input-error' : '' ?>"
                    value="<?= $phone ?>" />
                <?= $phoneErr ? "<p class='smg-error'>{$phoneErr}</p>" : '' ?>
            </div>

            <div class="product-item">
                <label>Địa chỉ nhận hàng: </label>
                <input type="text" name="address" placeholder="Số nhà 00, Đường XX, Huyện YY, Tỉnh ZZ"
                    class="<?= $addressErr ? 'input-error' : '' ?>" value="<?= $address ?>" />
                <?= $addressErr ? "<p class='smg-error'>{$addressErr}</p>" : '' ?>
            </div>


            <button name="btn-submit">Gửi đi</button>
            <div class="result">
                <?= $content ?>
            </div>
        </form>
    </div>

</body>

</html>