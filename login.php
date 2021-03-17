<?php
require 'functions.php';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="generator" content="Jekyll v4.1.1">
  <title>Login | Sistem Inventarisasi dan Pemeliharaan Alat medis</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/floating-labels/">

  <!-- Bootstrap core CSS -->
  <link href="Login/assets/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .bgimage {
      background-image: url('images/7.jpg');
      background-size: 100%;
    }

    .container {
      background-color: white;
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="Login/assets/dist/css/floating-labels.css" rel="stylesheet">
</head>

<body class="bgimage">
  <form class="form-signin" method="POST" action="ceklogin.php">
    <div class="text-center mb-4">
      <img class="mb-4" src="images/website-login-10-816564.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Sistem Inventarisasi dan Pemeliharaan Aalat Medis</h1>
      <p>Masukan Username dan Password Dengan Benar!</p>
      <marquee class="container">
        Laporan Kerusakan Alat Terbaru!
        <?php
        $laporan = query("SELECT * FROM report ORDER BY nama_alat DESC LIMIT 3");
        foreach ($laporan as $l) {
          echo $l['tanggal_laporan'], "/", $l["lokasi"],
          "/", $l["nama_alat"], "/", $l["keluhan"];
        ?>
          |
        <?php } ?>
        please login for more info!

      </marquee>
    </div>

    <div class="form-label-group">
      <input type="text" No="username" class="form-control" placeholder="Username" name="username" required autofocus autocomplete="off">
      <label for="username">Username</label>
    </div>

    <div class="form-label-group">
      <input type="password" No="password" class="form-control" placeholder="Password" name="password" required>
      <label for="password">Password</label>
    </div>

    <div class="form-label-group">
      <select class="form-control" name="level">
        <option value="admin">admin</option>
        <option value="user">user</option>
      </select>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted text-center">&copy;Fatomi Abdul Azis 2020-<?= date('Y') ?></p>
  </form>
</body>

</html>