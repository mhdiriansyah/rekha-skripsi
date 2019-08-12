<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Data Training Buku</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                
                if(isset($_POST['submit'])){
                    $idbuku     = $_POST['id_buku'];
                    $judul      = $_POST['judul'];
                    $penerbit   = $_POST['penerbit'];
                    $pengarang  = $_POST['pengarang'];
                    $catatan    = addslashes($_POST['catatan']);
                    $tahun      = $_POST['tahun'];
                    $stok       = $_POST['stok'];
                    $datenow    = date('Y-m-d H:i:s');
                    $gege       = textPreprocessing($judul);
                    $catatan_s  = $stemmer->stem($gege);
                    $final      = naiveBayes($catatan_s);
                    $good       = $final[0]['id'];
                    
                    $nama_img   = $_FILES['buku']['name'];
                    $loc_img    = $_FILES['buku']['tmp_name'];
                    $type_img   = $_FILES['buku']['type'];
                    $cek        = array('png','jpg','jpeg','gif');
                    $x          = explode('.',$nama_img);
                    $extension  = strtolower(end($x));

                    if (!empty($nama_img)){
                        if (in_array($extension,$cek) === TRUE){
                            $newfilename = $idbuku.".".$extension;
                            move_uploaded_file($loc_img,"../assets/img/buku/$newfilename");
                            $input = mysqli_query($conn,"INSERT INTO tbl_buku SET
                                    id_buku         = '$idbuku',
                                    id_kategori     = '$good',
                                    judul           = '$judul',
                                    penerbit        = '$penerbit',
                                    pengarang       = '$pengarang',
                                    catatan         = '$catatan',
                                    stemming        = '$catatan_s',
                                    tahun_terbit    = '$tahun',
                                    stok            = $stok,
                                    img_buku        = '$newfilename',
                                    updated_at      = '$datenow'
                                    ") or die (mysqli_error($conn));
                            if ($input){
                                echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                                echo "<meta http-equiv='refresh' content='1;
                                url=?page=buku'>";
                            }
                        } else {
                            echo '<a href="?page=trainingtambahbuku" class="btn btn-danger btn-block">Ekstensi tidak sesuai. Ekstensi gambar harus PNG, JPG, JPEG, GIF. Isi ulang data</a>';
                        }
                    } else {
                        $input = mysqli_query($conn,"INSERT INTO tbl_buku SET
                                id_buku         = '$idbuku',
                                id_kategori     = '$good',
                                judul           = '$judul',
                                penerbit        = '$penerbit',
                                pengarang       = '$pengarang',
                                catatan         = '$catatan',
                                stemming        = '$catatan_s',
                                tahun_terbit    = '$tahun',
                                stok            = $stok,
                                updated_at      = '$datenow'
                                ") or die (mysqli_error($conn));
                        if ($input){
                            echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=trainingbuku'>";
                        }
                    }
                }
                
                ?>
            </div>
        </div>
    </div>
</div>