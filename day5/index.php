<router-outlet></router-outlet>
<html lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">
  <title>suntech.edu.vn</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/pricing/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Admin managerment</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="./index.php?module=product">Product management</a>
      <a class="p-2 text-dark" href="./index.php?module=category">Category management</a>
      <a class="p-2 text-dark" href="./index.php?module=order">Order management</a>
      <a class="p-2 text-dark" href="./index.php?module=user">User management</a>
    </nav>
    <a class="btn btn-outline-primary" routerlink="cart">Administrator</a>
  </div>

  <?php require('app/load_layout.php') ?>;
    

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</body>
</html>
