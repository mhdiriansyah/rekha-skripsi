<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen kategori Buku</h1>
</div>
<?php 
    $get_id = mysqli_query($conn, "SELECT id_kategori FROM tbl_kategori WHERE SUBSTRING(id_kategori,1,8)='KATEGORI'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_kategori,-3,3) as hasil FROM tbl_kategori WHERE SUBSTRING(id_kategori,1,8)='KATEGORI' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "KATEGORI001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "KATEGORI".str_pad($kode,3,"0",STR_PAD_LEFT); 
    }    
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Kategori Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="?page=kategoritambahpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="badge badge-primary"><?= $id_k ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" class="form-control" name="nama" autocomplete="OFF" placeholder="isikan nama kategori buku ..." required>
                                <input type="hidden" name="id" value="<?= $id_k ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=kategori" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>