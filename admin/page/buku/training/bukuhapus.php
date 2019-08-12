<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Data Training Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hapus Data Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="card border-left-danger shadow">
                <div class="card-body">
                    Apakah anda yakin ingin menghapus data ini ?
                    <form action="?page=trainingbukuhapus" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="idbuku" value="<?= $_GET['id'] ?>">
                        <input type="submit" class="btn btn-danger" name="submit" value="Ya">
                        <a href="?page=trainingbuku" class="btn btn-secondary">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
            if (isset($_POST['submit'])) {
                $idbuku     = $_POST['idbuku'];
                $datenow    = date('Y-m-d H:i:s');

                $delete = mysqli_query($conn, "UPDATE tbl_buku SET deleted_at='$datenow' WHERE id_buku='$idbuku'");
                
                if ($delete){
                    echo '<a href="#" class="btn btn-success btn-block">Data berhasil dihapus</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=buku'>";
                }
            }
        ?>
        </div>
    </div>
</div>