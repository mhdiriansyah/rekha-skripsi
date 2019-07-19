<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

//stemming
$stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
$stemmer = $stemmerFactory->createStemmer();

// tokenizing
$tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
$tokenizer = $tokenizerFactory->createDefaultTokenizer();

$user = $_SESSION['id'];

$q = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user=$user");
$userdata = mysqli_fetch_array($q);

function textPreprocessing($params){
    
    // casefolding & tokenizing
    $stem1 = preg_replace('/[^A-Za-z0-9\ ]/', '', strtolower($params));
    $stem2 = preg_split('/\s+/', $stem1);
    $unique = array_unique($stem2);
    $judul = array_values($unique);

    // filtering
    $arrJudul = [];
    $filtering = explode("\n", file_get_contents('../assets/lib/stopword.txt'));
    foreach($judul as $row){
        if (in_array($row,$filtering) !== TRUE){
            array_push($arrJudul,$row);
        }
    }
    $implode = implode(' ', $arrJudul);
    return $implode;
}

function getDateNow() {
    $tz_object = new DateTimeZone('Asia/Jakarta');
    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);
    return $datetime->format('m/d/Y');
}

function emailReminder($id,$email,$nama,$enddate,$idbuku,$judul){
    include "../assets/lib/koneksi.php";

    $get    = mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE id_pinjaman=$id");
    $data   = mysqli_fetch_array($get);

    if ($data['status_pinjaman'] != 1 && $data['notif_email'] != 1){ 
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

function statusNotifEmail($params){
    $val = "";
    switch($params){
        case 0:
            $val = '<label class="badge badge-warning">belum terkirim</label>';
            break;
        default:
            $val = '<label class="badge badge-primary">sudah terkirim</label>';
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

function jumlahBuku($params,$type){
    if ($params > 0){
        if ($type == 'Y'){ 
            $str = $params." Buku";
        } else {
            $str = $params;
        }
    } else {
        if ($type == 'Y'){
            $str = "stok belum tersedia";
        } else {
            $str = 0;
        }
    }
    return $str;
}

function jumlahBukuPinjam($params){
    include "../assets/lib/koneksi.php";
    $sql = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tbl_peminjaman WHERE id_buku='$params' AND status_pinjaman=0"));
    return $sql;
}


function tanggal($params){
    if (!empty($params)){
        $tgl = date('d M Y',strtotime($params));
    } else {
        $tgl = '<label class="badge badge-info">belum ada tanggal</label>';
    }
    return $tgl;
}

function convertRupiah($params){
	$val = "Rp " . number_format($params,2,'.',',');
	return $val;
}

function dendaKeterangan(){
    include "../assets/lib/koneksi.php";
    $sql = mysqli_query($conn, "SELECT * FROM tbl_denda");
    $data = mysqli_fetch_array($sql);

    $val = "Jangan sampai ketingalan dalam mengembalikan buku kepada Admin Perpustakaan karena jika telat akan dikenakan sanksi dengan membayarkan denda sebesar ".convertRupiah($data['nominal'])." /".$data['durasi']." harinya";
}

function dendaJumlah($id,$tgl1,$tgl2){
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
                mysqli_query($conn, "UPDATE tbl_peminjaman SET denda=1 WHERE id_pinjaman=$id");
                $val = '<label class="badge badge-danger">kena denda sebesar '.convertRupiah($denda).'</label>';
            } else {
                $val = '<label class="badge badge-success">tidak ada denda</label>';
            }
    } else {
        $val = '<label class="badge badge-info">belum memiliki denda</label>';
    }
    return $val;
}

function jumlahKategoriBuku($params){
    include "../assets/lib/koneksi.php";
    $val = "";
    $data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='$params'"));
    if($data > 0){
        $val = '<label class="badge badge-success">'.$data.' Buku</label>';
    } else {
        $val = '<label class="badge badge-warning">belum ada buku</label>';
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

function imgBuku($params){
    if (!empty($params)){
        $temp = '<img class="img-thumbnail" src="../assets/img/buku/'.$params.'"/>';
    } else {
        $temp = '<img class="img-thumbnail" src="../assets/img/no-book.png"/>';
    }
    return $temp;
}