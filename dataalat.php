<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
  echo "<script>
				  alert('login terlebih dahulu!');
				  document.location.href = 'login.php';
			  </script>";
}

require 'functions.php';
$m_alat  = query("SELECT * FROM m_alat ORDER BY No DESC");

// tombol submit ditekan
if (isset($_POST["carialatmedis"])) {
  $m_alat = carialatmedis($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    .btn-primary,
    .btn-danger {
      margin-left: 20px;
      margin-top: 10px;
    }
  </style>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sistem Inventaris</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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

  <!-- awal kelas table merk -->
  <div class="container" style="margin-left: 260px">
    <div class="input">
      <a href="inputdataalat.php" class="btn btn-primary" style="border-radius: 20px;">Input Data Alat</a>
      <h3>List Data Alat Medis</h3>
      <form class="form-horizontal" action="" method="post">
        <div class="form-group">
          <div class="col-sm-5">
            <input type="text" class="" id="" name="keyword" size="30" autocomplete="off" autofocus="" placeholder="masukan keyword pencarian..">
            <button type="submit" class="btn btn-primary" name="carialatmedis">Submit</button>
          </div>
        </div>
    </div>
    </form>
    <table class="w3-table-all w3-centered table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Alat</th>
          <th>Merk</th>
          <th>S/N</th>
          <th>Jenis</th>
          <th>Distributor</th>
          <th>Tanggal Pengadaan</th>
          <th>Tanggal Penerimaan</th>
          <th>Ruangan</th>
          <th><i class="fas fa-bars" style="width: 30px;"></i></th>
        </tr>
      </thead>

      <?php $i = 1; ?>
      <?php foreach ($m_alat as $a) : ?>
        <tr>
          <td><?= $i; ?></td>
          <td><?= $a["nama_alat"]; ?></td>
          <td><?= $a["merk_alat"]; ?></td>
          <td><?= $a["sn_alat"]; ?></td>
          <td><?= $a["jenis_alat"]; ?></td>
          <td><?= $a["distributor_alat"]; ?></td>
          <td><?= $a["tgl_pengadaan"]; ?></td>
          <td><?= $a["tgl_penerimaan"]; ?></td>
          <td><?= $a["ruangan_alat"]; ?></td>
          <td>
            <a href="ubahDataalat.php?No=<?= $a['No']; ?>"><i class="fas fa-cog" style="color:grey"></i></a>
            <br>
            <a href="hapusDataalat.php?No=<?= $a['No']; ?>" onclick="return confirm('apakah anda yakin?')"><i class="fas fa-trash-alt" style="color: red;"></i></a>
          </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </table>
    <a href="printdata.php" class="btn btn-success" style="border-radius: 20px;" target="blank"><i class="fas fa-print" style="font-size: 25px;"> Print</i></a>
  </div>
  <!-- akhir kelas table merk -->



  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>