<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Naive Bayes Classifier</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Input Dokumen Uji</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <form action="?page=testing" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Judul Buku</label>
                                <textarea class="form-control" name="judul" autocomplete="OFF" placeholder="isikan judul buku ..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="submit" name="submit" class="btn btn-primary" value="Proses">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_POST['submit'])){?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Text Preprocessing (Tokenizing, Filtering, Stemming)</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <?php 
            
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

                $pertanyaan = $_POST['judul'];
                $tokenizing = explode(' ', $pertanyaan);
                $filtering = textPreprocessing($pertanyaan);
                $filteringex = explode(' ', $filtering);
                $stemming = $stemmer->stem($filtering);
                $query = explode(' ', $stemming);
            
            ?>
            <div class="col-sm-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2">Judul Dokumen</th>
                                    <th colspan="3">Hasil</th>
                                </tr>
                                <tr>
                                    <th>Tokenizing</th>
                                    <th>Filtering</th>
                                    <th>Stemming</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $pertanyaan ?></td>
                                    <td>
                                    <?php
                                        foreach($tokenizing as $row){
                                            echo '<label class="badge badge-warning" style="margin-right:5px;">'.$row.'</label>';
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                        foreach($filteringex as $row){
                                            echo '<label class="badge badge-primary" style="margin-right:5px;">'.$row.'</label>';
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php
                                        foreach($query as $row){
                                            echo '<label class="badge badge-success" style="margin-right:5px;">'.$row.'</label>';
                                        }
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Proses Term Frequency (TF)</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <?php 

                $q = mysqli_query($conn, "SELECT * FROM tbl_buku
                                        JOIN tbl_kategori ON tbl_buku.id_kategori=tbl_kategori.id_kategori 
                                        GROUP BY tbl_buku.id_kategori");
                while($d = mysqli_fetch_array($q)){
                    $touch['kategori'] = $d['id_kategori'];
                    $touch['nama_kategori'] = $d['nama_kategori'];
                    $kategori[] = $touch;
                }

                $sql = mysqli_query($conn, "SELECT * FROM tbl_buku");
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
                while($data4 = mysqli_fetch_array($sql4)){
                    $isi4 = explode(" ", $data4['stemming']);
                    $put4['id'] = $data4['id_buku'];
                    $put4['stem'] = $isi4;
                    array_push($arrDoc4,$put4);
                    $arrTerm4 = array_merge($arrTerm4, $isi4);
                }
                    $arrTerm4 = array_unique($arrTerm4);
                    $arrTerm4 = array_values($arrTerm4);
                
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

                    foreach($allnbc as $row){
                        array_push($ratenbc,$row['final']);
                    }

                    $ratemax = max($ratenbc);
                    $ratemaxget = array_search($ratemax,$ratenbc);

                ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">Dokumen</th>
                                <th colspan="<?= count($arrTerm) ?>">Term</th>
                            </tr>
                            <tr>
                                <?php 
                                for($x=0;$x<count($arrTerm);$x++){
                                    echo '<th><label class="badge badge-secondary">'.$arrTerm[$x].'</label></th>';
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                for($r=0;$r<count($arrDoc1);$r++){
                                    echo '<tr>';
                                    echo '<td class="k1"><label class="badge badge-secondary">'.$arrDoc1[$r]['id'].'</label></td>';
                                    for($t=0;$t<count($arrTerm);$t++){
                                        if ($isitf1[$t][$r]>0){
                                            echo '<td class="k1"><label class="badge badge-secondary">'.$isitf1[$t][$r].'</label></td>';
                                        } else {
                                            echo '<td class="k1">'.$isitf1[$t][$r].'</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                                for($r=0;$r<count($arrDoc2);$r++){
                                    echo '<tr>';
                                    echo '<td class="k2"><label class="badge badge-secondary">'.$arrDoc2[$r]['id'].'</label></td>';
                                    for($t=0;$t<count($arrTerm);$t++){
                                        if ($isitf2[$t][$r]>0){
                                            echo '<td class="k2"><label class="badge badge-secondary">'.$isitf2[$t][$r].'</label></td>';
                                        } else {
                                            echo '<td class="k2">'.$isitf2[$t][$r].'</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                                for($r=0;$r<count($arrDoc3);$r++){
                                    echo '<tr>';
                                    echo '<td class="k3"><label class="badge badge-secondary">'.$arrDoc3[$r]['id'].'</label></td>';
                                    for($t=0;$t<count($arrTerm);$t++){
                                        if ($isitf3[$t][$r]>0){
                                            echo '<td class="k3"><label class="badge badge-secondary">'.$isitf3[$t][$r].'</label></td>';
                                        } else {
                                            echo '<td class="k3">'.$isitf3[$t][$r].'</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                                for($r=0;$r<count($arrDoc4);$r++){
                                    echo '<tr>';
                                    echo '<td class="k4"><label class="badge badge-secondary">'.$arrDoc4[$r]['id'].'</label></td>';
                                    for($t=0;$t<count($arrTerm);$t++){
                                        if ($isitf4[$t][$r]>0){
                                            echo '<td class="k4"><label class="badge badge-secondary">'.$isitf4[$t][$r].'</label></td>';
                                        } else {
                                            echo '<td class="k4">'.$isitf4[$t][$r].'</td>';
                                        }
                                    }
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td rowspan="6">Total Kata</td>
                            </tr>
                            <tr>
                                <td>Kelas</td>
                                <?php 
                                for ($p=0;$p<count($arrTerm);$p++){
                                    echo '<td><label class="badge badge-secondary">'.$arrTerm[$p].'</label></td>';
                                }
                                ?>
                                <td>Total</td>
                            </tr>
                            <tr>
                                <td class="k1"><label class="badge badge-secondary">A1</label></td>
                                <?php 
                                for ($p=0;$p<count($df1);$p++){
                                    if ($df1[$p]>0){
                                        echo '<td class="k1"><label class="badge badge-secondary">'.$df1[$p].'</label></td>';
                                    } else {
                                        echo '<td class="k1">'.$df1[$p].'</td>';
                                    }
                                    
                                }
                                    echo '<td class="k1"><label class="badge badge-secondary">'.$sumdf1.'</label></td>';
                                ?>

                            </tr>
                            <tr>
                                <td class="k2"><label class="badge badge-secondary">A2</label></td>
                                <?php 
                                for ($p=0;$p<count($df2);$p++){
                                    if ($df2[$p]>0){
                                        echo '<td class="k2"><label class="badge badge-secondary">'.$df2[$p].'</label></td>';
                                    } else {
                                        echo '<td class="k2">'.$df2[$p].'</td>';
                                    }
                                    
                                }
                                    echo '<td class="k2"><label class="badge badge-secondary">'.$sumdf2.'</label></td>';
                                ?>
                            </tr>
                            <tr>    
                                <td class="k3"><label class="badge badge-secondary">A3</label></td>
                                <?php 
                                for ($p=0;$p<count($df3);$p++){
                                    if ($df3[$p]>0){
                                        echo '<td class="k3"><label class="badge badge-secondary">'.$df3[$p].'</label></td>';
                                    } else {
                                        echo '<td class="k3">'.$df3[$p].'</td>';
                                    }
                                    
                                }
                                    echo '<td class="k3"><label class="badge badge-secondary">'.$sumdf3.'</label></td>';
                                ?>
                            </tr>
                            <tr>    
                                <td class="k4"><label class="badge badge-secondary">A4</label></td>
                                <?php 
                                for ($p=0;$p<count($df4);$p++){
                                    if ($df4[$p]>0){
                                        echo '<td class="k4"><label class="badge badge-secondary">'.$df4[$p].'</label></td>';
                                    } else {
                                        echo '<td class="k4">'.$df4[$p].'</td>';
                                    }
                                    
                                }
                                    echo '<td class="k4"><label class="badge badge-secondary">'.$sumdf4.'</label></td>';
                                ?>
                            </tr>
                            <tr>
                                <td style="background:#e3e6f0;" colspan="<?= count($arrTerm)+2 ?>"></td>
                                <td><label class="badge badge-secondary"><?= $sumalldf ?></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Proses Menghitung Probabilitas setiap kata pada setiap kelas</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <?php foreach($arr as $key){ ?>
                        <div class="col-md-3">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th colspan="2"><?= $key['text'] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Pr(<?= $key['text'] ?>|A1)</td>
                                            <td><label class="badge badge-primary"><?= $key['nilai']['pr_a1'] ?></label></td>
                                        </tr>
                                        <tr>
                                            <td>Pr(<?= $key['text'] ?>|A2)</td>
                                            <td><label class="badge badge-primary"><?= $key['nilai']['pr_a2'] ?></label></td>
                                        </tr>
                                        <tr>
                                            <td>Pr(<?= $key['text'] ?>|A3)</td>
                                            <td><label class="badge badge-primary"><?= $key['nilai']['pr_a3'] ?></label></td>
                                        </tr>
                                        <tr>
                                            <td>Pr(<?= $key['text'] ?>|A4)</td>
                                            <td><label class="badge badge-primary"><?= $key['nilai']['pr_a4'] ?></label></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Proses Perhitungan Naive Bayes Classifier dan Hasil Kategori</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="<?= count($query)+1 ?>">Probabilitas Dokumen Uji terhadap Kelas A1, A2, A3, A4</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach($allnbc as $row){
                                    echo '<tr>';
                                    echo '<td>'.$row['text'].'</td>';
                                    foreach($row['hitung'] as $val){
                                        echo '<td>'.$val['text'].'<br><label class="badge badge-'.$val['label'].'">'.$val['value'].'</label></td>';
                                    }
                                    echo '<td><label class="badge badge-success">'.$row['final'].'</label></td>';
                                    echo '</tr>';
                                }
                                ?>
                                <tr>
                                    <td colspan="<?= count($query)+2 ?>">Hasil Perhitungan dari Naive Bayes Classifier menetapkan judul <strong>"<?= $pertanyaan ?>"</strong>
                                    Masuk dalam Kategori <label class="badge badge-info" style="margin-right:5px;"><?= $kategori[$ratemaxget]['kategori'] ?> </label><label class="badge badge-success"><?= $kategori[$ratemaxget]['nama_kategori'] ?></label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>