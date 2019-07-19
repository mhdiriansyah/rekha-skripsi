<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Mahasiswa</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                
                if(isset($_POST['submit'])){
                    $nim        = $_POST['nim'];
                    $nimold     = $_POST['nim_old'];
                    $nama       = $_POST['nama'];
                    $email      = $_POST['email'];
                    $password   = $_POST['password'];
                    $anggota    = $_POST['anggota'];

                        $input = mysqli_query($conn,"UPDATE tbl_mahasiswa SET
                                nim            = '$nim',
                                nama_lengkap   = '$nama',
                                email          = '$email',
                                password       = '$password',
                                anggota_aktif  = $anggota
                                WHERE nim      = '$nimold'
                                ") or die (mysqli_error($conn));
                        if ($input){
                            echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=?page=mahasiswa'>";
                        }
                }
                
                ?>
            </div>
        </div>
    </div>
</div>