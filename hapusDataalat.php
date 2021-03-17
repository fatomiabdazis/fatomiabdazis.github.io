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

if( hapusDataalat($no) > 0 ) {
	echo "
        <script>
          alert('Data Alat Medis berhasil berhasil dihapus!');
          document.location.href = 'dataalat.php';
        </script>
    ";
} else {
	echo "
        <script>
          alert('Data Alat Medis berhasil gagal dihapus!');
          document.location.href = 'dataalat.php';
        </script>
    ";
}
