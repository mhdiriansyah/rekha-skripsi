<?php if ($role == 1 && $userdata['anggota_aktif'] != 1){ ?>
    <div class="row">
    <div class="col-md-12">
        <a href="?page=profilaktivasi" class="btn btn-warning btn-block">
        <span class="text">Akun anda belum diaktivasi, segera aktivasi dengan mengklik tombol ini agar bisa melakukan peminjaman buku.</span>
        </a>
    </div>
    </div><br>
<?php } ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<div class="row">
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Riwayat Peminjaman Selesai</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?= ($role == 1)?jumlahPeminjaman($role,$userdata['nim'],'selesai'):jumlahPeminjaman($role,$userdata['nip'],'selesai') ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-check fa-2x text-gray-400"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Riwayat Peminjaman Aktif</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?= ($role == 1)?jumlahPeminjaman($role,$userdata['nim'],'aktif'):jumlahPeminjaman($role,$userdata['nip'],'aktif') ?>
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-toggle-on fa-2x text-gray-400"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>