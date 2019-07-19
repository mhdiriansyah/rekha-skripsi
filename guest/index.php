<?php 
   session_start();
   if (!empty($_SESSION['id']) && !empty($_SESSION['password']))
   {
      date_default_timezone_set('Asia/Jakarta');
      include "../assets/lib/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="../assets/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../style/assets/css/style.css">
  <link rel="stylesheet" href="../style/assets/css/components.css"> -->

  <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <style>
    .field-icon {
    float: right;
    margin-right: 8px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
    cursor:pointer;
  }
  </style>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php 
      include "service.php";
      include "sidebar.php"; 
    ?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <?php include "header.php"; ?>
        <div class="container-fluid">
        <?php include "content.php"; ?>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../assets/js/sb-admin-2.min.js"></script>
  <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/js/demo/datatables-demo.js"></script>
  <script src="../assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../style/assets/js/scripts.js"></script>
  <script src="../style/assets/js/custom.js"></script>
  <script>
  $("#dropdown" ).select2({
    theme: "bootstrap"
  });
  </script>
  <script>
  $(function () {
    $(".datepicker").datepicker({
      dateFormat: "mm/dd/yy",
      showOtherMonths: true,
      selectOtherMonths: true,
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      todayHighlight: true,
      orientation: "bottom"
    });
  });
  </script>
  <script>
    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
  </script>

</body>
</html>
<?php
}
else { ?>
<div class="col-md-12" align="center">
  <button type="button" name="button" class="btn btn-primary">Login Terlebih dahulu</button>
</div>

<?php echo"<meta http-equiv='refresh' content='1;
url=login.php'>";
} ?>