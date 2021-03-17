<?php 
require 'functions.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$no = $_GET['No'];

if( hapusTeknisi($no) > 0 ) {
	echo "
        <script>
          alert('teknisi berhasil dihapus!');
          document.location.href = 'teknisi.php';
        </script>
    ";
} else {
	echo "
        <script>
          alert('teknisi gagal dihapus!');
          document.location.href = 'teknisi.php';
        </script>
    ";
}
?>