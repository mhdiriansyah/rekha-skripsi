<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil Administrator</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user=$_GET[id]");
    $data = mysqli_fetch_array($query)
?>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Profil Mahasiswa</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
    <div class="row">
        <?php 
        if (isset($_POST['submit'])){
            $username   = $_POST['username'];
            $password   = $_POST['password'];
            $iduser     = $_POST['id'];
            
            $input = mysqli_query($conn,"UPDATE tbl_user SET
                username      = '$username',
                password      = '$password'
                WHERE id_user = $iduser
                ") or die (mysqli_error($conn));

            if ($input){
                echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                echo "<meta http-equiv='refresh' content='1;
                url=?page=profil&id=$data[id_user]'>";
            }
        }
        ?>
    </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <form action="?page=profil&id=<?= $data['id_user'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                                <input type="text" maxlength="15" class="form-control" name="username" autocomplete="OFF" placeholder="isikan username (max 15 karakter) ..." value="<?= $data['username'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password-field" maxlength="10" type="password" class="form-control" name="password" autocomplete="OFF" placeholder="isikan password (max 10 karakter) ..." value="<?= $data['password'] ?>">
                                <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                            <a href="?page=beranda" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>