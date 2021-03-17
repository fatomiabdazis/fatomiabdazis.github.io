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
    if (tambahLaporan($_POST) > 0) {
        echo "
        <script>
          alert('Laporan Kerusakan Alat Medis berhasil ditambahkan!');
          document.location.href = 'laporan.php';
        </script>
    ";
    } else {
        echo "
        <script>
          alert('Laporan Kerusakan Alat Medis gagal ditambahkan!');
          document.location.href = 'laporan.php';
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
        .btn-primary,
        .btn-danger {
            margin-left: 20px;
            margin-top: 10px;
        }
    </style>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Laporan Kerusakan Alat Medis</title>

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
        <h3>Laporan Kerusakan Alat Medis</h3>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="tanggal_laporan" class="control-label col-sm-3">Tanggal Pelaporan :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Tanggal Pelaporan" name="tanggal_laporan" No="tanggal_laporan" required="" autofocus="" autocomplete="off">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="lokasi" class="control-label col-sm-3">Lokasi Alat :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Lokasi Alat" name="lokasi" No="lokasi" required="" autocomplete="off">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="nama_alat" class="control-label col-sm-3">Nama Alat :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Nama Alat" name="nama_alat" No="nama_alat" autocomplete="off">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="sn" class="control-label col-sm-3">S/N :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="S/N" name="sn" No="sn" autocomplete="off">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="merk" class="control-label col-sm-3">Merk :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Merk" name="merk" No="merk" autocomplete="off">
                    <br>
                </div>
            </div>
            <div class="form-group">
                <label for="keluhan" class="control-label col-sm-3">Keluhan :</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Keluhan" name="keluhan" No="keluhan" autocomplete="off">
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