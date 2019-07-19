<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Riwayat Peminjaman</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Peminjaman Buku</h6>
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
                                <th>Penerbit</th>
                                <th>Pengarang</th>
                                <th>Tahun Terbit</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Selesai</th>
                                <th>Tanggal Kembalikan</th>
                                <th>Status Peminjaman</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_peminjaman
                                                JOIN tbl_buku ON tbl_peminjaman.id_buku=tbl_buku.id_buku
                                                WHERE tbl_peminjaman.nip=$userdata[nip]");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-success"><i class="fas fa-book"></i> <?= $data['id_buku'] ?></label></td>
                                <td><?= $data['judul'] ?></td>
                                <td><?= $data['penerbit'] ?></td>
                                <td><?= $data['pengarang'] ?></td>
                                <td><?= $data['tahun_terbit'] ?></td>
                                <td><?= tanggal($data['tgl_pinjam']) ?></td>
                                <td><?= tanggal($data['tgl_selesai']) ?></td>
                                <td><?= tanggal($data['tgl_kembali']) ?></td>
                                <td><?= statusPeminjaman($data['status_pinjaman'],$data['tgl_selesai']) ?></td>
                                <td><?= statusKeterangan($data['keterangan']) ?></td>
                            </tr>
                        <?php $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>