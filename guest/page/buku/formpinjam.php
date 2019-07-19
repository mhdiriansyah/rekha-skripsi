<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Form Peminjaman Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_buku='$_GET[id]'");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Isi Data Form Peminjaman Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-thumbnail" src="../assets/img/buku/<?= $data['img_buku'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <form action="?page=formpinjampro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-12">
                            <label class="badge badge-primary"><?= $data['id_buku'] ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Judul</label>
                                <p><b><?= $data['judul'] ?></b></p>
                                <input type="hidden" name="id_buku" value="<?= $data['id_buku'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="text" class="form-control datepicker" name="tgl_pinjam" autocomplete="OFF" placeholder="isikan tanggal pinjam ..." required>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <label>Tanggal Selesai</label>
                                <input type="text" class="form-control datepicker" name="tgl_selesai" autocomplete="OFF" placeholder="isikan tanggal kembali ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" autocomplete="OFF" placeholder="isikan keterangan peminjaman buku ..."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Proses">
                            <a href="?page=buku" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>