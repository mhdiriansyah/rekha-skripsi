<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Data Training Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Buku</h6>
        <a href="?page=trainingbukutambah" class="btn btn-primary"><i class="fas fa-plus-square"></i> tambah data</a>
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
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-success"><i class="fas fa-book"></i> <?= $data['id_buku'] ?></label></td>
                                <td><?= $data['judul'] ?></td>
                                <td><?= labelKategori($data['id_kategori']) ?></td>
                                <td><?= $data['penerbit'] ?></td>
                                <td><?= $data['pengarang'] ?></td>
                                <td><?= $data['catatan'] ?></td>
                                <td><?= $data['tahun_terbit'] ?></td>
                                <td><?= jumlahBuku($data['stok'],'Y') ?>, tersisa <?= (jumlahBuku($data['stok'],'T')-jumlahBukuPinjam($data['id_buku'])) ?> Buku</td>
                                <td>
                                    <a href="?page=trainingbukuedit&id=<?= $data['id_buku'] ?>" class="btn btn-info">edit</a>
                                    <a href="?page=trainingbukulihat&id=<?= $data['id_buku'] ?>" class="btn btn-success">lihat</a>
                                    <a href="?page=trainingbukuhapus&id=<?= $data['id_buku'] ?>" class="btn btn-danger">hapus</a>
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