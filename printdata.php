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
    <div style="font-size: 20px">Data Alat Medis</div>
</div>

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 17px; margin-left: 10px">&nbsp; Tanggal Print: ' . date("d-m-Y") . '</div>
<br>

<table width="100%">
    <thead>
        <tr>
            <th width="1%">No</th>
            <th width="5%">Nama Alat</th>
            <th width="5%">Merk</th>
            <th width="2%">S/N</th>
            <th width="5%">Jenis</th>
            <th width="5%">Distributor</th>
            <th width="7%">Tanggal Pengadaan</th>
            <th width="7%">Tanggal Penerimaan</th>
            <th width="5%">Ruangan</th>
        </tr>';

$m_alat = mysqli_query($conn, "SELECT * FROM m_alat WHERE No = No ORDER BY No DESC");
$i = 1;
while ($a = mysqli_fetch_array($m_alat)) {
    $html .= '

            <tr>
                <td align="center">' . $i . '</td>
                <td>' . $a["nama_alat"] . '</td>
                <td>' . $a["merk_alat"] . '</td>
                <td align="center">' . $a["sn_alat"] . '</td>
                <td>' . $a["jenis_alat"] . '</td>
                <td>' . $a["distributor_alat"] . '</td>
                <td align="center">' . $a["tgl_pengadaan"] . '</td>
                <td align="center">' . $a["tgl_penerimaan"] . '</td>
                <td>' . $a["ruangan_alat"] . '</td>
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
$dompdf->stream("dataalat.pdf", array("Attachment" => 0));
