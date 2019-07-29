<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Buku</h1>
</div>
<?php 
    $get_id = mysqli_query($conn, "SELECT id_buku FROM tbl_buku WHERE SUBSTRING(id_buku,1,4)='BUKU'") or die (mysqli_error($conn));
    $trim_id = mysqli_query($conn, "SELECT SUBSTRING(id_buku,-6,6) as hasil FROM tbl_buku WHERE SUBSTRING(id_buku,1,4)='BUKU' ORDER BY hasil DESC LIMIT 1") or die (mysqli_error($conn));
    $hit    = mysqli_num_rows($get_id);
    if ($hit == 0){
        $id_k   = "BUKU000001";
    } else if ($hit > 0){
        $row    = mysqli_fetch_array($trim_id);
        $kode   = $row['hasil']+1;
        $id_k   = "BUKU".str_pad($kode,6,"0",STR_PAD_LEFT); 
    }    
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="?page=bukutambahhpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="badge badge-primary"><?= $id_k ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Judul</label>
                                <textarea class="form-control" placeholder="isikan judul buku ..." name="judul" autocomplete="OFF"></textarea>
                                <input type="hidden" name="id_buku" value="<?= $id_k ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" autocomplete="OFF" placeholder="isikan penerbit buku ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" autocomplete="OFF" placeholder="isikan pengarang buku ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" autocomplete="OFF" placeholder="isikan catatan mengenai buku ..." required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahun" autocomplete="OFF" placeholder="isikan tahun terbit ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Stok Buku</label>
                                <input type="number" class="form-control" name="stok" autocomplete="OFF" placeholder="isikan stok buku ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Gambar Buku</label>
                                <input type="file" class="form-control" name="buku">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=buku" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>