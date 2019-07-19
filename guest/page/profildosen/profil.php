<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil Dosen</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE nip=$_GET[id]");
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
            $nip        = $_POST['nip'];
            $nama       = $_POST['nama'];
            $jurusan    = $_POST['jurusan'];
            $email      = $_POST['email'];
            $password   = $_POST['password'];

            $imgold     = $_POST['image_old'];
            $nama_img   = $_FILES['image']['name'];
            $loc_img    = $_FILES['image']['tmp_name'];
            $type_img   = $_FILES['image']['type'];
            $cek        = array('png','jpg','jpeg','gif');
            $x          = explode('.',$nama_img);
            $extension  = strtolower(end($x));

            if (!empty($nama_img)){
                if (in_array($extension,$cek) === TRUE){
                    $newfilename = $nip.".".$extension;
                    if (!empty($imgold)){
                        unlink("../assets/img/dosen/$imgold");
                    }
                    move_uploaded_file($loc_img,"../assets/img/dosen/$newfilename");

                    $input = mysqli_query($conn,"UPDATE tbl_dosen SET
                            nama_lengkap  = '$nama',
                            jurusan       = '$jurusan',
                            email         = '$email',
                            password      = '$password',
                            img_dosen       = '$newfilename'
                            WHERE nip     = '$nip'
                            ") or die (mysqli_error($conn));

                    if ($input){
                        echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=profildosen&id=$data[nip]'>";
                    }
                } else {
                    echo '<a href="#" class="btn btn-danger btn-block">Ekstensi gambar tidak sesuai. usahakan exktensi gambar berupa PNG, JPG, JPEG, GIF</a>';
                }
            } else {
                $input = mysqli_query($conn,"UPDATE tbl_dosen SET
                            nama_lengkap  = '$nama',
                            jurusan       = '$jurusan',
                            email         = '$email',
                            password      = '$password'
                            WHERE nip     = '$nip'
                            ") or die (mysqli_error($conn));

                if ($input){
                    echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=profildosen&id=$data[nip]'>";
                }
            }
        }
        ?>
    </div>
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="col-lg-12">
                        <img class="img-profile rounded-circle" src="<?= $img ?>" width="100%">
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <form action="?page=profildosen&id=<?= $data['nip'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nip</label><br>
                                <a href="#" class="btn btn-primary"><?= $data['nip'] ?></a>
                                <input type="hidden" class="form-control" name="nip" value="<?= $data['nip'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" autocomplete="OFF" placeholder="isikan nama lengkap ..." value="<?= $data['nama_lengkap'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" autocomplete="OFF" placeholder="isikan jurusan ..." value="<?= $data['jurusan'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" autocomplete="OFF" placeholder="isikan email ..." value="<?= $data['email'] ?>" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password-field" type="password" class="form-control" name="password" autocomplete="OFF" placeholder="isikan password untuk akun ..." value="<?= $data['password'] ?>">
                                <span toggle="#password-field" class="fa fa-lg fa-eye-slash field-icon toggle-password"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="hidden" name="image_old" value="<?= $data['img_dosen'] ?>">
                                <input type="file" class="form-control" name="image">
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