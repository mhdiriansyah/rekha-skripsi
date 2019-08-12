<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Data Training Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_buku='$_GET[id]'");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <?= imgBuku($data['img_buku']) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="?page=trainingbukueditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="badge badge-primary"><?= $data['id_buku'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Judul</label>
                                <textarea class="form-control" placeholder="isikan judul buku ..." name="judul" autocomplete="OFF"><?= $data['judul'] ?></textarea>
                                <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Kategori Buku</label>
                                <select class="form-control" name="kategori">
                                <option style="display:none;">-- pilih salah satu --</option>
                                <?php 
                                    $sql = mysqli_query($conn, "SELECT * FROM tbl_kategori");
                                    while($datas = mysqli_fetch_array($sql)){
                                        echo '<option value="'.$datas['id_kategori'].'"'.($datas['id_kategori'] == $data['id_kategori'] ? 'selected' : '').'>'.$datas['nama_kategori'].'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Penerbit</label>
                                <input type="text" class="form-control" name="penerbit" autocomplete="OFF" placeholder="isikan penerbit buku ..." value="<?= $data['penerbit'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Pengarang</label>
                                <input type="text" class="form-control" name="pengarang" autocomplete="OFF" placeholder="isikan pengarang buku ..." value="<?= $data['pengarang'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea class="form-control" name="catatan" autocomplete="OFF" placeholder="isikan catatan mengenai buku ..." required><?= $data['catatan'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tahun Terbit</label>
                                <input type="number" class="form-control" name="tahun" autocomplete="OFF" placeholder="isikan tahun terbit ..." value="<?= $data['tahun_terbit'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Stok Buku</label>
                                <input type="number" class="form-control" name="stok" autocomplete="OFF" placeholder="isikan stok buku ..." value="<?= $data['stok'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Gambar Buku</label>
                                <input type="file" class="form-control" name="buku">
                                <input type="hidden" name="img_old" value="<?= $data['img_buku'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=trainingbuku" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>