<style>
    span { 
        color: red;
    }
</style>
<h3><?= $headingTitle ?></h3>

<div class="container">
    <form action="<?= $actionUrl ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="name" >Name</label>
            <input type="text" id="name" name="name" value="<?= $employee->name ?? null ?>" placeholder="your name" />
            <span><?= $errorMessage['name'] ?? null ?></span> 
        </div>

        <div class="form-group row">
            <label for="phone">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= $employee->phone ?? null ?>" placeholder=" your phone"/>
            <span><?= $errorMessage['phone'] ?? null ?></span> 
        </div>

        <div class="form-group row">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= $employee->email ?? null ?>" placeholder="your email" />
            <span><?= $errorMessage['email'] ?? null ?></span>         
        </div>

        <div class="form-group row">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" value="<?= $employee->address ?? null ?>" placeholder="your address" />
            <span><?= $errorMessage['address'] ?? null ?></span>        
        </div>

        <div class="form-group row">
            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" value="<?= $employee->birthday ?? null ?>" placeholder="your birthday" />
            <span><?= $errorMessage['birthday'] ?? null ?></span>         
        </div>

        <div class="form-group row">
            <label for="gender">Gender</label>
            <label><input type="radio" id="gender" name="gender" value="1" <?=isset($user->gender) && $employee->gender == 1 ? 'checked' : null?>/>Nam</label>
            <label><input type="radio" id="gender" name="gender" value="2" <?=isset($user->gender) && $employee->gender == 2 ? 'checked' : null?>/>Nữ</label>
            <span><?= $errorMessage['gender'] ?? null ?></span>        
        </div>

        <div class="form-group row">
           <button type="submit" name="btn-save">Save Employee</button>
        </div>
    </form>
</div>