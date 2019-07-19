<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Manajemen Mahasiswa</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim=$_GET[id]");
    $data = mysqli_fetch_array($query)
?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Mahasiswa</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <form action="?page=mahasiswaeditpro" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nim</label>
                                <input type="text" class="form-control" name="nim" autocomplete="OFF" placeholder="isikan nim ..." value="<?= $data['nim'] ?>" required>
                                <input type="hidden" class="form-control" name="nim_old" value="<?= $data['nim'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" autocomplete="OFF" placeholder="isikan nama lengkap ..." value="<?= $data['nama_lengkap'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" autocomplete="OFF" placeholder="isikan email ..." value="<?= $data['email'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" autocomplete="OFF" placeholder="isikan password untuk akun ..." value="<?= $data['password'] ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Anggota Perpustakaan</label>
                                <select name="anggota" class="form-control">
                                    <option value="1" <?= ($data['anggota_aktif'] == 1)?'selected':'' ?> >Aktif</option>
                                    <option value="0" <?= ($data['anggota_aktif'] == 0)?'selected':'' ?> >Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=mahasiswa" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>