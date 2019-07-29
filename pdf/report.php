<?php 
    include "../assets/lib/koneksi.php";
    $all = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman"));
    $belumkembali = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE tgl_kembali IS NULL"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <style>
        body { color: #37383a; font-family: 'Roboto', sans-serif; font-size: 11pt;}
        main { padding: 10px;}
        .title { text-align: center;}
        .long-desc {text-align: justify;}
        .long-desc table {width: 100%;}
        #container { width: 100%; padding: 0px 30px 0px 30px; border-bottom: solid 2px #d3d3d3;}
        .row { display: block; width: 500px; height: 100px;}
        .img { display: inline-block; width: 80px; height: 80px; text-align: center;}
        .text { display: inline-block; line-height: 0.3; width: 400px;}
        .listrik-pintar { margin-top: 10px; display: inline-block; width: 400px;}
        .title h2 { text-decoration: capitalize;}
        .row.desc { line-height: 1.6; text-align: justify;}
        .row.desc table { border-spacing: 5px;}
        table.identitas tr td:first-child { width: 200px;}
        table.pelanggan tr th:first-child { width: 30px;}
        table.pelanggan tr th{height: 40px; border-bottom: solid 2px #d3d3d3; background: #f2f2f2;text-align: center;}
        span {display: block; background: #27ae60;color: #f2f2f2;border-radius:5px;}
        /* #watermark { position: fixed; bottom: 10cm; left: 5.5cm; width: 8cm; height: 8cm; z-index: -1000; opacity: 0.1;} */
    </style>
</head>
<body>
    <main>
        <div class="title">
            <h2>Report</h2>
        </div>
        <div class="long-desc">
            <table class="identitas">
                <tr>
                    <td>Transaksi Peminjaman</td>
                    <td><?= $all.' Transaksi' ?></td>
                </tr>
                <tr>
                    <td>Buku Belum Dikembalikan</td>
                    <td><?= $belumkembali.' buku belum dikembalikan' ?></td>
                </tr>
            </table>
        </div><br>
        <div class="long-desc">
            <table class="pelanggan">
                <tr>
                    <th>No</th>
                    <th>Id buku</th>
                    <th>Nim/Nip</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Selesai</th>
                    <th>Tgl Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                </tr>
                <?php
                $no = 1;
                $sql = mysqli_query($conn, "SELECT * FROM tbl_peminjaman");
                while($data = mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td><?= $no ?>.</td>
                        <td><?= $data['id_buku'] ?></td>
                        <td><?= $data['nim'].$data['nip'] ?></td>
                        <td><?= $data['tgl_pinjam'] ?></td>
                        <td><?= $data['tgl_selesai'] ?></td>
                        <td><?= (!empty($data['tgl_kembali'])) ? $data['tgl_kembali'] : 'Belum Dikembalikan' ?></td>
                        <td><?= $data['denda'] ?></td>
                        <td><?= ($data['status_pinjaman'] == 1) ? 'Selesai' : 'Belum Selesai' ?></td>
                    </tr>
                <?php $no++; } ?>
            </table>
        </div>
    </main>
</body>
</html>