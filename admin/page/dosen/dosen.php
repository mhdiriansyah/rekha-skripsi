<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Dosen</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Data Dosen</h6>
        <a href="?page=dosentambah" class="btn btn-primary"><i class="fas fa-plus-square"></i> tambah data</a>
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
                                <th>Nip</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_dosen");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><label class="badge badge-primary"><i class="fas fa-user"></i> <?= $data['nip'] ?></label></td>
                                <td><?= $data['nama_lengkap'] ?></td>
                                <td><?= $data['jurusan'] ?></td>
                                <td><?= $data['email'] ?></td>
                                <td>*****</td>
                                </td>
                                <td>
                                    <a href="?page=dosenedit&id=<?= $data['nip'] ?>" class="btn btn-info">edit</a>
                                    <a href="?page=dosenhapus&id=<?= $data['nip'] ?>" class="btn btn-danger">hapus</a>
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