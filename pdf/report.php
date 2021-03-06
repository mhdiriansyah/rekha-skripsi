<?php 
    include "../assets/lib/koneksi.php";
    include "./service.php";
    $all = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun]"));
    $belumKembali = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun] AND tgl_kembali IS NULL"));
    $sudahKembali = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun] AND tgl_kembali IS NOT NULL"));
    $jumdenda = 0;
    $q = mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun]");
    $dosen = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun] AND nip IS NOT NULL"));
    $mhs = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun] AND nim IS NOT NULL"));
    while ($data = mysqli_fetch_array($q)){
        $jumdenda += $data['denda'];
    }
    $s = mysqli_query($conn, "SELECT * FROM tbl_peminjaman WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun] GROUP BY tgl_pinjam");
    $row = mysqli_fetch_array($s);


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
        #watermark { position: fixed; bottom: 10cm; left: 5.5cm; width: 8cm; height: 8cm; z-index: -1000; opacity: 0.1;}
    </style>
</head>
<body>
    <main>
        <div id="watermark">
            <img src="<?= $_SERVER['DOCUMENT_ROOT'].'/rekha-skripsi/pdf/logo.jpg' ?>" width="300px">
        </div>
        <div class="title">
            <h2><u>REPORT PERPUSTAKAAN</u></h2>
        </div>
        <div class="long-desc">
            <table class="identitas">
                <tr>
                    <td>Periode</td>
                    <td>: <b><?= ($all > 0) ? date('M', strtotime($row['tgl_pinjam'])).'-'.date('Y', strtotime($row['tgl_pinjam'])) : '-' ?></b></td>
                </tr>
                <tr>
                    <td>Transaksi Peminjaman</td>
                    <td>: <b><?= ($all > 0) ? $all.' Transaksi' : '-' ?></b></td>
                </tr>
                <tr>
                    <td>Buku Belum Dikembalikan</td>
                    <td>: <b><?= ($belumKembali > 0) ? $belumKembali.' buku' : '-' ?></b></td>
                </tr>
                <tr>
                    <td>Buku Sudah Dikembalikan</td>
                    <td>: <b><?= ($sudahKembali > 0) ? $sudahKembali.' buku' : '-' ?></b></td>
                </tr>
                <tr>
                    <td>Total Denda Bulan Ini</td>
                    <td>: <b><?= (!empty($jumdenda)) ? convertRupiah($jumdenda) : '-' ?></td>
                </tr>
            </table>
        </div><br>
        <div class="long-desc">
            <?php if($dosen==0 && $mhs==0){ ?>
                <h2 style="text-align:center;"> -- Report Belum Ada --</h2>
            <?php } ?>
            <?php if ($mhs>0){ ?>
            <h3>Mahasiswa</h3>
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
                $sql = mysqli_query($conn, "SELECT * FROM tbl_peminjaman 
                                            JOIN tbl_mahasiswa ON tbl_peminjaman.nim=tbl_mahasiswa.nim
                                            WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun]");
                while($data = mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td><?= $no ?>.</td>
                        <td><?= $data['id_buku'] ?></td>
                        <td><?= $data['nim'].' - '.$data['nama_lengkap'] ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tgl_pinjam'])) ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tgl_selesai'])) ?></td>
                        <td><?= (!empty($data['tgl_kembali'])) ? date('d-M-Y', strtotime($data['tgl_kembali'])) : 'Belum Dikembalikan' ?></td>
                        <td><?= (!empty($data['denda'])) ? convertRupiah($data['denda']) : 'Tidak Ada Denda' ?></td>
                        <td><?= ($data['status_pinjaman'] == 1) ? 'Selesai' : 'Belum Selesai' ?></td>
                    </tr>
                <?php $no++; } ?>
            </table>
            <?php } ?>

            <?php if ($dosen>0){ ?>
            <h3>Dosen</h3>
            <table class="pelanggan">
                <tr>
                    <th>No</th>
                    <th>Id buku</th>
                    <th>Nip</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Selesai</th>
                    <th>Tgl Kembali</th>
                    <th>Denda</th>
                    <th>Status</th>
                </tr>
                <?php
                $no = 1;
                $sql = mysqli_query($conn, "SELECT * FROM tbl_peminjaman 
                                            JOIN tbl_dosen ON tbl_peminjaman.nip=tbl_dosen.nip
                                            WHERE MONTH(tgl_pinjam)=$_GET[bulan] AND YEAR(tgl_pinjam)=$_GET[tahun]");
                while($data = mysqli_fetch_array($sql)){ ?>
                    <tr>
                        <td><?= $no ?>.</td>
                        <td><?= $data['id_buku'] ?></td>
                        <td><?= $data['nip'].' - '.$data['nama_lengkap'] ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tgl_pinjam'])) ?></td>
                        <td><?= date('d-M-Y', strtotime($data['tgl_selesai'])) ?></td>
                        <td><?= (!empty($data['tgl_kembali'])) ? date('d-M-Y', strtotime($data['tgl_kembali'])) : 'Belum Dikembalikan' ?></td>
                        <td>Tidak Ada Denda</td>
                        <td><?= ($data['status_pinjaman'] == 1) ? 'Selesai' : 'Belum Selesai' ?></td>
                    </tr>
                <?php $no++; } ?>
            </table>
            <?php } ?>
        </div>
    </main>
</body>
</html>