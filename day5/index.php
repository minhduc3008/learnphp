<?php
  session_start();
  ob_start();
?>
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
  <?php ($_GET['module'] ?? null) != 'auth' ? require('./partitions/header.php') : '' ?>

  <?php require('app/load_layout.php') ?>;
    

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
</body>
</html>
