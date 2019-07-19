<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Peminjaman Buku</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Update Data Peminjaman Buku</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <?php 
                    $datekembali = date('Y-m-d H:i:s');

                    $input = mysqli_query($conn,"UPDATE tbl_peminjaman SET 
                        status_pinjaman   = 1,
                        tgl_kembali       = '$datekembali' 
                        WHERE id_pinjaman = $_GET[id]") or die (mysqli_error($conn));
                    if ($input){
                        echo '<a href="#" class="btn btn-success btn-block">Buku telah dikembalikan</a>';
                        echo "<meta http-equiv='refresh' content='1;
                        url=?page=peminjaman'>";
                    }

                ?>
            </div>
        </div>
    </div>
</div>