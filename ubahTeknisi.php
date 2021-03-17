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
$t = query("SELECT * FROM m_teknisi WHERE No = $no")[0];


// cek apakah tombol submit sudah ditekan apa belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil diubah atau tidak
  if (ubahTeknisi($_POST) > 0) {
    echo "
        <script>
          alert('teknisi berhasil diubah!');
          document.location.href = 'teknisi.php';
        </script>
    ";
  } else {
    echo "
        <script>
          alert('teknisi gagal diubah!');
          document.location.href = 'teknisi.php';
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
  <title>Ubah Data Teknisi</title>

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
    <h3>Ubah Data Teknisi</h3>
    <form class="form-horizontal" action="" method="post">
      <input type="hidden" name="No" id="" value="<?= $t["No"] ?>">
      <div class="form-group">
        <label for="kd_teknisi" class="control-label col-sm-2">Kode Teknisi :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Kode Teknisi" name="kd_teknisi" No="kd_teknisi" required="" autocomplete="off" value="<?= $t["kd_teknisi"]; ?>">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="nama_teknisi" class="control-label col-sm-2">Nama Teknisi :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Nama Teknisi" name="nama_teknisi" No="nama_teknisi" required="" autocomplete="off" value="<?= $t["nama_teknisi"]; ?>">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="alamat_teknisi" class="control-label col-sm-2">Alamat Teknisi :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Alamat Teknisi" name="alamat_teknisi" No="alamat_teknisi" autocomplete="off" value="<?= $t["alamat_teknisi"]; ?>">
          <br>
        </div>
      </div>
      <div class="form-group">
        <label for="no_tlp" class="control-label col-sm-2">Telp :</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" placeholder="Telp" name="no_tlp" No="no_tlp" autocomplete="off" value="<?= $t["no_tlp"]; ?>">
          <br>
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