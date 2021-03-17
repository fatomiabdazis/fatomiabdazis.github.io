<?php
require 'functions.php';

require 'vendor/autoload.php';

// // reference the Dompdf namespace
use Dompdf\Dompdf;

$html = '
<style>
    table,
    thead,
    tr,
    th,
    td {
        font-size: 12px;
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<div style="margin-left: 20px">
    <div style="font-size: 18px">Sistem Inventarisasi Dan Pemeliharaan Alat Medis</div>
    <div style="font-size: 20px">Data Jadwal Pemeliharaan</div>
</div>

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 17px; margin-left: 10px">&nbsp; Tanggal Print: ' . date("d-m-Y") . '</div>
<br>

<table width="100%">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th width="5%">Merk</th>
            <th width="5%">S/N</th>
            <th width="2%">Nama Alat</th>
            <th width="5%">Jenis Pemeliharaan</th>
            <th width="5%">Jadwal Pemeliharaan</th>
            <th width="7%">Tanggal Pelaksanaan</th>
            <th width="7%">Status</th>
            <th width="5%">Nama Teknisi</th>
        </tr>';

$jadwal = mysqli_query($conn, "SELECT * FROM jadwal_pemeliharaan WHERE No = No ORDER BY No DESC");
$i = 1;
while ($j = mysqli_fetch_array($jadwal)) {
    $html .= '

            <tr>
                <td align="center">' . $i . '</td>
                <td>' . $j["kode_alat"] . '</td>
                <td>' . $j["sn"] . '</td>
                <td align="center">' . $j["nama_alat"] . '</td>
                <td>' . $j["jenispemeliharaan"] . '</td>
                <td>' . $j["jadwal_pemeliharaan"] . '</td>
                <td align="center">' . $j["tanggal"] . '</td>
                <td align="center">' . $j["masalah"] . '</td>
                <td>' . $j["kode_teknisi"] . '</td>
            </tr>
    </thead>';
}
$html .= '
</table>';

// // instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// // Render the HTML as PDF
$dompdf->render();

// // Output the generated PDF to Browser
$dompdf->stream("datajadwal.pdf", array("Attachment" => 0));
