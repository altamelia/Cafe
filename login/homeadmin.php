<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class= "container">
    <div class="jumbotron">
      <h1 class="display-4">Hello, <b><?=$_SESSION['nama'] ?></b></h1>
      <p class="lead">Selamat datang, anda berhasil Login sebagai<b>><?=$_SESSION['username']?></b></p>
      <hr class="my-4">
      <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
      <a class="btn btn-primary btn-lg" href="crud/read.php" role="button">Lihat Data Menu</a>
    </div>
  </div>
</body>
</html>
