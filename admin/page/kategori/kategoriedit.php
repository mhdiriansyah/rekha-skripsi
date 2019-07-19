<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Kategori Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_kategori WHERE id_kategori='$_GET[id]'");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Kategori Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <form action="?page=kategorieditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="badge badge-primary"><?= $data['id_kategori'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" autocomplete="OFF" placeholder="isikan nama kategori buku ..." value="<?= $data['nama_kategori'] ?>" required>
                                <input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=kategori" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>