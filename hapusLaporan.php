<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
    echo "<script>
				  alert('login terlebih dahulu!');
				  document.location.href = 'login.php';
			  </script>";
}

require 'functions.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$no = $_GET['No'];

if (hapusLaporan($no) > 0) {
    echo "
        <script>
          alert('Laporan Kerusakan Alat Medis berhasil berhasil dihapus!');
          document.location.href = 'laporan.php';
        </script>
    ";
} else {
    echo "
        <script>
          alert('Laporan Kerusakan Alat Medis gagal dihapus!');
          document.location.href = 'laporan.php';
        </script>
    ";
}
