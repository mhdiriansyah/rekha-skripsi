<?php
// menyertakan autoloader
use Dompdf\Dompdf;
require '../vendor/autoload.php';
// menggunakan class dompdf
$dompdf = new Dompdf();
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$html = file_get_contents("http://localhost:81/rekha-skripsi/pdf/report.php?bulan=".$bulan."&tahun=".$tahun);
$dompdf->loadHtml($html);
// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');
// Menjadikan HTML sebagai PDF
$dompdf->render();
// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Codingan",array("Attachment"=>0));