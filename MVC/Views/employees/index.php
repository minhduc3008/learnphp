<h2>Profile List</h2>
<a href="index.php?controller=employee&action=create">Create Employee</a>
<br>
<br>
<table width='800' border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Action</th>
    </tr>
    <?php foreach ($employees as $employee): ?>
    <tr>
        <td><?= $employee->id ?></td>
        <td><?= $employee->name ?></td>
        <td><?= $employee->phone ?></td>
        <td><?= $employee->email ?></td>
        <td><?= $employee->address ?></td>
        <td><?= $employee->birthday ?></td>
        <td><?= $employee->gender == 1 ? 'Nam' : 'Nữ' ?></td>
        <td>
            <a href="index.php?controller=employee&action=edit&id=<?= $employee->id ?>">Sửa</a> |
            <a onclick="return confirm('bạn có thực sự muốn xóa không?')" href="index.php?controller=employee&action=delete&id=<?= $employee->id ?>">Xóa</a>
        </td>
    </tr>

    <?php endforeach; ?>
</table>