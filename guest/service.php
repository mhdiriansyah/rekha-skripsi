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

function statusAcc($params){
    $val = "";
    switch($params){
        case 1:
            $val = '<label class="badge badge-success">sudah acc</label>';
        break;
        default:
            $val = '<label class="badge badge-warning">belum acc </label>';
        break;
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

function emailReminder($id,$email,$nama,$enddate,$idbuku,$judul){
    include "../assets/lib/koneksi.php";

    $get    = mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE id_pinjaman=$id");
    $data   = mysqli_fetch_array($get);

    if ($data['status_pinjaman'] != 1 && $data['notif_email'] != 1 && $data['acc'] != 0){ 
        $date1  = new DateTime(getDateNow());
        $date2  = new DateTime($enddate);
        $diff   = $date1->diff($date2);
        if ($date1 < $date2){
            if ($diff->d == 1){
                $abx = "codefive65@gmail.com";
                $bxx = "Pace1996";

                //Recipients
                $to['email'] = $email;
                $to['name'] = $nama."-".$email;

                $mail = new PHPMailer;
                $mail->isSMTP();                                      
                $mail->SMTPAuth = true;                                               
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 465;
                $mail->Username = $abx;                 
                $mail->Password = $bxx;                           
                $mail->SMTPSecure = 'ssl';
                $mail->From = $abx;
                $mail->FromName = "Perpustakaan Uncen";
                $mail->AddReplyTo($abx,"Perpustakaan Uncen");
                $mail->AddAddress($to['email'],$to['name']);               
                $mail->Priority = 1;
                $mail->AddCustomHeader("X-MSMail-Priority: High");
                $mail->WordWrap = 50;  
                
                //Content
                $mail->isHTML(true);
                $mail->AddEmbeddedImage('../img/logo_uncen.png', 'logo');
                $bodyContent = "<div style='background-color:#ffffff;margin:auto;width:80%;border:20px solid #e8e8e8;'>";
                $bodyContent .= "<div style='background-color:#00a65a;height:80px;padding:5px;overflow:hidden;'>";
                $bodyContent .= "<img style='float:left;margin:5px;' src='cid:logo' width='10%'><br/>";
                $bodyContent .= "</div>";
                $bodyContent .= "<div style='padding:10px;'>";
                $bodyContent .= "<p>Kepada sdra/i <b>$nama</b></p>";
                $bodyContent .= "<p>Kami ingin menginformasikan kepada anda bahwa masa peminjaman buku anda akan berakhir dalam <b> ".$diff->d." hari Lagi</b> yaitu tepat pada hari besok tanggal <b>".date('d M Y',strtotime($enddate))."</b>.";
                $bodyContent .= "<table border='0' cellspacing='0' style='margin-left:20px;'>";
                $bodyContent .= "<tr style='background-color:#f2f2f2;border-radius:5px;'><td><b>ID Buku</b></td><td>: $idbuku</td></tr>";
                $bodyContent .= "<tr><td><b>Judul Buku</b></td><td>: $judul</td></tr>";
                $bodyContent .= "</table><p>Terima kasih</p></div>";
                $bodyContent .= "<div style='background-color:#f2f2f2;height:50px;padding:10px;margin-top:10px;'>";
                $bodyContent .= "<div style='color:#d2d2d2;text-align:center;'><p>Perpustakaan Universitas Cenderawasih, Jayapura - Papua, Indonesia</p></div>";
                $bodyContent .= "</div></div>";

                $mail->Subject = 'Pemberitahuan - Masa peminjaman buku perpustakaan F-MIPA Universitas Cenderawasih';
                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    $err = 'Message could not be sent,';
                    $err .= 'Mailer Error: ' . $mail->ErrorInfo;
                }
                $mail->ClearAddresses();
                
                mysqli_query($conn, "UPDATE tbl_peminjaman SET notif_email=1 WHERE id_pinjaman=$id");
                echo "<meta http-equiv='refresh' content='1;
                url=?page=peminjaman'>";
            }
        }
    }    
}