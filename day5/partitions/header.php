<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Admin managerment</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="./index.php?module=product">Product management</a>
      <a class="p-2 text-dark" href="./index.php?module=category">Category management</a>
      <a class="p-2 text-dark" href="./index.php?module=order">Order management</a>
      <a class="p-2 text-dark" href="./index.php?module=user">User management</a>
      <a class="btn btn-outline-primary"><?= $_SESSION['user']['name'] ?? null ?></a>
    <?php if(!empty($_SESSION['user'])): ?> 
        <a href="index.php?module=auth&action=logout">Logout</a>    
    <?php endif; ?>
</div>