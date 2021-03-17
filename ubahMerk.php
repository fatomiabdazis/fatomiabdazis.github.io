<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>
				  alert('login terlebih dahulu!');
				  document.location.href = 'login.php';
			  </script>";
}

require 'functions.php';

// ambil data di URL
$no = $_GET["No"];

// query data alat berdasarkan nomer
$m = query("SELECT * FROM m_merk WHERE No = $no")[0];


// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah atau tidak
  if (ubahMerk($_POST) > 0) {
    echo "
        <script>
          alert('data berhasil diubah!');
          document.location.href = 'merk.php';
        </script>
    ";
  } else {
    echo "
        <script>
          alert('data gagal diubah!');
          document.location.href = 'merk.php';
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
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Ubah Data Merk</title>

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
  <nav class="navbar navbar-default" style="margin-bottom: 1px">
    <div class="container-fluid">
      <div class="navbar-header">
        <h1>Sistem Inventarisai Alat Medis</h1>
      </div>
    </div>
  </nav>
  <!-- akhir bootstrap navbar -->

  <!-- awal sidebar -->
  <div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width: 230px">
    <div class="w3-dropdown-hover">
      <button class="w3-button">Data Master
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block">
        <a href="merk.php" class="w3-bar-item w3-button">Merk</a>
        <a href="jenis.php" class="w3-bar-item w3-button">Jenis Alat</a>
        <a href="ruangan.php" class="w3-bar-item w3-button">Ruangan</a>
      </div>
    </div>
    <a href="dataalat.php" class="w3-bar-item w3-button">Data Alat Medis</a>
    <a href="jadwal.php" class="w3-bar-item w3-button">Jadwal Pemeliharaan</a>
    <a href="kalibrasi.php" class="w3-bar-item w3-button">Kalibrasi</a>
    <a href="laporan.php" class="w3-bar-item w3-button">Laporan Kerusakan</a>
    <a href="distributor.php" class="w3-bar-item w3-button">Data Distributor</a>
    <a href="teknisi.php" class="w3-bar-item w3-button">Data Teknisi</a>
    <button type="button" class="btn btn-danger" style="margin-left: 15px;"><a href="logout.php">Logout</a></button>
    <div class="tujuh">
      <img src="images/1.JPEG" class="img-circle">
    </div>
  </div>
  <!-- akhir sidebar -->

  <!-- awal form input data merk -->
  <div class="container" style="margin-left: 260px">
    <h3>Ubah Data Merk</h3>
    <form class="form-horizontal" action="" method="post">
      <input type="hidden" name="No" id="" value="<?= $m["No"] ?>">
      <div class="form-group">
        <label for="kd_merk" class="control-label col-sm-2">Kode Merk :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Kode Merk" name="kd_merk" No="kd_merk" required="" autocomplete="off" value="<?= $m["kd_merk"]; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="nama_merk" class="control-label col-sm-2">Merk :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Merk" name="nama_merk" No="nama_merk" required="" autocomplete="off" value="<?= $m["nama_merk"]; ?>">
        </div>
      </div>
      <div class="form-group">
        <label for="ket" class="control-label col-sm-2">Ket :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Ket" name="ket" No="ket" autocomplete="off" value="<?= $m["ket"]; ?>">
        </div>
      </div>
      <button type="submit" name="submit" style="margin-left: 195px">Submit</button>
    </form>
  </div>
  <!-- akhir form input data merk -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>