<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Denda</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Denda</h6>
        <a href="?page=dendatambah" class="btn btn-primary"><i class="fas fa-plus-square"></i> tambah data</a>
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
                                <th>Durasi</th>
                                <th>Nominal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no = 1;
                        $q = mysqli_query($conn, "SELECT * FROM tbl_denda");
                        while($data=mysqli_fetch_array($q)){
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $data['durasi'] ?> Hari</td>
                                <td><?= convertRupiah($data['nominal']) ?></td>
                                <td>
                                    <a href="?page=dendaedit&id=<?= $data['id_denda'] ?>" class="btn btn-info">edit</a>
                                    <a href="?page=dendahapus&id=<?= $data['id_denda'] ?>" class="btn btn-danger">hapus</a>
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