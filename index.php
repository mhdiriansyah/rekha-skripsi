<?php 

include "assets/lib/koneksi.php";
include "service.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Website Perpustakaan</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php"><i class="fa fa-home"></i> Home</a>
      <a class="btn btn-info" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-3 mx-auto">
          <img src="img/logo_uncen.png" class="img-fluid" alt="Universitas Cenderawasih">
        </div>
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Perpustakaan Jurusan Matematika Fakultas F-MIPA Universitas Cenderawasih</h1>
        </div>
      </div>
    </div>
  </header>

  <section class="features-icons bg-light text-center" id="info">
    <div class="container">
      <div class="row">
        <?php 
        $sql = mysqli_query($conn, "SELECT * FROM tbl_buku ORDER BY RAND() LIMIT 3");
        while ($data = mysqli_fetch_array($sql)){
        ?>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex" style="height: 200px;">
                <?= imgBuku($data['img_buku']) ?>
              </div>
              <h5><?= $data['judul'] ?></h5>
              <a href="login.php" class="btn btn-info" style="color: white;"><i class="fa fa-check-circle"></i> Pinjam</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">&copy; Perpustakaan Digital F-Mipa Uncen 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
