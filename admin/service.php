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
                mysqli_query($conn, "UPDATE tbl_peminjaman SET denda=$denda WHERE id_pinjaman=$id");
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

function naiveBayes($params){
    include "../assets/lib/koneksi.php";
    $kategori = [];
    $arrTerm = [];
    $arrTerm1 = [];
    $arrTerm2 = [];
    $arrTerm3 = [];
    $arrTerm4 = [];
    $arrDoc = [];
    $arrDoc1 = [];
    $arrDoc2 = [];
    $arrDoc3 = [];
    $arrDoc4 = [];
    $query = explode(' ', $params);
    $q = mysqli_query($conn, "SELECT * FROM tbl_buku
                            JOIN tbl_kategori ON tbl_buku.id_kategori=tbl_kategori.id_kategori 
                            GROUP BY tbl_buku.id_kategori");
    while($d = mysqli_fetch_array($q)){
        $touch['kategori'] = $d['id_kategori'];
        $touch['nama_kategori'] = $d['nama_kategori'];
        $kategori[] = $touch;
    }

    $sql = mysqli_query($conn, "SELECT * FROM tbl_buku");
    $count = mysqli_num_rows($sql);
    while($data = mysqli_fetch_array($sql)){
        $isi = explode(" ", $data['stemming']);
        $put['id'] = $data['id_buku'];
        $put['stem'] = $isi;
        array_push($arrDoc,$put);
        $arrTerm = array_merge($arrTerm, $isi);
    }
        $arrTerm = array_unique($arrTerm);
        $arrTerm = array_values($arrTerm);

    $sql1 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI001'");
    $count1 = mysqli_num_rows($sql1);
    while($data1 = mysqli_fetch_array($sql1)){
        $isi1 = explode(" ", $data1['stemming']);
        $put1['id'] = $data1['id_buku'];
        $put1['stem'] = $isi1;
        array_push($arrDoc1,$put1);
        $arrTerm1 = array_merge($arrTerm1, $isi1);
    }
        $arrTerm1 = array_unique($arrTerm1);
        $arrTerm1 = array_values($arrTerm1);

    $sql2 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI002'");
    $count2 = mysqli_num_rows($sql2);
    while($data2 = mysqli_fetch_array($sql2)){
        $isi2 = explode(" ", $data2['stemming']);
        $put2['id'] = $data2['id_buku'];
        $put2['stem'] = $isi2;
        array_push($arrDoc2,$put2);
        $arrTerm2 = array_merge($arrTerm2, $isi2);
    }
        $arrTerm2 = array_unique($arrTerm2);
        $arrTerm2 = array_values($arrTerm2);

    $sql3 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI003'");
    $count3 = mysqli_num_rows($sql3);
    while($data3 = mysqli_fetch_array($sql3)){
        $isi3 = explode(" ", $data3['stemming']);
        $put3['id'] = $data3['id_buku'];
        $put3['stem'] = $isi3;
        array_push($arrDoc3,$put3);
        $arrTerm3 = array_merge($arrTerm3, $isi3);
    }
        $arrTerm3 = array_unique($arrTerm3);
        $arrTerm3 = array_values($arrTerm3);
    
    $sql4 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI004'");
    $count4 = mysqli_num_rows($sql4);
    while($data4 = mysqli_fetch_array($sql4)){
        $isi4 = explode(" ", $data4['stemming']);
        $put4['id'] = $data4['id_buku'];
        $put4['stem'] = $isi4;
        array_push($arrDoc4,$put4);
        $arrTerm4 = array_merge($arrTerm4, $isi4);
    }
        $arrTerm4 = array_unique($arrTerm4);
        $arrTerm4 = array_values($arrTerm4);
    
    $kali = [
        ($count1/$count),
        ($count2/$count),
        ($count3/$count),
        ($count4/$count),
    ];
    
    $isitf1 = [[]];
    $isitf2 = [[]];
    $isitf3 = [[]];
    $isitf4 = [[]];
    $df1 = [];
    $df2 = [];
    $df3 = [];
    $df3 = [];

    for ($m=0;$m<count($arrTerm);$m++){
        $df1[$m]    = 0;
        $df2[$m]    = 0;
        $df3[$m]    = 0;
        $df4[$m]    = 0;
    }

    for ($a=0;$a<count($arrTerm);$a++){

        for ($b=0;$b<count($arrDoc1);$b++){
            if (in_array($arrTerm[$a],$arrDoc1[$b]['stem'])){
                $isitf1[$a][$b] = 1;
                $df1[$a] = $df1[$a]+$isitf1[$a][$b];
            } else {
                $isitf1[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc2);$b++){
            if (in_array($arrTerm[$a],$arrDoc2[$b]['stem'])){
                $isitf2[$a][$b] = 1;
                $df2[$a] = $df2[$a]+$isitf2[$a][$b];
            } else {
                $isitf2[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc3);$b++){
            if (in_array($arrTerm[$a],$arrDoc3[$b]['stem'])){
                $isitf3[$a][$b] = 1;
                $df3[$a] = $df3[$a]+$isitf3[$a][$b];
            } else {
                $isitf3[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc4);$b++){
            if (in_array($arrTerm[$a],$arrDoc4[$b]['stem'])){
                $isitf4[$a][$b] = 1;
                $df4[$a] = $df4[$a]+$isitf4[$a][$b];
            } else {
                $isitf4[$a][$b] = 0;
            }
        }

    }
        $sumdf1 = array_sum($df1);
        $sumdf2 = array_sum($df2);
        $sumdf3 = array_sum($df3);
        $sumdf4 = array_sum($df4);
        $sumalldf = ($sumdf1+$sumdf2+$sumdf3+$sumdf4);
    
    for ($a=0;$a<count($arrTerm);$a++){
        $isian['text'] = $arrTerm[$a];
        $isian['nilai'] = [
            'pr_a1' => round(((1+$df1[$a])/($sumdf1+$sumalldf)),4),
            'pr_a2' => round(((1+$df2[$a])/($sumdf2+$sumalldf)),4),
            'pr_a3' => round(((1+$df3[$a])/($sumdf3+$sumalldf)),4),
            'pr_a4' => round(((1+$df4[$a])/($sumdf4+$sumalldf)),4),
        ];
        $arr[] = $isian;
    }

    $nbc = [];
    $ratenbc = [];
    for ($a=0;$a<count($query);$a++){
        // untuk A1 -----------------
        if (in_array($query[$a],$arrTerm1)){
            $search = array_search($query[$a],$arrTerm);
            $searchGet = $arr[$search]['nilai']['pr_a1'];
            $ku['text'] = 'Pr('.$query[$a].'|A1)';
            $ku['value'] = $searchGet;
            $ku['label'] = 'primary';
        } else {
            $ku['text'] = 'Pr('.$query[$a].'|A1)';
            $ku['value'] = round(((1+0)/($sumdf1+$sumalldf)),4);
            $ku['label'] = 'warning';
        }
            $kuu[] = $ku;
            $kuat = [
                'text' => 'NBC A1',
                'hitung' =>$kuu,
                'final' => array_sum(array_column($kuu, 'value')),
            ];
    }
        $kuar[] = $kuat;

    for ($a=0;$a<count($query);$a++){
        // untuk A2 -----------------
        if (in_array($query[$a],$arrTerm2)){
            $search = array_search($query[$a],$arrTerm);
            $searchGet = $arr[$search]['nilai']['pr_a2'];
            $ku2['text'] = 'Pr('.$query[$a].'|A2)';
            $ku2['value'] = $searchGet;
            $ku2['label'] = 'primary';
        } else {
            $ku2['text'] = 'Pr('.$query[$a].'|A2)';
            $ku2['value'] = round(((1+0)/($sumdf2+$sumalldf)),4);
            $ku2['label'] = 'warning';
        }
            $kuu2[] = $ku2;
            $kuat = [
                'text' => 'NBC A2',
                'hitung' =>$kuu2,
                'final' => array_sum(array_column($kuu2, 'value')),
            ];
    }   
        $kuar[] = $kuat;
    
    for ($a=0;$a<count($query);$a++){
        // untuk A3 -----------------
        if (in_array($query[$a],$arrTerm3)){
            $search = array_search($query[$a],$arrTerm);
            $searchGet = $arr[$search]['nilai']['pr_a3'];
            $ku3['text'] = 'Pr('.$query[$a].'|A3)';
            $ku3['value'] = $searchGet;
            $ku3['label'] = 'primary';
        } else {
            $ku3['text'] = 'Pr('.$query[$a].'|A3)';
            $ku3['value'] = round(((1+0)/($sumdf3+$sumalldf)),4);
            $ku3['label'] = 'warning';
        }
            $kuu3[] = $ku3;
            $kuat = [
                'text' => 'NBC A3',
                'hitung' =>$kuu3,
                'final' => array_sum(array_column($kuu3, 'value')),
            ];
    }   
        $kuar[] = $kuat;
    
    for ($a=0;$a<count($query);$a++){
        // untuk A4 -----------------
        if (in_array($query[$a],$arrTerm4)){
            $search = array_search($query[$a],$arrTerm);
            $searchGet = $arr[$search]['nilai']['pr_a4'];
            $ku4['text'] = 'Pr('.$query[$a].'|A4)';
            $ku4['value'] = $searchGet;
            $ku4['label'] = 'primary';
        } else {
            $ku4['text'] = 'Pr('.$query[$a].'|A4)';
            $ku4['value'] = round(((1+0)/($sumdf4+$sumalldf)),4);
            $ku4['label'] = 'warning';
        }
            $kuu4[] = $ku4;
            $kuat = [
                'text' => 'NBC A4',
                'hitung' =>$kuu4,
                'final' => array_sum(array_column($kuu4, 'value')),
            ];
    }   
        $kuar[] = $kuat;
        $allnbc = $kuar;

        foreach($allnbc as $key => $val){
            array_push($ratenbc,($val['final']*$kali[$key]));
        }

        $ratemax = max($ratenbc);
        $ratemaxget = array_search($ratemax,$ratenbc);

        $ikut['id'] = $kategori[$ratemaxget]['kategori'];
        $ikut['nama'] = $kategori[$ratemaxget]['nama_kategori'];
        $pika[] = $ikut;
        
    return $pika;
}

function naiveBayesSearch($params){
    include "../assets/lib/koneksi.php";
    $kategori = [];
    $arrTerm = [];
    $arrTerm1 = [];
    $arrTerm2 = [];
    $arrTerm3 = [];
    $arrTerm4 = [];
    $arrDoc = [];
    $arrDoc1 = [];
    $arrDoc2 = [];
    $arrDoc3 = [];
    $arrDoc4 = [];

    $query = explode(' ', $params);

    $q = mysqli_query($conn, "SELECT * FROM tbl_buku
                        JOIN tbl_kategori ON tbl_buku.id_kategori=tbl_kategori.id_kategori 
                        GROUP BY tbl_buku.id_kategori");
    while($d = mysqli_fetch_array($q)){
        $touch['kategori'] = $d['id_kategori'];

        $touch['nama_kategori'] = $d['nama_kategori'];
        $kategori[] = $touch;
    }

    $sql = mysqli_query($conn, "SELECT * FROM tbl_buku");
    $count = mysqli_num_rows($sql);
    while($data = mysqli_fetch_array($sql)){
        $isi = explode(" ", $data['stemming']);
        $put['id'] = $data['id_buku'];
        $put['stem'] = $isi;
        array_push($arrDoc,$put);
        $arrTerm = array_merge($arrTerm, $isi);
    }
        $arrTerm = array_unique($arrTerm);
        $arrTerm = array_values($arrTerm);

    $sql1 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI001'");
    $count1 = mysqli_num_rows($sql1);
    while($data1 = mysqli_fetch_array($sql1)){
        $isi1 = explode(" ", $data1['stemming']);
        $put1['id'] = $data1['id_buku'];
        $put1['stem'] = $isi1;
        array_push($arrDoc1,$put1);
        $arrTerm1 = array_merge($arrTerm1, $isi1);
    }
        $arrTerm1 = array_unique($arrTerm1);
        $arrTerm1 = array_values($arrTerm1);

    $sql2 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI002'");
    $count2 = mysqli_num_rows($sql2);
    while($data2 = mysqli_fetch_array($sql2)){
        $isi2 = explode(" ", $data2['stemming']);
        $put2['id'] = $data2['id_buku'];
        $put2['stem'] = $isi2;
        array_push($arrDoc2,$put2);
        $arrTerm2 = array_merge($arrTerm2, $isi2);
    }
        $arrTerm2 = array_unique($arrTerm2);
        $arrTerm2 = array_values($arrTerm2);

    $sql3 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI003'");
    $count3 = mysqli_num_rows($sql3);
    while($data3 = mysqli_fetch_array($sql3)){
        $isi3 = explode(" ", $data3['stemming']);
        $put3['id'] = $data3['id_buku'];
        $put3['stem'] = $isi3;
        array_push($arrDoc3,$put3);
        $arrTerm3 = array_merge($arrTerm3, $isi3);
    }
        $arrTerm3 = array_unique($arrTerm3);
        $arrTerm3 = array_values($arrTerm3);
    
    $sql4 = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='KATEGORI004'");
    $count4 = mysqli_num_rows($sql4);
    while($data4 = mysqli_fetch_array($sql4)){
        $isi4 = explode(" ", $data4['stemming']);
        $put4['id'] = $data4['id_buku'];
        $put4['stem'] = $isi4;
        array_push($arrDoc4,$put4);
        $arrTerm4 = array_merge($arrTerm4, $isi4);
    }
        $arrTerm4 = array_unique($arrTerm4);
        $arrTerm4 = array_values($arrTerm4);
    
    $kali = [
        ($count1/$count),
        ($count2/$count),
        ($count3/$count),
        ($count4/$count),
    ];
    
    $isitf1 = [[]];
    $isitf2 = [[]];
    $isitf3 = [[]];
    $isitf4 = [[]];
    $df1 = [];
    $df2 = [];
    $df3 = [];
    $df3 = [];

    for ($m=0;$m<count($arrTerm);$m++){
        $df1[$m]    = 0;
        $df2[$m]    = 0;
        $df3[$m]    = 0;
        $df4[$m]    = 0;
    }

    for ($a=0;$a<count($arrTerm);$a++){

        for ($b=0;$b<count($arrDoc1);$b++){
            if (in_array($arrTerm[$a],$arrDoc1[$b]['stem'])){
                $isitf1[$a][$b] = 1;
                $df1[$a] = $df1[$a]+$isitf1[$a][$b];
            } else {
                $isitf1[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc2);$b++){
            if (in_array($arrTerm[$a],$arrDoc2[$b]['stem'])){
                $isitf2[$a][$b] = 1;
                $df2[$a] = $df2[$a]+$isitf2[$a][$b];
            } else {
                $isitf2[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc3);$b++){
            if (in_array($arrTerm[$a],$arrDoc3[$b]['stem'])){
                $isitf3[$a][$b] = 1;
                $df3[$a] = $df3[$a]+$isitf3[$a][$b];
            } else {
                $isitf3[$a][$b] = 0;
            }
        }
        for ($b=0;$b<count($arrDoc4);$b++){
            if (in_array($arrTerm[$a],$arrDoc4[$b]['stem'])){
                $isitf4[$a][$b] = 1;
                $df4[$a] = $df4[$a]+$isitf4[$a][$b];
            } else {
                $isitf4[$a][$b] = 0;
            }
        }

    }
    
    foreach($query as $key => $val){
        if (in_array($val, $arrTerm)){
            $key = array_search($val, $arrTerm);
            $putdf1['text'] = $val;
            $putdf1['value'] = $df1[$key];
            $putdf2['text'] = $val;
            $putdf2['value'] = $df2[$key];
            $putdf3['text'] = $val;
            $putdf3['value'] = $df3[$key];
            $putdf4['text'] = $val;
            $putdf4['value'] = $df4[$key];
        } else {
            $putdf1['text'] = $val;
            $putdf1['value'] = 0;
            $putdf2['text'] = $val;
            $putdf2['value'] = 0;
            $putdf3['text'] = $val;
            $putdf3['value'] = 0;
            $putdf4['text'] = $val;
            $putdf4['value'] = 0;
        }
            $finaldf1[] = $putdf1;
            $finaldf2[] = $putdf2;
            $finaldf3[] = $putdf2;
            $finaldf4[] = $putdf4;
    }

    $sumfinaldf1 = 0;
    $sumfinaldf2 = 0;
    $sumfinaldf3 = 0;
    $sumfinaldf4 = 0;

    foreach($finaldf1 as $values){
        $sumfinaldf1 += $values['value'];
    }

    foreach($finaldf2 as $values){
        $sumfinaldf2 += $values['value'];
    }

    foreach($finaldf3 as $values){
        $sumfinaldf3 += $values['value'];
    }

    foreach($finaldf4 as $values){
        $sumfinaldf4 += $values['value'];
    }

    $prob1 = ($sumfinaldf1/$count);
    $prob2 = ($sumfinaldf2/$count);
    $prob3 = ($sumfinaldf3/$count);
    $prob4 = ($sumfinaldf4/$count);

    $nilSearch = [
        ($prob1*$kali[0]),
        ($prob2*$kali[1]),
        ($prob3*$kali[2]),
        ($prob4*$kali[3]),
    ];

    $jumlah = array_sum($nilSearch);
    $max = max($nilSearch);
    $myKey = array_search($max,$nilSearch);

    $result['id'] = $kategori[$myKey]['kategori'];
    $result['nama'] = $kategori[$myKey]['nama_kategori'];
    $result['nilai'] = $jumlah;
    $finalResult[] = $result;
    return $finalResult;
}