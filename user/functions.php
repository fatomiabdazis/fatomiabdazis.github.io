<?php
// koneksi ke database
$server = "localhost";
$username = "root";
$password = "";
$database = "pemeliharaandb";
$conn = mysqli_connect($server, $username, $password, $database);

function query($query)
{
  global $conn;

  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahDataMerk($merk)
{
  global $conn;

  $kd_merk = htmlspecialchars($merk["kd_merk"]);
  $nama_merk = htmlspecialchars($merk["nama_merk"]);
  $ket = htmlspecialchars($merk["ket"]);

  $query = "INSERT INTO m_merk VALUES ('','$kd_merk', '$nama_merk', '$ket')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusMerk($no)
{
  global $conn;
  $delete = "DELETE FROM m_merk WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahMerk($merk)
{
  global $conn;

  $no = $merk["No"];
  $kd_merk = htmlspecialchars($merk["kd_merk"]);
  $nama_merk = htmlspecialchars($merk["nama_merk"]);
  $ket = htmlspecialchars($merk["ket"]);

  $query = "UPDATE m_merk SET 
  				kd_merk = '$kd_merk', 
  				nama_merk = '$nama_merk', 
  				ket = '$ket' 
			  WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $query = "SELECT * FROM m_merk WHERE kd_merk LIKE '%$keyword%' OR nama_merk LIKE '%$keyword%'";
  return query($query);
}

function tambahJenisAlat($jenis)
{
  global $conn;

  $kd_jenis = htmlspecialchars($jenis["kd_jenis"]);
  $nama_jenis = htmlspecialchars($jenis["nama_jenis"]);
  $ket = htmlspecialchars($jenis["ket"]);

  $query = "INSERT INTO m_jenis_alat VALUES ('','$kd_jenis', '$nama_jenis', '$ket')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusJenis($no)
{
  global $conn;
  $delete = "DELETE FROM m_jenis_alat WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahJenis($jenis)
{
  global $conn;

  $no = $jenis["No"];
  $kd_jenis = htmlspecialchars($jenis["kd_jenis"]);
  $nama_jenis = htmlspecialchars($jenis["nama_jenis"]);
  $ket = htmlspecialchars($jenis["ket"]);

  $query = "UPDATE m_jenis_alat SET 
          kd_jenis = '$kd_jenis', 
          nama_jenis = '$nama_jenis', 
          ket = '$ket' 
        WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function carijenis($keyword)
{
  $query = "SELECT * FROM m_jenis_alat WHERE kd_jenis LIKE '%$keyword%' OR nama_jenis LIKE '%$keyword%'";
  return query($query);
}

function tambahRuangan($ruangan)
{
  global $conn;

  $kd_ruangan = htmlspecialchars($ruangan["kd_ruangan"]);
  $nama_ruangan = htmlspecialchars($ruangan["nama_ruangan"]);
  $ket = htmlspecialchars($ruangan["ket"]);

  $query = "INSERT INTO m_ruangan VALUES ('','$kd_ruangan', '$nama_ruangan', '$ket')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusRuangan($no)
{
  global $conn;
  $delete = "DELETE FROM m_ruangan WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahRuangan($ruangan)
{
  global $conn;

  $no = $ruangan["No"];
  $kd_ruangan = htmlspecialchars($ruangan["kd_ruangan"]);
  $nama_ruangan = htmlspecialchars($ruangan["nama_ruangan"]);
  $ket = htmlspecialchars($ruangan["ket"]);

  $query = "UPDATE m_ruangan SET
            kd_ruangan = '$kd_ruangan',
            nama_ruangan = '$nama_ruangan',
            ket = '$ket'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cariruangan($keyword)
{
  $query = "SELECT * FROM m_ruangan WHERE kd_ruangan LIKE '%$keyword%' OR nama_ruangan LIKE '%$keyword%'";
  return query($query);
}

function tambahTeknisi($teknisi)
{
  global $conn;

  $kd_teknisi = htmlspecialchars($teknisi["kd_teknisi"]);
  $nama_teknisi = htmlspecialchars($teknisi["nama_teknisi"]);
  $alamat_teknisi = htmlspecialchars($teknisi["alamat_teknisi"]);
  $no_tlp = htmlspecialchars($teknisi["no_tlp"]);

  $query = "INSERT INTO m_teknisi VALUES ('','$kd_teknisi', '$nama_teknisi', '$alamat_teknisi', '$no_tlp')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusTeknisi($no)
{
  global $conn;
  $delete = "DELETE FROM m_teknisi WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahTeknisi($teknisi)
{
  global $conn;

  $no = $teknisi["No"];
  $kd_teknisi = htmlspecialchars($teknisi["kd_teknisi"]);
  $nama_teknisi = htmlspecialchars($teknisi["nama_teknisi"]);
  $alamat_teknisi = htmlspecialchars($teknisi["alamat_teknisi"]);
  $no_tlp = htmlspecialchars($teknisi["no_tlp"]);

  $query = "UPDATE m_teknisi SET
            kd_teknisi = '$kd_teknisi',
            nama_teknisi = '$nama_teknisi',
            alamat_teknisi = '$alamat_teknisi',
            no_tlp = '$no_tlp'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cariteknisi($keyword)
{
  $query = "SELECT * FROM m_teknisi WHERE kd_teknisi LIKE '%$keyword%' OR nama_teknisi LIKE '%$keyword%'";
  return query($query);
}

function tambahDistributor($distributor)
{
  global $conn;

  $kd_distributor = htmlspecialchars($distributor["kd_distributor"]);
  $nama_distributor = htmlspecialchars($distributor["nama_distributor"]);
  $alamat_distributor = htmlspecialchars($distributor["alamat_distributor"]);
  $no_tlp = htmlspecialchars($distributor["no_tlp"]);
  $email = htmlspecialchars($distributor["email"]);
  $ket = htmlspecialchars($distributor["ket"]);

  $query = "INSERT INTO m_distributor VALUES ('', '$kd_distributor', '$nama_distributor', '$alamat_distributor', '$no_tlp', '$email', '$ket')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusDistributor($no)
{
  global $conn;
  $delete = "DELETE FROM m_distributor WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahDistributor($distributor)
{
  global $conn;

  $no = $distributor["No"];
  $kd_distributor = htmlspecialchars($distributor["kd_distributor"]);
  $nama_distributor = htmlspecialchars($distributor["nama_distributor"]);
  $alamat_distributor = htmlspecialchars($distributor["alamat_distributor"]);
  $no_tlp = htmlspecialchars($distributor["no_tlp"]);
  $email = htmlspecialchars($distributor["email"]);
  $ket = htmlspecialchars($distributor["ket"]);

  $query = "UPDATE m_distributor SET
            kd_distributor = '$kd_distributor',
            nama_distributor = '$nama_distributor',
            alamat_distributor = '$alamat_distributor',
            no_tlp = '$no_tlp',
            email = '$email',
            ket = '$ket'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function caridistributor($keyword)
{
  $query = "SELECT * FROM m_distributor WHERE kd_distributor LIKE '%$keyword%' OR nama_distributor LIKE '%$keyword%'";
  return query($query);
}


function carialatmedis($keyword)
{
  $query = "SELECT * FROM m_alat WHERE nama_alat LIKE '%$keyword%' OR merk_alat LIKE '%$keyword%' OR jenis_alat LIKE '%$keyword%' OR ruangan_alat LIKE '%$keyword%'";
  return query($query);
}

function cariJadwal($keyword)
{
  $query = "SELECT * FROM jadwal_pemeliharaan WHERE kode_alat LIKE '%$keyword%' OR jenispemeliharaan LIKE '%$keyword%' OR kode_teknisi LIKE '%$keyword%'";
  return query($query);
}

function tambahPemeliharaan($pemeliharaan)
{
  global $conn;

  $kd_transaksi = htmlspecialchars($pemeliharaan["kd_transaksi"]);
  $sn = htmlspecialchars($pemeliharaan["sn"]);
  $tgl_laporan = htmlspecialchars($pemeliharaan["tgl_laporan"]);
  $jenis_pemeliharaan = htmlspecialchars($pemeliharaan["jenis_pemeliharaan"]);
  $tgl_mulai = htmlspecialchars($pemeliharaan["tgl_mulai"]);
  $tgl_selesai = htmlspecialchars($pemeliharaan["tgl_selesai"]);
  $teknisi = htmlspecialchars($pemeliharaan["teknisi"]);
  $masalah = htmlspecialchars($pemeliharaan["masalah"]);
  $penyebab = htmlspecialchars($pemeliharaan["penyebab"]);
  $tindakan = htmlspecialchars($pemeliharaan["tindakan"]);
  $saran = htmlspecialchars($pemeliharaan["saran"]);

  $query = "INSERT INTO pemeliharaan_alat VALUES ('', '$kd_transaksi', '$sn', '$tgl_laporan', '$jenis_pemeliharaan', '$tgl_mulai', '$tgl_selesai', '$teknisi',  '$masalah', '$penyebab', '$tindakan', '$saran')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusPemeliharaan($no)
{
  global $conn;
  $delete = "DELETE FROM pemeliharaan_alat WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahPemeliharaan($pemeliharaan)
{
  global $conn;

  $no = $pemeliharaan["No"];
  $kd_transaksi = htmlspecialchars($pemeliharaan["kd_transaksi"]);
  $sn = htmlspecialchars($pemeliharaan["sn"]);
  $tgl_laporan = htmlspecialchars($pemeliharaan["tgl_laporan"]);
  $jenis_pemeliharaan = htmlspecialchars($pemeliharaan["jenis_pemeliharaan"]);
  $tgl_mulai = htmlspecialchars($pemeliharaan["tgl_mulai"]);
  $tgl_selesai = htmlspecialchars($pemeliharaan["tgl_selesai"]);
  $teknisi = htmlspecialchars($pemeliharaan["teknisi"]);
  $masalah = htmlspecialchars($pemeliharaan["masalah"]);
  $penyebab = htmlspecialchars($pemeliharaan["penyebab"]);
  $tindakan = htmlspecialchars($pemeliharaan["tindakan"]);
  $saran = htmlspecialchars($pemeliharaan["saran"]);

  $query = "UPDATE pemeliharaan_alat SET
            kd_transaksi = '$kd_transaksi',
            sn = '$sn',
            tgl_laporan = '$tgl_laporan',
            jenis_pemeliharaan = '$jenis_pemeliharaan',
            tgl_mulai = '$tgl_mulai',
            tgl_selesai = '$tgl_selesai',
            teknisi = '$teknisi',
            masalah = '$masalah',
            penyebab = '$penyebab',
            tindakan = '$tindakan',
            saran = '$saran'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function caripemeliharaan($keyword)
{
  $query = "SELECT * FROM pemeliharaan_alat WHERE kd_transaksi LIKE '%$keyword%' OR sn LIKE '%$keyword%' OR jenis_pemeliharaan LIKE '%$keyword%' OR teknisi LIKE '%$keyword%'";
  return query($query);
}

function upload()
{
  $namaFile = $_FILES['file']['name'];
  $ukuranFile = $_FILES['file']['size'];
  $error = $_FILES['file']['error'];
  $tmpName = $_FILES['file']['tmp_name'];

  // cek apakah tidak ada file yang diupload
  if ($error === 4) {
    echo "<script>
          alert('masukan file terlebih dahulu!');
        </script>";
    return false;
  }

  // cek apakah yang diupload adalah file
  $ekstensiFileValid = ['pdf', 'docx', 'jpg', 'jpeg', 'png'];
  $ekstensiFile = explode('.', $namaFile);
  $ekstensiFile = strtolower(end($ekstensiFile));
  if (!in_array($ekstensiFile, $ekstensiFileValid)) {
    echo "<script>
          alert('file yang di upload tidak valid!');
        </script>";
    return false;
  }

  // cek ukuran file terlalu besar
  if ($ukuranFile > 3000000) {
    echo "<script>
          alert('ukuran file yang di upload terlalu besar!');
        </script>";
    return false;
  }

  // lolos pengecekan, file siap diupload
  // generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiFile;

  move_uploaded_file($tmpName, 'file/' . $namaFileBaru);

  return $namaFileBaru;
}

function carilaporan($keyword)
{
  $query = "SELECT * FROM report WHERE lokasi LIKE '%$keyword%' OR nama_alat LIKE '%$keyword%' OR merk LIKE '%$keyword%'";
  return query($query);
}
