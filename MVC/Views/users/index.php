<h2>User List</h2>

<?= $title?>

<table width='1200' border="1">
    <tr>
        <th>ID</th>
        <th>Personal ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Avatar</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Family</th>
        <th>Action</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?=$user->id?></td>
        <td><?=$user->personal_id?></td>
        <td><?=$user->name?></td>
        <td><?=$user->email?></td>
        <td><?=$user->password?></td>
        <td><?=$user->avatar?></td>
        <td><?=$user->birthday?></td>
        <td><?=$user->gender == 1 ? 'Nam' : 'Nữ' ?></td>
        <td><?=$user->family_id?></td>
        <td>
            <a href="">Sửa</a> | <a href="">Xóa</a>
        </td>
    </tr>

    <?php endforeach; ?>
</table>