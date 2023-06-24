<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Search Form</title>
    <style>
        body {
            background-color: #00CCCC;
        }
        .container {
            margin: 50px auto;
            width: 800px;
            border: 5px double  #333;
            background-color: white;
        }

        input[type='text'] {
            padding: 10px;
            width: 300px;
            margin-left: 10px;
        }

        .gender {
            cursor: pointer;
        }

        button {
            margin-left: 10px;
            padding: 10px;
            cursor: pointer;
        }

        a {
            text-decoration: none;
        }

        form {
            margin: 10px 0px;
        }

        h1 {
            text-align: center;
        }

        td {
            text-indent: 10px;
        }
    </style>
</head>

<body>
    <?php
    require_once("students.php");
    // Search
    $gender = $_GET['gender'] ?? null;
    $keyword = $_GET['keyword'] ?? null;
    $result = $students;


    if (!empty($_GET)) {
        if (!empty($gender) || !empty($keyword)) {
            $result = [];

            foreach ($students as $student) {
                $isMatchKeyword = false;
                $isMatchGender = false;

                // Xử lý tìm kiếm thông tin theo từng sinh viên theo keyword
                if (!empty($keyword)) {
                    $valueSearchs = [
                        $student['name'],
                        $student['address'],
                        $student['email']
                    ];

                    if (in_array($keyword, $valueSearchs)) {
                        $isMatchKeyword = true;
                    }
                } else {
                    $isMatchKeyword = true;
                }

                // Tìm theo giới tính
                if (!empty($gender)) {
                    if ($student['gender'] == $gender) {
                        $isMatchGender = true;
                    }
                } else {
                    $isMatchGender = true;
                }

                if ($isMatchKeyword && $isMatchGender) {
                    $result[] = $student;
                }
            }
        }
    }
    ?>

    <div class="container">
        <h1>Form tìm kiếm sinh viên</h1>
        <div class="form-search">
            <form action="" method="GET">
                <input type="text" name="keyword" size="70" placeholder="Tìm theo tên, email hoặc địa chỉ"
                    value="<?= $keyword ?>" />
                <label class="gender"><input type="radio" name="gender" value="1" <?= $gender == 1 ? 'checked' : '' ?> />Nam</label>
                <label class="gender"><input type="radio" name="gender" value="2" <?= $gender == 2 ? 'checked' : '' ?> />Nữ</label>
                <button>Tìm kiếm</button>
            </form>
        </div>

        <div class="total-result" style="text-align: right; width: 800px;">Tổng số sinh viên:
            <?= count($result) ?>
        </div>
        <table width="800" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <th>Id</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Địa chỉ</th>
                <th>Hành Động</th>
            </tr>

            <?php foreach ($result as $student): ?>
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
                        <?= $student['gender'] == 1 ? 'Nam' : 'Nữ' ?>
                    </td>
                    <td>
                        <?= $student['address'] ?>
                    </td>
                    <td>
                        <?php
                        $detailLink = 'detail-student.php?id=' . $student['id'] . '&keyword=' . $keyword . '&gender=' . $gender;
                        ?>
                        <a href="<?= $detailLink ?>">Xem chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>
</body>

</html>