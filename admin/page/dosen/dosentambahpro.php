<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Dosen</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dosen</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                
                if(isset($_POST['submit'])){
                    $nip        = $_POST['nip'];
                    $nama       = $_POST['nama'];
                    $jurusan    = $_POST['jurusan'];
                    $email      = $_POST['email'];
                    $password   = $_POST['password'];

                    $input = mysqli_query($conn,"INSERT INTO tbl_dosen SET
                            nip                 = '$nip',
                            nama_lengkap        = '$nama',
                            jurusan             = '$jurusan',
                            email               = '$email',
                            password            = '$password'
                            ") or die (mysqli_error($conn));
                    if ($input){
                        echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=dosen'>";
                    }
                }
                
                ?>
            </div>
        </div>
    </div>
</div>