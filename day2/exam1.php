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
    </style>
</head>
<body>
    <form action="" method="">
        <label for="">Fullname</label>
        <input type="text" name="fullname">
        <br>

        <label for="">Email</label>
        <input type="text" name="email">
        <br>

        <label for="">Phone</label>
        <input type="text" name="phone">
        <br>

        <label for="">Password</label>
        <input type="password" name="password">
        <br>

        <label for="">Address</label>
        <input type="text" name="address">
        <br>
        
        <label for="">Gender</label>
        <input type="radio" name="gender" value="1">Nam
        <input type="radio" name="gender" value="2">Nữ
    </form>
</body>
</html>