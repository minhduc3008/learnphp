<style>
    .input-error {
        border: 1px solid red;
    }

    .error {
        color: red;
    }
</style>
<div class="container">
<h3>Login System</h3>

<form action="index.php?module=auth&action=login" method="post">
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="text" name="email" class="form-control <?= $errorEmail ? 'input-error' : '' ?>" >
            <?= $errorEmail ? '<div class="error">'.  $errorEmail .'</div>' : '' ?>
        </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control <?= $errorPassword ? 'input-error' : '' ?>">
                <?= $errorPassword ? '<div class="error">'.  $errorPassword .'</div>' : '' ?>
            </div>
        </div>
        <div class="form-group row">

            <label for="inputPassword" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
                <?= $generalMessage ? '<div class="error">' . $generalMessage . '</div>' : '' ?>
                <button type="submit" name='btn-login' class="btn btn-primary">Login</button> &nbsp;
                <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
        </div>
    </form>
</div>