<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Denda</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Hapus Data Denda</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="card border-left-danger shadow">
                <div class="card-body">
                    Apakah anda yakin ingin menghapus data ini ?
                    <form action="?page=dendahapus" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <input type="submit" class="btn btn-danger" name="submit" value="Ya">
                        <a href="?page=denda" class="btn btn-secondary">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
            if (isset($_POST['submit'])) {
                $id     = $_POST['id'];
                $delete = mysqli_query($conn, "DELETE FROM tbl_denda WHERE id_denda=$id");
                if ($delete){
                    echo '<a href="#" class="btn btn-success btn-block">Data berhasil dihapus</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=denda'>";
                }
            }
        ?>
        </div>
    </div>
</div>