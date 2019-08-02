<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Report</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">List Report</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        Report akan dicetak dalam bentuk PDF berisikan jumlah transaksi peminjaman, jumlah buku belum dikembalikan dan total denda.
                    </div>
                </div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-md-12">
                <form action="../pdf/cetak.php" method="post" target="_blank" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div clas="form-group">
                                <label>Bulan</label>
                                <select class="form-control" name="bulan">
                                <option style="display:none;">-- pilih salah satu --</option>
                                <?php 
                                    $sql = mysqli_query($conn, "SELECT tgl_pinjam FROM tbl_peminjaman GROUP BY CONCAT(MONTH(tgl_pinjam)) ASC");
                                    while($datas = mysqli_fetch_array($sql)){
                                        echo '<option value="'.date('m', strtotime($datas['tgl_pinjam'])).'">'.date('F', strtotime($datas['tgl_pinjam'])).'</option>';
                                    }
                                ?>     
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div clas="form-group">
                                <label>Tahun</label>
                                <select class="form-control" name="tahun">
                                <option style="display:none;">-- pilih salah satu --</option>
                                <?php 
                                    $sql = mysqli_query($conn, "SELECT tgl_pinjam FROM tbl_peminjaman GROUP BY CONCAT(YEAR(tgl_pinjam))");
                                    while($datas = mysqli_fetch_array($sql)){
                                        echo '<option value="'.date('Y', strtotime($datas['tgl_pinjam'])).'">'.date('Y', strtotime($datas['tgl_pinjam'])).'</option>';
                                    }
                                ?>                               
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="submit" name="submit" style="margin-top: 32px;" class="btn btn-primary btn-block" value="Proses">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>