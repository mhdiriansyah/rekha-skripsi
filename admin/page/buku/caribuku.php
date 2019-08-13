<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Pencarian Buku</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Menu Pencarian Buku - Naive Bayes Pencarian</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="row">
            <div class="offset-md-1 col-md-10">
                <form action="?page=caribuku" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="isikan keyword pencarian buku ..." name="keyword" autocomplete="OFF" required>
                        <div class="input-group-append">
                            <input class="btn btn-primary" type="submit" name="submit" value="cari">
                        </div>
                    </div>
                </form>
                <?php 
                
                if (isset($_POST['submit'])){
                    $keyword       = textPreprocessing($_POST['keyword']);
                    $stemkeyword   = $stemmer->stem($keyword);
                    $final         = naiveBayesSearch($stemkeyword);
                    $id            = $final[0]['id'];
                    $nama          = $final[0]['nama'];
                    $nilai          = $final[0]['nilai'];
                    
                    if($nilai>0){
                        echo '</br>Pencarian dengan keyword <b>"'.$_POST['keyword'].'"</b> masuk dalam <label class="badge badge-success">'.$id.'->'.$nama.'</label></br>';
                        $sql = mysqli_query($conn, "SELECT * FROM tbl_buku WHERE id_kategori='$id'");
                        $count = mysqli_num_rows($sql);
                        echo 'sekitar <b>'.$count.'</b> hasil buku terkait</br></br>';
                        while($data = mysqli_fetch_array($sql)){
                            echo '<i class="fas fa-arrow-circle-right"></i> <a href="?page=formpinjam&id='.$data['id_buku'].'">'.$data['judul'].'</a>';
                            echo '<hr class="sidebar-divider">';
                        }
                    } else {
                        echo '</br>Pencarian dengan keyword <b>"'.$_POST['keyword'].'"</b> tidak ditemukan dalam kategori di Database';
                    }
                    
                }


                ?>
            </div>
        </div>
    </div>
</div>