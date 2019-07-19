<?php if ($userdata['anggota_aktif'] != 1){ ?>
    <div class="row">
    <div class="col-md-12">
        <a href="?page=profilaktivasi" class="btn btn-warning btn-block">
        <span class="text">Akun anda belum diaktivasi, segera aktivasi dengan mengklik tombol ini agar bisa melakukan peminjaman buku.</span>
        </a>
    </div>
    </div><br>
<?php } ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Profil Mahasiswa</h1>
</div>
<?php 
    $query = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE nim=$_GET[id]");
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
            $nim        = $_POST['nim'];
            $nama       = $_POST['nama'];
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
                    $newfilename = $nim.".".$extension;
                    if (!empty($imgold)){
                        unlink("../assets/img/mahasiswa/$imgold");
                    }
                    move_uploaded_file($loc_img,"../assets/img/mahasiswa/$newfilename");

                    $input = mysqli_query($conn,"UPDATE tbl_mahasiswa SET
                            nama_lengkap  = '$nama',
                            email         = '$email',
                            password      = '$password',
                            img_mhs       = '$newfilename'
                            WHERE nim     = '$nim'
                            ") or die (mysqli_error($conn));

                    if ($input){
                        echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=profil&id=$data[nim]'>";
                    }
                } else {
                    echo '<a href="#" class="btn btn-danger btn-block">Ekstensi gambar tidak sesuai. usahakan exktensi gambar berupa PNG, JPG, JPEG, GIF</a>';
                }
            } else {
                $input = mysqli_query($conn,"UPDATE tbl_mahasiswa SET
                            nama_lengkap  = '$nama',
                            email         = '$email',
                            password      = '$password'
                            WHERE nim     = '$nim'
                            ") or die (mysqli_error($conn));

                if ($input){
                    echo '<a href="#" class="btn btn-success btn-block">Data berhasil disimpan</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=profil&id=$data[nim]'>";
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
                <form action="?page=profil&id=<?= $data['nim'] ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Nim</label><br>
                                <a href="#" class="btn btn-primary"><?= $data['nim'] ?></a>
                                <input type="hidden" class="form-control" name="nim" value="<?= $data['nim'] ?>">
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
                                <input type="hidden" name="image_old" value="<?= $data['img_mhs'] ?>">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Anggota Perpustakaan</label><br>
                                <a href="#" class="btn <?= ($data['anggota_aktif']==1)?'btn-success':'btn-warning';?>"><?= ($data['anggota_aktif']==1)?'Aktif':'Belum Aktif';?></a>
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