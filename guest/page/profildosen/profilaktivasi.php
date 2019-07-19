<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Aktivasi Akun</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Proses Aktivasi Akun</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="card border-left-primary shadow">
                <div class="card-body">
                    <p>Apakah anda yakin ingin melakukan Aktivasi ?</p>
                    <p>Dengan melakukan Aktivasi akun, anda akan menjadi Anggota Aktif Perpustakaan sehingga dapat melakukan peminjaman buku melalui aplikasi perpustakaan ini.</p>
                    <form action="?page=profilaktivasi" method="post" enctype="multipart/form-data">
                        <input type="submit" class="btn btn-primary" name="submit" value="Ya">
                        <a href="?page=beranda" class="btn btn-secondary">Tidak</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
        <?php 
            if (isset($_POST['submit'])) {
                $update = mysqli_query($conn, "UPDATE tbl_mahasiswa SET anggota_aktif = 1 WHERE nim=$userdata[nim]");
                if ($update){
                    echo '<a href="#" class="btn btn-success btn-block">Aktivasi Akun Berhasil</a>';
                    echo "<meta http-equiv='refresh' content='1;
                    url=?page=beranda'>";
                }
            }
        ?>
        </div>
    </div>
</div>