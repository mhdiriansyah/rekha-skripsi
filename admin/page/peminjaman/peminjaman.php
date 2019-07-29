<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Peminjaman Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Peminjaman Buku Oleh Mahasiswa</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable example11">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Kembalikan</th>
                                <th>Acc</th>
                                <th>Status</th>
                                <th>Notifikasi Email</th>
                                <th>Denda</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_peminjaman
                                                JOIN tbl_mahasiswa ON tbl_peminjaman.nim=tbl_mahasiswa.nim
                                                JOIN tbl_buku ON tbl_peminjaman.id_buku=tbl_buku.id_buku");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-success"><i class="fas fa-book"></i> <?= $data['id_buku'] ?></label></td>
                                <td><?= $data['judul'] ?></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= tanggal($data['tgl_pinjam']) ?></td>
                                <td><?= tanggal($data['tgl_selesai']) ?></td>
                                <td><?= tanggal($data['tgl_kembali']) ?></td>
                                <td><?= statusAcc($data['acc']) ?></td>
                                <td><?= statusPeminjaman($data['status_pinjaman'],$data['tgl_selesai']) ?></td>
                                <td><?= statusNotifEmail($data['notif_email']) ?></td>
                                <?= emailReminder($data['id_pinjaman'],$data['email'],$data['nama_lengkap'],$data['tgl_selesai'],$data['id_buku'],$data['judul']) ?>
                                <td><?= dendaJumlah($data['id_pinjaman'],$data['tgl_kembali'],$data['tgl_selesai']) ?></td>
                                <td><?= statusKeterangan($data['keterangan']) ?></td>
                                <td>
                                    <?php if ($data['acc'] == 0){ ?>
                                    <a href="?page=updateacc&id=<?= $data['id_pinjaman'] ?>" class="btn btn-warning">acc peminjaman</a>
                                    <?php } ?>
                                    <a href="?page=peminjamanlihat&id=<?= $data['id_pinjaman'] ?>" class="btn btn-primary">lihat detail</a>
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

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Peminjaman Buku Oleh Dosen</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable example11">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Kembalikan</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_peminjaman
                                                JOIN tbl_dosen ON tbl_peminjaman.nip=tbl_dosen.nip
                                                JOIN tbl_buku ON tbl_peminjaman.id_buku=tbl_buku.id_buku");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-success"><i class="fas fa-book"></i> <?= $data['id_buku'] ?></label></td>
                                <td><?= $data['judul'] ?></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= tanggal($data['tgl_pinjam']) ?></td>
                                <td><?= tanggal($data['tgl_selesai']) ?></td>
                                <td><?= tanggal($data['tgl_kembali']) ?></td>
                                <td><?= statusPeminjaman($data['status_pinjaman'],$data['tgl_selesai']) ?></td>
                                <td><?= statusKeterangan($data['keterangan']) ?></td>
                                <td>
                                    <a href="?page=peminjamanlihatdosen&id=<?= $data['id_pinjaman'] ?>" class="btn btn-primary">lihat detail</a>
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