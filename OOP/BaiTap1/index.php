<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập OOP </title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php require_once('student.php') ?>
    <div class="container">
        <h1>Thông tin sinh viên</h1>
        <form action="" method="POST">
            <div class="form-item">
                <label>Họ và tên: </label>
                <input type="text" name="fullName"> 
                <?php if ($errFullName): ?>
                    <span class="error"><?= $errFullName ?></span>
                <?php endif; ?>    
            </div>
    
            <div class="form-item">
                <label>Email: </label>
                <input type="text" name="email">
                <?php if ($errEmail):?>
                    <span class="error"><?= $errEmail?></span>
                <?php endif;?>
            </div>
        
            <div class="form-item">
                <label>Điện thoại: </label>
                <input type="text" name="phone">
                <?php if ($errPhone):?>
                    <span class="error"><?= $errPhone?></span>
                <?php endif;?> 
            </div>
            
            <div class="form-item">
                <label>Giới tính: </label>
                <label><input type="radio" name="gender" value="1" <?= $student->getGender() == 1 ? 'checked' : '' ?>>Nam</label>
                <label><input type="radio" name="gender" value="2" <?= $student->getGender() == 2 ? 'checked' : '' ?>>Nữ</label>
                <?php if ($errGender):?>
                    <span class="error"><?= $errGender?></span>
                <?php endif;?>
                
            </div>

            <button name="btn-submit">Lưu lại</button>
            <button name="btn-cancer">Hủy</button>
        </form>
        <div class="content">
            <p> Họ và tên: <?= $student->getName()?></p>
            <p> Email: <?= $student->getEmail()?></p>
            <p> Điện thoại: <?= $student->getPhone()?></p>
            <p> Giới tính: <?= $student->getGender() == 1 ? 'Nam' : 'Nữ'?></p>
        </div>
    </div>
</body>
</html>