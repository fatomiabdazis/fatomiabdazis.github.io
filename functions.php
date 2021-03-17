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

function tambahDataalat($dataAlat)
{
  global $conn;

  $nama_alat = htmlspecialchars($dataAlat["nama_alat"]);
  $merk_alat = htmlspecialchars($dataAlat["merk_alat"]);
  $sn_alat = htmlspecialchars($dataAlat["sn_alat"]);
  $jenis_alat = htmlspecialchars($dataAlat["jenis_alat"]);
  $distributor_alat = htmlspecialchars($dataAlat["distributor_alat"]);
  $tgl_pengadaan = htmlspecialchars($dataAlat["tgl_pengadaan"]);
  $tgl_penerimaan = htmlspecialchars($dataAlat["tgl_penerimaan"]);
  $ruangan_alat = htmlspecialchars($dataAlat["ruangan_alat"]);

  $query = "INSERT INTO m_alat VALUES ('', '$nama_alat', '$merk_alat', '$sn_alat', '$jenis_alat', '$distributor_alat', '$tgl_pengadaan', '$tgl_penerimaan', '$ruangan_alat')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusDataalat($no)
{
  global $conn;
  $delete = "DELETE FROM m_alat WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahDataalat($dataAlat)
{
  global $conn;

  $no = $dataAlat["No"];
  $nama_alat = htmlspecialchars($dataAlat["nama_alat"]);
  $merk_alat = htmlspecialchars($dataAlat["merk_alat"]);
  $sn_alat = htmlspecialchars($dataAlat["sn_alat"]);
  $jenis_alat = htmlspecialchars($dataAlat["jenis_alat"]);
  $distributor_alat = htmlspecialchars($dataAlat["distributor_alat"]);
  $tgl_pengadaan = htmlspecialchars($dataAlat["tgl_pengadaan"]);
  $tgl_penerimaan = htmlspecialchars($dataAlat["tgl_penerimaan"]);
  $ruangan_alat = htmlspecialchars($dataAlat["ruangan_alat"]);

  $query = "UPDATE m_alat SET
            nama_alat = '$nama_alat',
            merk_alat = '$merk_alat',
            sn_alat = '$sn_alat',
            jenis_alat = '$jenis_alat',
            distributor_alat = '$distributor_alat',
            tgl_pengadaan = '$tgl_pengadaan',
            tgl_penerimaan = '$tgl_penerimaan',
            ruangan_alat = '$ruangan_alat'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function carialatmedis($keyword)
{
  $query = "SELECT * FROM m_alat WHERE nama_alat LIKE '%$keyword%' OR merk_alat LIKE '%$keyword%' OR jenis_alat LIKE '%$keyword%' OR ruangan_alat LIKE '%$keyword%'";
  return query($query);
}

function tambahJadwal($jadwal)
{
  global $conn;

  $kode_alat = htmlspecialchars($jadwal["kode_alat"]);
  $sn = htmlspecialchars($jadwal["sn"]);
  $nama_alat = htmlspecialchars($jadwal["nama_alat"]);
  $jenispemeliharaan = htmlspecialchars($jadwal["jenispemeliharaan"]);
  $jadwal_pemeliharaan = htmlspecialchars($jadwal["jadwal_pemeliharaan"]);
  $tanggal = htmlspecialchars($jadwal["tanggal"]);
  $masalah = htmlspecialchars($jadwal["masalah"]);
  $kode_teknisi = htmlspecialchars($jadwal["kode_teknisi"]);

  $query = "INSERT INTO jadwal_pemeliharaan VALUES ('', '$kode_alat', '$sn', '$nama_alat', '$jenispemeliharaan', '$jadwal_pemeliharaan', '$tanggal', '$masalah', '$kode_teknisi')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusJadwal($no)
{
  global $conn;
  $delete = "DELETE FROM jadwal_pemeliharaan WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahJadwal($jadwal)
{
  global $conn;

  $no = $jadwal["No"];
  $kode_alat = htmlspecialchars($jadwal["kode_alat"]);
  $sn = htmlspecialchars($jadwal["sn"]);
  $nama_alat = htmlspecialchars($jadwal["nama_alat"]);
  $jenispemeliharaan = htmlspecialchars($jadwal["jenispemeliharaan"]);
  $jadwal_pemeliharaan = htmlspecialchars($jadwal["jadwal_pemeliharaan"]);
  $tanggal = htmlspecialchars($jadwal["tanggal"]);
  $masalah = htmlspecialchars($jadwal["masalah"]);
  $kode_teknisi = htmlspecialchars($jadwal["kode_teknisi"]);

  $query = "UPDATE jadwal_pemeliharaan SET
            kode_alat = '$kode_alat',
            sn = '$sn',
            nama_alat = '$nama_alat',
            jenispemeliharaan = '$jenispemeliharaan',
            jadwal_pemeliharaan = '$jadwal_pemeliharaan',
            tanggal = '$tanggal',
            masalah = '$masalah',
            kode_teknisi = '$kode_teknisi'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cariJadwal($keyword)
{
  $query = "SELECT * FROM jadwal_pemeliharaan WHERE kode_alat LIKE '%$keyword%' OR jenispemeliharaan LIKE '%$keyword%' OR kode_teknisi LIKE '%$keyword%'";
  return query($query);
}

function tambahDatakalibrasi($kalibrasi)
{
  global $conn;

  $kode = htmlspecialchars($kalibrasi["kode"]);
  $sn = htmlspecialchars($kalibrasi["sn"]);
  $merk = htmlspecialchars($kalibrasi["merk"]);
  $alat = htmlspecialchars($kalibrasi["alat"]);
  $tgl_kalibrasi = htmlspecialchars($kalibrasi["tgl_kalibrasi"]);

  // upload gambar
  $file = upload();
  if (!$file) {
    return false;
  }

  $query = "INSERT INTO kalibrasi VALUES ('', '$kode', '$sn', '$merk', '$alat', '$tgl_kalibrasi', '$file')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusKalibrasi($no)
{
  global $conn;
  $delete = "DELETE FROM kalibrasi WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function ubahKalibrasi($kalibrasi)
{
  global $conn;

  $no = $kalibrasi["No"];
  $kode = htmlspecialchars($kalibrasi["kode"]);
  $sn = htmlspecialchars($kalibrasi["sn"]);
  $merk = htmlspecialchars($kalibrasi["merk"]);
  $alat = htmlspecialchars($kalibrasi["alat"]);
  $tgl_kalibrasi = htmlspecialchars($kalibrasi["tgl_kalibrasi"]);
  $fileLama = htmlspecialchars($kalibrasi["fileLama"]);
  // cek apakah user pilih file baru atau tidak
  if ($_FILES['file']['error'] === 4) {
    $file = $fileLama;
  } else {
    $file = upload();
  }


  $query = "UPDATE kalibrasi SET
            kode = '$kode',
            sn = '$sn',
            merk = '$merk',
            alat = '$alat',
            tgl_kalibrasi = '$tgl_kalibrasi',
            file = '$file'
          WHERE No = $no";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function carikalibrasi($keyword)
{
  $query = "SELECT * FROM kalibrasi WHERE kode LIKE '%$keyword%' OR merk LIKE '%$keyword%' OR alat LIKE '%$keyword%'";
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

function tambahLaporan($laporan)
{
  global $conn;

  $tanggal_laporan = htmlspecialchars($laporan["tanggal_laporan"]);
  $lokasi = htmlspecialchars($laporan["lokasi"]);
  $nama_alat = htmlspecialchars($laporan["nama_alat"]);
  $sn = htmlspecialchars($laporan["sn"]);
  $merk = htmlspecialchars($laporan["merk"]);
  $keluhan = htmlspecialchars($laporan["keluhan"]);

  $query = "INSERT INTO report VALUES ('', '$tanggal_laporan', '$lokasi', '$nama_alat', '$sn', '$merk', '$keluhan')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function hapusLaporan($no)
{
  global $conn;
  $delete = "DELETE FROM report WHERE No = $no";

  mysqli_query($conn, $delete);

  return mysqli_affected_rows($conn);
}

function carilaporan($keyword)
{
  $query = "SELECT * FROM report WHERE lokasi LIKE '%$keyword%' OR nama_alat LIKE '%$keyword%' OR merk LIKE '%$keyword%'";
  return query($query);
}
