<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login - Perpustakaan</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                  </div>
                  <form class="user" action="login.php" method="post" >
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" autocomplete="OFF" name="nim" placeholder="Nim / Username ...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password ...">
                    </div>
                    <div class="form-group">
                    </div>
                      <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login">
                    <hr>
                  </form>
                  <?php 
                    if (isset($_POST['submit'])){
                      session_start();
                      date_default_timezone_set('Asia/Jakarta');
                        
                        include "assets/lib/koneksi.php";
                        $nim    = $_POST['nim'];
                        $pass   = $_POST['password'];
                        $datenow = date('Y-m-d H:i:s'); 
                      
                      $ceklogin = mysqli_query($conn, "SELECT * FROM tbl_mahasiswa WHERE BINARY nim='$nim' AND password='$pass'");
                      $data     = mysqli_fetch_array($ceklogin);
                      $hit      = mysqli_num_rows($ceklogin);

                      if ($hit>0){
                        mysqli_query($conn, "UPDATE tbl_mahasiswa SET
                                            terakhir_login = '$datenow'
                                            WHERE nim = '$nim'");
                        echo '<a href="#" class="btn btn-success btn-block"><i class="fas fa-check"></i> Login Berhasil</a>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=guest/index.php?page=beranda'>";
                        $_SESSION['id']        = $data['nim'];
                        $_SESSION['password']  = $data['password'];
                        $_SESSION['role']      = 1;
                      } else {
                        $ceklogin1 = mysqli_query($conn, "SELECT * FROM tbl_user WHERE BINARY username='$nim' AND password='$pass'");
                        $data1     = mysqli_fetch_array($ceklogin1);
                        $hit1      = mysqli_num_rows($ceklogin1);

                        if ($hit1>0){
                          mysqli_query($conn, "UPDATE tbl_user SET
                                              terakhir_login = '$datenow'
                                              WHERE id_user = '$data1[id_user]'");
                          echo '<a href="#" class="btn btn-success btn-block"><i class="fas fa-check"></i> Login Berhasil</a>';
                          echo "<meta http-equiv='refresh' content='1;
                          url=admin/index.php?page=beranda'>";
                          $_SESSION['id']        = $data1['id_user'];
                          $_SESSION['password']  = $data1['password'];
                        } else {
                          $ceklogin2 = mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE BINARY nip='$nim' AND password='$pass'");
                          $data2     = mysqli_fetch_array($ceklogin2);
                          $hit2      = mysqli_num_rows($ceklogin2);

                          if ($hit2>0){
                            mysqli_query($conn, "UPDATE tbl_dosen SET
                                                terakhir_login = '$datenow'
                                                WHERE nip = '$data2[nip]'");
                            echo '<a href="#" class="btn btn-success btn-block"><i class="fas fa-check"></i> Login Berhasil</a>';
                            echo "<meta http-equiv='refresh' content='1;
                            url=guest/index.php?page=beranda'>";
                            $_SESSION['id']        = $data2['nip'];
                            $_SESSION['password']  = $data2['password'];
                            $_SESSION['role']      = 2;
                          }
                        }
                      }
                    }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
