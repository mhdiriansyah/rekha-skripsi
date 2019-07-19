<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Peminjaman Buku</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_peminjaman 
                                JOIN tbl_dosen ON tbl_peminjaman.nip=tbl_dosen.nip
                                JOIN tbl_buku ON tbl_peminjaman.id_buku=tbl_buku.id_buku
                                WHERE tbl_peminjaman.id_pinjaman=$_GET[id]");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Data Peminjaman Buku</h6>
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
                                <td>Penerbit</td>
                                <td><?= $data['penerbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Pengarang</td>
                                <td><?= $data['pengarang'] ?></td>
                            </tr>
                            <tr>
                                <td>Tahun Terbit</td>
                                <td><?= $data['tahun_terbit'] ?></td>
                            </tr>
                            <tr>
                                <td>Peminjam</td>
                                <td><?= $data['nama_lengkap'] ?></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td><label class="badge badge-primary"><?= $data['nip'] ?></label></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pinjam</td>
                                <td><?= tanggal($data['tgl_pinjam']) ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai</td>
                                <td><?= tanggal($data['tgl_selesai']) ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Kembalikan</td>
                                <td><?= tanggal($data['tgl_kembali']) ?></td>
                            </tr>
                            <tr>
                                <td>Status Pinjaman</td>
                                <td><?= statusPeminjaman($data['status_pinjaman'],$data['tgl_selesai']) ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><?= statusKeterangan($data['keterangan']) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="?page=peminjaman" class="btn btn-secondary">Kembali</a>
                        <?php if ($data['status_pinjaman'] != 1) { ?>
                        <a href="?page=peminjamanupdate&id=<?= $data['id_pinjaman'] ?>" class="btn btn-primary">Buku Dikembalikan</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>