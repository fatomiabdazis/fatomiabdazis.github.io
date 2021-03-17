<?php
session_start();

require 'functions.php';

if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>
				  alert('login terlebih dahulu!');
				  document.location.href = 'login.php';
			  </script>";
}

// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil ditambahkan
  if (tambahDataalat($_POST) > 0) {
    echo "
        <script>
          alert('Data Alat Medis berhasil ditambahkan!');
          document.location.href = 'dataalat.php';
        </script>
    ";
  } else {
    echo "
        <script>
          alert('Data Alat Medis gagal ditambahkan!');
          document.location.href = 'dataalat.php';
        </script>
    ";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    a {
      margin-left: 20px;
      margin-top: 10px;
    }
  </style>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Input Data Alat Medis</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <!-- bootstrap navbar -->
  <nav class="navbar navbar-expand-sm bg-primary" style="margin-bottom: 1px">
    <div class="container-fluid">
      <div class="navbar-header">
        <h1 style="font-family:'Times New Roman', Times, serif, bold">Sistem Inventarisai Alat Medis</h1>
      </div>
    </div>
  </nav>
  <!-- akhir bootstrap navbar -->

  <!-- awal sidebar -->
  <div class="w3-sidebar w3-bar-block w3-light-blue w3-card" style="width: 230px">
    <a href="dataalat.php" class="btn btn-primary" style="border-radius: 20px;">Data Alat Medis</a>
    <a href="jadwal.php" class="btn btn-primary" style="border-radius: 20px;">Jadwal Pemeliharaan</a>
    <a href="kalibrasi.php" class="btn btn-primary" style="border-radius: 20px;">Kalibrasi</a>
    <a href="laporan.php" class="btn btn-primary" style="border-radius: 20px;">Laporan Kerusakan</a>
    <a href="distributor.php" class="btn btn-primary" style="border-radius: 20px;">Data Distributor</a>
    <a href="teknisi.php" class="btn btn-primary" style="border-radius: 20px;">Data Teknisi</a>
    <a href="logout.php" class="btn btn-danger" style="border-radius: 20px;">Logout</a>
    <div class="tujuh">
      <img src="images/1.JPEG" class="img-circle">
    </div>
  </div>
  <!-- akhir sidebar -->

  <!-- awal form input data merk -->
  <div class="container" style="margin-left: 260px">
    <h3>Input Data Alat Medis</h3>
    <form class="form-horizontal" action="" method="post">
      <div class="form-group">
        <label for="nama_alat" class="control-label col-sm-3">Nama Alat :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Nama Alat Medis" name="nama_alat" No="nama_alat" required="" autofocus="" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="merk_alat" class="control-label col-sm-3">Merk Alat :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Merk Alat Medis" name="merk_alat" No="merk_alat" required="" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="sn_alat" class="control-label col-sm-3">S/N :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="S/N" name="sn_alat" No="sn_alat" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="jenis_alat" class="control-label col-sm-3">Jenis Alat :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Jenis Alat Medis" name="jenis_alat" No="jenis_alat" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="distributor_alat" class="control-label col-sm-3">Distributor :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Distributor" name="distributor_alat" No="distributor_alat" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="tgl_pengadaan" class="control-label col-sm-3">Tanggal Pengadaan :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Tanggal Pengadaan" name="tgl_pengadaan" No="tgl_pengadaan" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="tgl_penerimaan" class="control-label col-sm-3">Tanggal Penerimaan :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Tanggal Penerimaan" name="tgl_penerimaan" No="tgl_penerimaan" autocomplete="off">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="ruangan_alat" class="control-label col-sm-3">Ruangan :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Ruangan" name="ruangan_alat" No="ruangan_alat" autocomplete="off">
          <br>
        </div>
      </div>
      <button type="submit" name="submit" style="margin-left: 293px">Submit</button>
    </form>
  </div>
  <!-- akhir form input data merk -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>