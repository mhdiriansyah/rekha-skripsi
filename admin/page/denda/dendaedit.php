<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_denda WHERE id_denda=$_GET[id]");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Denda</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <form action="?page=dendaeditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Durasi</label>
                                <input type="text" class="form-control" name="durasi" autocomplete="OFF" placeholder="isikan durasi hari ..." value="<?= $data['durasi'] ?>" required>
                                <input type="hidden" name="id" value="<?= $data['id_denda'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="text" class="form-control" name="nominal" autocomplete="OFF" placeholder="isikan nominal denda ..." value="<?= $data['nominal'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=denda" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>