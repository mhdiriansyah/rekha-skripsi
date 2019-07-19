<?php if ($role == 1 && $userdata['anggota_aktif'] != 1){ ?>
    <div class="row">
    <div class="col-md-12">
        <a href="?page=profilaktivasi" class="btn btn-warning btn-block">
        <span class="text">Akun anda belum diaktivasi, segera aktivasi dengan mengklik tombol ini agar bisa melakukan peminjaman buku.</span>
        </a>
    </div>
    </div><br>
<?php } ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_buku='$_GET[id]'");
    $data = mysqli_fetch_array($query);
    $nilStok = ($data['stok']-jumlahBuku($data['id_buku']));
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
                        <img class="img-thumbnail" src="../assets/img/buku/<?= $data['img_buku'] ?>">
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
                                <td>Stok</td>
                                <td><?= stokBuku($nilStok) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="?page=buku" class="btn btn-secondary">Kembali</a>
                        <?php if ($role == 1 && $userdata['anggota_aktif'] != 0 && $nilStok > 0) { ?>
                            <a href="?page=formpinjam&id=<?= $data['id_buku'] ?>" class="btn btn-primary">Pinjam</a>
                        <?php } else if ($role == 2 && $nilStok > 0){ ?>
                            <a href="?page=formpinjam&id=<?= $data['id_buku'] ?>" class="btn btn-primary">Pinjam</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>