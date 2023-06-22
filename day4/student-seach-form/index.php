<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search Form</title>
    <style>
        .container {
            margin: 0 auto;
            width: 800px;
        }

        input {
            padding: 10px;
            width: 175px;
        }

        button {
            margin-left: 10px;
            padding: 10px;
            cursor: pointer;
        }

        form {
            margin: 10px 0px;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    require_once("students.php");
    // Search
    $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
    $foundStudents = [];

    if ($searchKeyword) {
        foreach ($students as $student) {
            if (stripos($student['name'], $searchKeyword) !== false
            || stripos($student['email'], $searchKeyword) !== false
            || stripos($student['address'], $searchKeyword) !== false)
             {
                $foundStudents[] = $student;
            }
        }
    }
    ?>

    <div class="container">
        <h1>Form tìm kiếm sinh viên</h1>

        <form action="" method="GET">
            <input type="text" name="search" value="<?= htmlentities($searchKeyword) ?>"
                placeholder="Nhập từ khóa tìm kiếm">
            <button type="submit">Tìm kiếm</button>
        </form>
        <table width="800" border="1">
            <tr>
                <td>ID</td>
                <td>Họ và tên</td>
                <td>email</td>
                <td>Giới tính</td>
                <td>Địa chỉ</td>
                <td>Chi tiết</td>
            </tr>
            <?php if ($searchKeyword && count($foundStudents) > 0): ?>
                <?php foreach ($foundStudents as $student): ?>
                    <tr>
                        <td>
                            <?= $student['id'] ?>
                        </td>
                        <td>
                            <?= $student['name'] ?>
                        </td>
                        <td>
                            <?= $student['email'] ?>
                        </td>
                        <td>
                            <?= $student['address'] ?>
                        </td>
                        <td>
                            <?= $student['gender'] === 1 ? 'Nam' : 'Nữ' ?>
                        </td>
                        <td><a href="#">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td>
                            <?= $student['id'] ?>
                        </td>
                        <td>
                            <?= $student['name'] ?>
                        </td>
                        <td>
                            <?= $student['email'] ?>
                        </td>
                        <td>
                            <?= $student['address'] ?>
                        </td>
                        <td>
                            <?= $student['gender'] === 1 ? 'Nam' : 'Nữ' ?>
                        </td>
                        <td><a href="#">Xem chi tiết</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>

    </div>
</body>

</html>