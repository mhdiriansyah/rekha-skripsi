<?php 

// get userdata when login
$id     = $_SESSION['id'];
$role   = $_SESSION['role'];
if ($role == 1){
    $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim='$id'");
    $userdata = mysqli_fetch_array($q);
} else {
    $q = mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE nip='$id'");
    $userdata = mysqli_fetch_array($q);
}

//url img
if ($role == 1){
    ($userdata['img_mhs']!=NULL)?$img='../assets/img/mahasiswa/'.$userdata['img_mhs']:$img='../assets/img/no-photo.png';
} else {
    ($userdata['img_dosen']!=NULL)?$img='../assets/img/dosen/'.$userdata['img_dosen']:$img='../assets/img/no-photo.png';
}

function getDateNow() {
    $tz_object = new DateTimeZone('Asia/Jakarta');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('m/d/Y');
}

function jumlahPeminjaman($role,$id,$params){
    include "../assets/lib/koneksi.php";
    if ($role == 1){
        switch ($params) {
            case 'selesai':
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE nim='$id' AND status_pinjaman=1"));
                break;
            default:
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE nim='$id' AND status_pinjaman=0"));
                break;
        }
    } else {
        switch ($params) {
            case 'selesai':
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE nip='$id' AND status_pinjaman=1"));
                break;
            default:
                $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE nip='$id' AND status_pinjaman=0"));
                break;
        }
    }
    return $data;
}

function tanggal($params){
    if (!empty($params)){
        $tgl = date('d M Y',strtotime($params));
    } else {
        $tgl = '<label class="badge badge-info">belum ada tanggal</label>';
    }
    return $tgl;
}

function statusPeminjaman($params,$tgl){
    $val = "";
    switch ($params) {
        case 0:
            $val = '<label class="badge badge-primary">dipinjam</label>';
            $date1 = new DateTime(getDateNow());
            $date2 = new DateTime($tgl);
            $diff = $date1->diff($date2);
            if ($date1 < $date2){
                $val .= '<label class="badge badge-warning">berakhir dalam '.$diff->d.' hari lagi</label>';
            } else if ($date1 == $date2){
                $val .= '<label class="badge badge-warning">berakhir hari ini</label>';
            } else if ($date1 > $date2){
                $val .= '<label class="badge badge-warning">sudah berakhir '.$diff->d.' hari yang lalu</label>';
            }
            break;
        default:
            $val = '<label class="badge badge-info">selesai</label>';
            break;
    }
    return $val;
}

function statusKeterangan($params){
    $val = "";
    if (!empty($params)) {
        $val = '<div class="row"><div class="col-md-12"><div class="card bg-success text-white"><div class="card-body">'.$params.'</div></div></div></div>';
    } else {
        $val = '<div class="row"><div class="col-md-12"><div class="card bg-warning text-white"><div class="card-body">tidak ada keterangan</div></div></div></div>';
    }
    return $val;
}

function jumlahBuku($params){
    include "../assets/lib/koneksi.php";
    $sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_peminjaman WHERE id_buku='$params' AND status_pinjaman=0"));
    return $sql;
}

function stokBuku($a){
    if ($a > 0){
        $str = $a." Buku";
    } else {
        $str = "stok belum tersedia";
    }
    return $str;
}

function convertRupiah($params){
	$val = "Rp " . number_format($params,2,'.',',');
	return $val;
}

function dendaKeterangan(){
    include "../assets/lib/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_denda");
    $data = mysqli_fetch_array($sql);
    $val = "Jangan sampai ketingalan dalam mengembalikan buku kepada Admin Perpustakaan karena jika telat akan dikenakan sanksi dengan membayarkan denda sebesar <b><u>".convertRupiah($data['nominal'])." /".$data['durasi']." hari keterlambatan</u></b>";
    return $val;
}

function dendaJumlah($tgl1,$tgl2){
    $val = "";
    include "../assets/lib/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_denda");
    $data = mysqli_fetch_array($sql);

    if (!empty($tgl1) && !empty($tgl2)){
        $date1 = new DateTime($tgl1);
        $date2 = new DateTime($tgl2);
        $diff = $date1->diff($date2);

            if ($date1 > $date2){
                $denda = ($diff->d*$data['nominal']);
                $val = '<label class="badge badge-danger">kena denda sebesar '.convertRupiah($denda).'</label>';
            } else {
                $val = '<label class="badge badge-success">tidak ada denda</label>';
            }
    } else {
        $val = '<label class="badge badge-info">belum memiliki denda</label>';
    }
    return $val;
}

function labelKategori($params){
    include "../assets/lib/koneksi.php";
    $val = "";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_kategori WHERE id_kategori='$params'");
    $data = mysqli_fetch_array($sql);
    $val = '<label class="badge badge-info">'.$data['nama_kategori'].'</label>';
    return $val;
}