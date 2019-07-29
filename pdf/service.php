<?php 

$datapelanggan = mysqli_query($conn,"SELECT * FROM tbl_pelanggan");
$rowpelanggan = [];
while($data = mysqli_fetch_assoc($datapelanggan)) {
    $rowpelanggan[] = $data;
}
json_encode($rowpelanggan); 

function tgl_indo($date){
    if ($date == NULL){
        $temp ='<div class="badge badge-danger">Tanggal belum ada</div>';
    } else {
        $tanggal = date('Y-m-d', strtotime($date));
        $bulan = array (1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $split = explode('-', $tanggal);
        $temp = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    return $temp;
}

function durasi($tgl1,$tgl2){
    $datetime1 = new DateTime($tgl1);
    $datetime2 = new DateTime($tgl2);
    $interval = $datetime1->diff($datetime2);
    $day = (int) $interval->format('%d');
    $hour = (int) $interval->format('%H');
    
    if ($day>0 && $hour>0){
        $temp = $day.' Hari, '.$hour.' Jam';
    } else if ($day>0 && $hour==0) {
        $temp = $day.' Hari';
    } else {
        $temp = $hour.' Jam';
    }
    return $temp;
}