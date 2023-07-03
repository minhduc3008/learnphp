<?php
$userID = $_GET['id'] ?? null;
$userInfo = null;
foreach ($_SESSION['users'] as $user) {
    if ($user['id'] == $userID) {
        $userInfo = $user;
        break;
    }
}
?>


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-5"> Edit User Information</h3>
    <a href="./index.php?module=user">Back</a>

</div>

<div class="container">
    <form action="index.php?module=user&action=edit&id=<?= $userID ?>" method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="fullname" class="col-sm-3 col-form-label">Fullname</label>
            <div class="col-sm-9">
                <input type="text" id="fullname" name="fullname"
                    class="form-control <?= $fullNameErr ? 'border-danger' : '' ?>" value="<?= $user['fullname'] ?>" />
                <?= $fullNameErr ? "<span class='error'>$fullNameErr</span>" : '' ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
                <input type="text" id="email" name="email" class="form-control  <?= $emailErr ? 'border-danger' : '' ?>"
                    value="<?= $user['email'] ?>" />
                <?= $emailErr ? "<span class='error'>$emailErr</span>" : '' ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
                <input type="text" id="phone" name="phone" class="form-control <?= $phoneErr ? 'border-danger' : '' ?>"
                    value="<?= $user['phone'] ?>" />
                <?= $phoneErr ? "<span class='error'>$phoneErr</span>" : '' ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
                <input type="text" id="address" name="address"
                    class="form-control <?= $addressErr ? 'border-danger' : '' ?>" value="<?= $user['address'] ?>" />
                <?= $addressErr ? "<span class='error'>$addressErr</span>" : '' ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="gender" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
                <label><input type="radio" id="male" name="gender" value="1" <?= $user['gender'] == 1 ? 'checked' : '' ?> />
                    Nam</label>
                <label><input type="radio" id="female" name="gender" value="2" <?= $user['gender'] == 2 ? 'checked' : '' ?> /> Nữ</label>
                <?= $genderErr ? "<span class='error'>$genderErr </span>" : '' ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="file" class="col-sm-3 col-form-label">Avatar</label>
            <div class="col-sm-9">
                <input type="file" id="file" name="file" class="form-control  <?= $fileErr ? 'border-danger' : '' ?>"
                    value="<?= $file ?>" />
                <?= $fileErr ? "<span class='error'>$fileErr </span>" : '' ?>
                <?php if (!empty($user['file'])): ?>
                    <img src="./assets/images/<?= $user['file'] ?>" width="100">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <button type="submit" name="btn-submit" class="btn btn-primary">Save</button> &nbsp;
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>