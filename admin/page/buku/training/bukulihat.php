<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Data Training Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_buku='$_GET[id]'");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Lihat Data Buku</h6>
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
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Id Buku</td>
                                <td><label class="badge badge-success"><?= $data['id_buku'] ?></label></td>
                            </tr>
                            <tr>
                                <td>Judul</td>
                                <td><?= $data['judul'] ?></td>
                            </tr>
                            <tr>
                                <td>Abstrak</td>
                                <td><?= $data['abstrak'] ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td><?= labelKategori($data['id_kategori']) ?></td>
                            </tr>
                            <tr>
                                <td>Penerbit</td>
                                <td><?= $data['penerbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><?= $data['pengarang'] ?></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td><?= $data['catatan'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td><?= $data['tahun_terbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Stok Buku</td>
                                <td><?= jumlahBuku($data['stok'],'Y') ?>, tersisa <?= (jumlahBuku($data['stok'],'T')-jumlahBukuPinjam($data['id_buku'])) ?> Buku</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="?page=trainingbuku" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>