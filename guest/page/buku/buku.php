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
  <h1 class="h3 mb-0 text-gray-800">Etalase Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Abstrak</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Catatan</th>
                                <th>Tahun Terbit</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE deleted_at IS NULL");
                        while($data=mysqli_fetch_array($q)){
                            $nilStok = ($data['stok']-jumlahBuku($data['id_buku']));
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-success"><i class="fas fa-book"></i> <?= $data['id_buku'] ?></label></td>
                                <td><?= $data['judul'] ?></td>
                                <td><?= getAbstrak($data['abstrak']) ?></td>
                                <td><?= labelKategori($data['id_kategori']) ?></td>
                                <td><?= $data['penerbit'] ?></td>
                                <td><?= $data['pengarang'] ?></td>
                                <td><?= $data['catatan'] ?></td>
                                <td><?= $data['tahun_terbit'] ?></td>
                                <td><?= stokBuku($nilStok) ?></td>
                                <td>
                                    <a href="?page=bukulihat&id=<?= $data['id_buku'] ?>" class="btn btn-success">lihat</a>
                                    <?php if ($role == 1 && $userdata['anggota_aktif']!=0 && $nilStok > 0){?>
                                    <a href="?page=formpinjam&id=<?= $data['id_buku'] ?>" class="btn btn-primary">pinjam</a>
                                    <?php } else if($role == 2 && $nilStok > 0) { ?>
                                    <a href="?page=formpinjam&id=<?= $data['id_buku'] ?>" class="btn btn-primary">pinjam</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>