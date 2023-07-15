<style>
    span { 
        color: red;
    }
</style>
<h3><?= $headingTitle ?></h3>

<div class="container">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="personal_id" >CCCD</label>
            <input type="text" id="personal_id" name="personal_id" value="<?= $user->personal_id ?? null ?>" placeholder="your cccd" />
            <span><?= $errorMessage['personal_id'] ?? null ?></span> 
        </div>

        <div class="form-group row">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="<?= $user->name ?? null ?>" placeholder=" your name"/>
            <span><?= $errorMessage['name'] ?? null ?></span> 
        </div>

        <div class="form-group row">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= $user->email ?? null ?>" placeholder="your email" />
            <span><?= $errorMessage['email'] ?? null ?></span>         
        </div>

        <div class="form-group row">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="<?= $user->password ?? null ?>" placeholder="your password" />
            <span><?= $errorMessage['password'] ?? null ?></span>        
        </div>

        <div class="form-group row">
    <label for="family_id">Gia đình</label>
    <select id="family_id" name="family_id" class="form-control">
        <option value="">-- Chọn gia đình --</option>
        <option value="1" <?= isset($user->family_id) && $user->family_id == 1 ? 'selected' : '' ?>>Gia đình 1</option>
        <option value="2" <?= isset($user->family_id) && $user->family_id == 2 ? 'selected' : '' ?>>Gia đình 2</option>
        <option value="3" <?= isset($user->family_id) && $user->family_id == 3 ? 'selected' : '' ?>>Gia đình 3</option>
    </select>
    <span><?= $errorMessage['family_id'] ?? null ?></span>
</div>


        <div class="form-group row">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="<?= $user->birthday ?? null ?>" placeholder="your birthday" />
            <span><?= $errorMessage['birthday'] ?? null ?></span>         
        </div>

        <div class="form-group row">
            <label for="gender">Gender</label>
            <label><input type="radio" id="gender" name="gender" value="1" <?=isset($user->gender) && $user->gender == 1 ? 'checked' : null?>/>Nam</label>
            <label><input type="radio" id="gender" name="gender" value="2" <?=isset($user->gender) && $user->gender == 2 ? 'checked' : null?>/>Nữ</label>
            <span><?= $errorMessage['gender'] ?? null ?></span>        
        </div>

        <div class="form-group row">
           <button type="submit" name="btn-save">Save Employee</button>
        </div>
    </form>
</div>