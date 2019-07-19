<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Mahasiswa</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hapus Data Mahasiswa</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="card border-left-danger shadow">
                <div class="card-body">
                    Apakah anda yakin ingin menghapus data ini ?
                    <form action="?page=mahasiswahapus" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="nim" value="<?= $_GET['id'] ?>">
                        <input type="submit" class="btn btn-danger" name="submit" value="Ya">
                        <a href="?page=mahasiswa" class="btn btn-secondary">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
            if (isset($_POST['submit'])) {
                $nim        = $_POST['nim'];

                $delete = mysqli_query($conn, "DELETE FROM tbl_mahasiswa WHERE nim=$nim");
                
                if ($delete){
                    echo '<a href="#" class="btn btn-success btn-block">Data berhasil dihapus</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=mahasiswa'>";
                }
            }
        ?>
        </div>
    </div>
</div>