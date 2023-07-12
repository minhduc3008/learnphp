<h3>Danh sách User</h3>

<button>Add user</button>
<table border="1" width='900'>
    <tr>
        <th>ID</th>
        <th>CCCD</th>
        <th>Name</th>
        <th>Email</th>
        <th>Avatar</th>
        <th>Gender</th>
        <th>Birthday</th>
        <th>Family</th>
        <th>Action</th>
    </tr>

    <tr>
    <?php foreach($users as $userItem):?>
        <tr>
        <td><?=$userItem->id?></td>
        <td><?=$userItem->personal_id?></td>
        <td><?=$userItem->name?></td>
        <td><?=$userItem->email?></td>
        <td><?=$userItem->avatar?></td>
        <td><?=$userObject->getGender($userItem->gender)?></td>
        <td><?=$userItem->birthday?></td>
        <td><?=$userObject->getFamily($userItem->family_id)?></td>
        <td>
            <a href="#">Xóa</a> | <a href="#">Sửa</a>
        </td>
        </tr>
    <?php endforeach; ?>
    </tr>
</table>