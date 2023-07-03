<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h2 class="display-4">User Management</h2>
  <p><a href="./index.php?module=user&action=create">Add new</a></p>
</div>

<div class="container">
  <div class="card-deck mb-3 text-center">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Avatar</th>
          <th scope="col">Họ và tên</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Giới tính</th>
          <th scope="col">Địa chỉ</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (isset($_SESSION['users']) ?? null) :?>
        <?php foreach ($_SESSION['users'] as $user): ?>
        <tr>
          <th scope="row"><?= $user['id']?></th>
          <td><img src="./assets/images/<?=$user['file'] ?>" width="100"></td>
          <td><?= $user['fullname']?></td>
          <td><?= $user['email']?></td>
          <td><?= $user['phone']?></td>
          <td><?= $user['gender'] == 1 ? "Nam" : "Nữ"?></td>
          <td><?= $user['address']?></td>
          <td>
            <a href="index.php?module=user&action=edit&id=<?= $user['id']?>">Edit</a>
            <a onclick="return confirm('Bạn có chắc là muốn xóa ko?')" href="index.php?module=user&action=delete&id=<?= $user['id']?>">Delete</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <?php endif;?>
      </tbody>
    </table>
  

  </div>
</div>