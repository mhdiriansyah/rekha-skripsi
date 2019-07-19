<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Mahasiswa</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Mahasiswa</h6>
        <a href="?page=mahasiswatambah" class="btn btn-primary"><i class="fas fa-plus-square"></i> tambah data</a>
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
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Anggota Perpustakaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-primary"><i class="fas fa-user"></i> <?= $data['nim'] ?></label></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td>*****</td>
                                <td><?php 
                                    if ($data['anggota_aktif'] != 0){
                                        echo '<label class="badge badge-success"><i class="fas fa-check-circle"></i> aktif</label>';
                                    } else {
                                        echo '<label class="badge badge-secondary"><i class="fas fa-times-circle"></i> tidak aktif</label>';
                                    }
                                ?>
                                </td>
                                <td>
                                    <a href="?page=mahasiswaedit&id=<?= $data['nim'] ?>" class="btn btn-info">edit</a>
                                    <a href="?page=mahasiswahapus&id=<?= $data['nim'] ?>" class="btn btn-danger">hapus</a>
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