<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Logout</h1>
</div>
<div class="row">
<a href="#" class="btn btn-danger btn-block"><i class="fas fa-check"></i> Logout Berhasil</a>
<?php 
    session_destroy();
    echo"<meta http-equiv='refresh' content='1;
            url=../login.php'>";
?>
</div>