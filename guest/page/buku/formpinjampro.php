<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Form Peminjaman Buku</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Isi Data Form Peminjaman Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                
                if(isset($_POST['submit'])){
                    $idbuku     = $_POST['id_buku'];
                    $id         = ($role == 1)?$userdata['nim']:$userdata['nip'];
                    $tgl1       = date('Y-m-d', strtotime($_POST['tgl_pinjam']));
                    $tgl2       = date('Y-m-d', strtotime($_POST['tgl_selesai']));
                    $ket        = addslashes($_POST['keterangan']);

                    if ($role == 1){
                        $input = mysqli_query($conn,"INSERT INTO tbl_peminjaman SET
                                id_buku         = '$idbuku',
                                nim             = '$id',
                                tgl_pinjam      = '$tgl1',
                                tgl_selesai     = '$tgl2',
                                status_pinjaman = 0,
                                keterangan      = '$ket'
                                ") or die (mysqli_error($conn));
                        if ($input){
                            echo '<a href="#" class="btn btn-success btn-block">Pinjaman Buku Berhasil Diproses</a>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=peminjaman'>";
                        }
                    } else {
                        $input = mysqli_query($conn,"INSERT INTO tbl_peminjaman SET
                                id_buku         = '$idbuku',
                                nip             = '$id',
                                tgl_pinjam      = '$tgl1',
                                tgl_selesai     = '$tgl2',
                                status_pinjaman = 0,
                                keterangan      = '$ket'
                                ") or die (mysqli_error($conn));
                        if ($input){
                            echo '<a href="#" class="btn btn-success btn-block">Pinjaman Buku Berhasil Diproses</a>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=peminjamandosen'>";
                        }
                    }
                }
                
                ?>
            </div>
        </div>
    </div>
</div>